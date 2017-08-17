<?php

namespace Yampsdk\Endpoint;

class Customer extends BaseEndpoint
{
    public function create()
    {
        return $this->postRequest('/customers', $this->jsonSerialize());
    }
}
