<?php

require_once 'vendor/autoload.php';

use Yampsdk\Client;

$secretKey = 'secret';
$pass = 'pass';

$client = new Client($secretKey, $pass);