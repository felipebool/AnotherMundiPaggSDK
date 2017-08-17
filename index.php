<?php

require_once 'vendor/autoload.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

use Yampsdk\Client;
use Yampsdk\Config;

$config = new Config();
$config
    ->setSecretKey('sk_test_jY7RoLcM2Bd6VLWH')
    ->setPassword('')
    ->setApiUrl('https://api.mundipagg.com/core/v1');

$client = new Client($config);
$customer = $client->getCustomer();
$customer
    ->setName('Usuário Teste')
    ->setEmail('usuario@teste.com');

$response = $customer->create();
$body = json_decode($response->getBody()->getContents(), true);

$order = $client->getOrder();
$order
    ->addCustomerId($body['id'])
    ->addCreditCardPayment('token')
    ->addItem(array(
        'amount' => 'amountValue',
        'description' => 'descriptionValue',
        'quantity' => 'quantityValue'
    ));

$orderValue = json_encode($order->create(), JSON_PRETTY_PRINT);

$a = 1;

