<?php

namespace Yampsdk\Endpoint;

class Order extends BaseEndpoint
{
    public function addCreditCardPayment(string $token)
    {
        $payment = array(
            'payment_method' => 'credit_card',
            'credit_card' => array(
                'card_token' => $token
            )
        );
        $this->data['payments'][] = $payment;

        return $this;
    }

    public function addItem(array $item)
    {
        $this->data['items'][] = $item;
        return $this;
    }

    public function addCustomerId(string $customerId)
    {
        $this->data['customer_id'] = $customerId;
        return $this;
    }

    public function create()
    {
        //return $this->postRequest('/orders', $this->jsonSerialize());
        return $this->jsonSerialize();
    }
}
