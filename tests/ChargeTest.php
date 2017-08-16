<?php

namespace Yampsdk\Endpoint;

use PHPUnit\Framework\TestCase;
use Yampsdk\Client;

class ChargeTest extends TestCase
{
    public function testCreateCharge()
    {
        $client = new Client('key', 'pass');
        $charge = new Charge($client->getEndpoint());

        $this->assertInstanceOf(Charge::class, $charge);
    }

    private function getCustomer(): Customer
    {
        $customer = new Customer();
        $customer->setId('idValue');
        $customer->setName('nameValue');
        $customer->setEmail('emailValue');
        $customer->setPhones('phonesValue');
        $customer->setDocument('documentValue');
        $customer->setType('typeValue');
        $customer->setAddress('addressValue');
        $customer->setFbId('fbIdValue');
        $customer->setFbAccessToken('fbAccessTokenValue');
        $customer->setDelinquent('delinquentValue');
        $customer->setCode('codeValue');
        $customer->setCreatedAt('createdAtValue');
        $customer->setUpdatedAt('setUpdatedAtvalue');
        $customer->setBirthdate('birthdateValue');
        $customer->setMetadata(array('meta1' => 'data1', 'meta2' => 'data2'));

        return $customer;
    }

    public function testCreateChargeWithoutComplexClasses()
    {
        $client = new Client('key', 'pass');
        $charge = new Charge($client->getEndpoint());

        $charge->setId('idValue');
        $charge->setGatewayId('gatewayIdValue');
        $charge->setAmount('amountValue');
        $charge->setPaymentMethod('paymentMethodValue');
        $charge->setStatus('statusValue');
        $charge->setDueAt('dueAtValue');
        $charge->setCreatedAt('createdAtValue');
        $charge->setUpdatedAt('updateAtValue');
        $charge->setCustomer($this->getCustomer());
        $charge->setInvoice('invoiceValue');
        $charge->setLastTransaction('lastTransactionValue');
        $charge->setMetadata(array('meta1' => 'data1', 'meta2' => 'data2'));

        $encodedCharge = json_encode($charge, JSON_PRETTY_PRINT);

        echo $encodedCharge;
        $this->assertJson($encodedCharge);
    }

    public function testCreateChargeWithComplexClasses()
    {
        $client = new Client('key', 'pass');


        $charge = new Charge($client->getEndpoint());

        $charge->setId('idValue');
        $charge->setGatewayId('gatewayIdValue');
        $charge->setAmount('amountValue');
        $charge->setPaymentMethod('paymentMethodValue');
        $charge->setStatus('statusValue');
        $charge->setDueAt('dueAtValue');
        $charge->setCreatedAt('createdAtValue');
        $charge->setUpdatedAt('updateAtValue');
        $charge->setCustomer('customerValue');
        $charge->setInvoice('invoiceValue');
        $charge->setLastTransaction('lastTransactionValue');
        $charge->setMetadata(array('meta1' => 'data1', 'meta2' => 'data2'));

        $encodedCharge = json_encode($charge, JSON_PRETTY_PRINT);

        echo $encodedCharge;
        $this->assertJson($encodedCharge);
    }
}
