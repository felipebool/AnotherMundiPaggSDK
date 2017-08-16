<?php
/**
 * Created by PhpStorm.
 * User: felipe
 * Date: 8/16/17
 * Time: 2:18 AM
 */

namespace Yampsdk\Endpoint;


class Customer extends BaseEndpoint
{
    protected $id;
    protected $name;
    protected $email;
    protected $phones;
    protected $document;
    protected $type;
    protected $address;
    protected $fbId;
    protected $fbAccessToken;
    protected $delinquent;
    protected $code;
    protected $createdAt;
    protected $updatedAt;
    protected $birthdate;
    protected $metadata;
}