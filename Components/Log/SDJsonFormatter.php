<?php
/**
 * Created by PhpStorm.
 * User: zhangjincheng
 * Date: 18-3-19
 * Time: 下午3:16
 */

namespace Kernel\Components\Log;

use Monolog\Formatter\JsonFormatter;

class SDJsonFormatter extends JsonFormatter
{
    /**
     * {@inheritdoc}
     */
    public function format(array $record)
    {
        // $context = $record['context'];
        // $RunStack = $context['RunStack']??[];
        // $count = count($RunStack);
        // if ($count) {
        //     for ($i = 0; $i<$count; $i++) {
        //         $newRunStack[] = $RunStack[$i];
        //     }
        //     $context['RunStack'] = $newRunStack;
        // }
        // foreach ($context as $key => $value) {
        //     $record['cxt_' . $key] = $value;
        // }
        // $extra = $record['extra'];
        // foreach ($extra as $key => $value) {
        //     $record['ex_' . $key] = $value;
        // }
        // unset($record['datetime']);
        // unset($record['context']);
        // unset($record['extra']);
        return $this->toJson($this->normalize($record), true) . ($this->appendNewline ? "\n" : '');
    }
}
