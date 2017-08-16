<?php

namespace Yampsdk\Endpoint;

class Charge extends BaseEndpoint
{
    protected $id;
    protected $gatewayId;
    protected $amount;
    protected $paymentMethod;
    protected $status;
    protected $dueAt;
    protected $createdAt;
    protected $updatedAt;
    protected $customer;
    protected $invoice;
    protected $lastTransaction;
    protected $metadata;

    public function create(): string
    {
    }
}

