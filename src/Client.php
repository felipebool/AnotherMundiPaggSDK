<?php

namespace Yampsdk;

use Yampsdk\Endpoint\Charge;

class Client
{
    private $secretKey;
    private $password;
    private $endpoint;

    public function __construct(
        string $secretKey,
        string $password,
        string $endpoint = '\\Yampsdk\\Endpoint\\'
    ) {
        $this->secretKey = $secretKey;
        $this->password = $password;
        $this->endpoint = $endpoint;
    }

    public function getCharge(): Charge
    {
        return new Charge($this->endpoint);
    }

    public function getEndpoint(): string
    {
        return $this->endpoint;
    }
}