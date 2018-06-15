<?php
/**
 * Created by PhpStorm.
 * User: zhangjincheng
 * Date: 17-8-18
 * Time: 下午3:05
 */

namespace Kernel\Components\Cluster;

use Kernel\Memory\Pool;
use Kernel\Pack\ClusterPack;

class ClusterHelp
{
    /**
     * @var \Noodlehaus\Config
     */
    protected $config;
    /**
     * @var ClusterPack
     */
    protected $pack;
    protected $port;
    protected $controller;
    /**
     * @var ClusterHelp
     */
    protected static $instance;

    public static function getInstance()
    {
        if (self::$instance == null) {
            self::$instance = new ClusterHelp();
        }
        return self::$instance;
    }

    public function __construct()
    {
        $this->config = getInstance()->config;
        $this->pack = new ClusterPack();
    }

    public function buildPort()
    {
        if (!getInstance()->isCluster()) {
            return;
        }
        //创建dispatch端口用于连接dispatch
        $this->port = getInstance()->server->listen('0.0.0.0', $this->config['cluster']['port'], SWOOLE_SOCK_TCP);
        if ($this->port == false) {
            $port = $this->config['cluster']['port'];
            throw new \Exception("$port 端口被占用");
        }
        $this->port->set($this->pack->getProbufSet());
        $this->port->on('connect', function ($serv, $fd) {
            //设置保护模式，不被心跳切断
            $serv->protect($fd, true);
        });
        $this->port->on('close', function ($serv, $fd) {
        });

        $this->port->on('receive', function ($serv, $fd, $from_id, $data) {
            try {
                $unserialize_data = $this->pack->unPack($data);
            } catch (\Exception $e) {
                return null;
            }
            $method = $unserialize_data['m'];
            $params = $unserialize_data['p'];
            $token = $unserialize_data['t'];
            $controller = Pool::getInstance()->get(ClusterController::class);
            $result = sd_call_user_func_array([$controller, $method], $params);
            $data = [];
            $data['t'] = $token;
            $data['r'] = $result;
            $serialize_data = $this->pack->pack($data);
            getInstance()->send($fd, $serialize_data);
            $controller->destroy();
            Pool::getInstance()->push($controller);
        });
    }
}
