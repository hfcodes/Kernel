<?php
/**
 * Created by PhpStorm.
 * User: zhangjincheng
 * Date: 17-11-15
 * Time: 下午1:50
 */

namespace Kernel\Components\Process;

use Kernel\Components\Event\Event;
use Kernel\CoreBase\Child;
use Kernel\CoreBase\RPCThrowable;
use Kernel\Memory\Pool;
use Kernel\SwooleMarco;
use Kernel\Test\DocParser;

abstract class ProcessRPC extends Child
{
    /**
     * 协程支持
     * @var bool
     */
    protected $coroutine_need = true;
    protected $token = 0;
    protected $rpcProxy;

    /**
     * 設置RPC代理
     * @param $object
     * @throws \ReflectionException
     */
    public function setRPCProxy($object)
    {
        $this->rpcProxy = $object;
        $this->phaseProxy($object);
    }

    /**
     * @param $object
     * @throws \ReflectionException
     */
    public function phaseProxy($object)
    {
        $reflection = new \ReflectionClass(get_class($object));
        $methods = $reflection->getMethods(\ReflectionMethod::IS_PUBLIC);
        //遍历所有的方法
        foreach ($methods as $method) {
            //获取方法的注释
            $doc = $method->getDocComment();
            //解析注释
            $info = DocParser::getInstance()->parse($doc);
            $method_name = $method->getName();
            if (isset($info['oneWay'])) {
                ProcessManager::getInstance()->oneWayFucName[$method_name] = $method_name;
            }
        }
    }

    /**
     * 是否单向
     * @param $func
     * @return bool
     */
    public function isOneWay($func)
    {
        return array_key_exists($func, ProcessManager::getInstance()->oneWayFucName);
    }

    /**
     * @param $name
     * @param $arguments
     * @param $oneWay
     * @param $worker_id
     * @return string
     * @throws \Exception
     */
    public function processRpcCall($name, $arguments, $oneWay, $worker_id)
    {
        $this->token++;
        $my_worker_id = getInstance()->getWorkerId();
        $message['worker_id'] = $my_worker_id;
        $message['arg'] = $arguments;
        $message['func'] = $name;
        $class = get_class($this);
        $message['token'] = "[RPC][$class::$name][$my_worker_id->$worker_id]" ."[$this->token]";
        $message['oneWay'] = $oneWay;
        if ($my_worker_id == $worker_id) {
            $result = $this->processPpcRunHelp($message);
            //本进程直接封装个Event返回
            $event = Pool::getInstance()->get(Event::class)->reset('MineProcessRPC', $result);
            return $event;
        }
        $this->sendMessage(getInstance()->packServerMessageBody(SwooleMarco::PROCESS_RPC, $message), $worker_id);
        return $message['token'];
    }

    /**
     * 跨进程调用public方法
     * @param $message
     * @return mixed
     */
    protected function processPpcRunHelp($message)
    {
        $func = $message['func'];
        $context = $this;
        if ($this->rpcProxy != null && is_callable([$this->rpcProxy, $func])) {
            $context = $this->rpcProxy;
        }
        if (!is_callable([$context, $func])) {
            $class = get_class($context);
            $result = new \Exception("$func 方法名 在 $class 中不存在");
        } else {
            try {
                $result = sd_call_user_func_array([$context, $func], $message['arg']);
            } catch (\Throwable $e) {
                $result = new RPCThrowable($e);
            }
        }
        return $result;
    }

    /**
     * 跨进程调用public方法
     * @param $message
     * @throws \Exception
     */
    protected function processPpcRun($message)
    {
        $result = $this->processPpcRunHelp($message);
        if (!$message['oneWay']) {
            $newMessage['result'] = $result;
            $newMessage['token'] = $message['token'];
            $data = getInstance()->packServerMessageBody(SwooleMarco::PROCESS_RPC_RESULT, $newMessage);
            $this->sendMessage($data, $message['worker_id']);
        }
    }

    /**
     * @param $data
     * @param $worker_id
     * @throws \Exception
     */
    protected function sendMessage($data, $worker_id)
    {
        if (getInstance()->isUserProcess($worker_id)) {
            $process = ProcessManager::getInstance()->getProcessFromID($worker_id);
            if ($process == null) {
                return;
            }
            if ($worker_id == getInstance()->workerId) {
                $process->readData($data);
            } else {
                $process->process->write(\swoole_serialize::pack($data));
            }
        } else {
            if ($worker_id == getInstance()->workerId) {
                getInstance()->onSwoolePipeMessage(getInstance()->server, $worker_id, $data);
            } else {
                getInstance()->server->sendMessage($data, $worker_id);
            }
        }
    }
}
