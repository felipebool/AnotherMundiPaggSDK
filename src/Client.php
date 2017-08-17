<?php

namespace Yampsdk;

use Yampsdk\Endpoint\Charge;
use Yampsdk\Endpoint\Customer;
use Yampsdk\Endpoint\Order;

class Client
{
    private $config;
    private $endpoint;

    public function __construct(Config $config, string $endpoint = '\\Yampsdk\\Endpoint\\')
    {
        $this->config = $config;
        $this->config->setEndpoint($endpoint);
    }

    public function getCharge(): Charge
    {
        return new Charge($this->config);
    }

    public function getCustomer(): Customer
    {
        return new Customer($this->config);
    }

    public function getOrder(): Order
    {
        return new Order($this->config);
    }
}
