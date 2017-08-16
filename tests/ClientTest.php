<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 8/16/17
 * Time: 1:33 AM
 */

use Yampsdk\Client;
use PHPUnit\Framework\TestCase;

class ClientTest extends TestCase
{
    public function testCreateClient()
    {
        $client = new Client('key', 'pass');
        $this->assertInstanceOf(Client::class, $client);
    }
}
