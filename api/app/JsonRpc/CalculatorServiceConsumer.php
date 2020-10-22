<?php

namespace App\JsonRpc;

use Hyperf\RpcClient\AbstractServiceClient;

class CalculatorServiceConsumer extends AbstractServiceClient
{
    /**
     * 定义对应服务提供者的服务名称
     * @var string
     */
    protected $serviceName = 'calculator-service';

    /**
     * 定义对应服务提供者的服务协议
     * @var string
     */
    protected $protocol = 'jsonrpc-http';

    public function calculate(int $a, int $b): int
    {
        return $this->__request(__FUNCTION__, compact('a', 'b'));
    }
}
