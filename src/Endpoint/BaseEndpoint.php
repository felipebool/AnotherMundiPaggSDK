<?php

namespace Yampsdk\Endpoint;

use Yampsdk\Config;
use GuzzleHttp\Client as GuzzleClient;

class BaseEndpoint implements \JsonSerializable
{
    protected $data;
    protected $config;

    public function __construct(Config $config)
    {
        $this->data = array();
        $this->config = $config;
    }

    public function __call(string $name, array $arguments)
    {
        $action = substr($name, 0, 3);
        $property = substr($name, 3);
        $value = $arguments[0];

        switch ($action) {
            case 'get':
                return $this->getter(lcfirst($property));
            case 'set':
                return $this->setter($property, $value);
            default:
                throw new \Exception('Error: Unknown method' . $name);
        }
    }

    private function getter(string $name): string
    {
        return isset($this->data[$name]) ? $this->data[$name] : null;
    }

    private function setter(string $name, $arguments)
    {
        $this->data[lcfirst($name)] = $arguments;
        return $this;
    }

    protected function camelCaseToSnakeCase(string $name): string
    {
        $result = '';

        for ($i = 0; $i < strlen($name); $i++) {
            if (ctype_upper($name[$i])) {
                $result .= '_' . strtolower($name[$i]);
            } else {
                $result .= $name[$i];
            }
        }

        return $result;
    }

    protected function isObject(string $className): bool
    {
        return class_exists($this->config->getEndpoint() . ucwords($className));
    }

    public function jsonSerialize(): array
    {
        $result = array();

        foreach ($this->data as $key => $value) {
            $propertyName = $this->camelCaseToSnakeCase($key);

            if ($this->isObject($key)) {
                $result[$propertyName] = json_encode($this->data[$key], JSON_PRETTY_PRINT);
            } elseif (isset($this->data[$key])) {
                $result[$propertyName] = $value;
            }
        }

        return $result;
    }

    protected function postRequest(string $endpoint, array $body)
    {
        $client = new GuzzleClient();
        $response = $client->request(
            'POST',
            $this->config->getApiUrl() . $endpoint,
            [
                'auth' => [
                    $this->config->getSecretKey(),
                    $this->config->getPassword()
                ],
                'json' => $body
            ]
        );

        return $response;
    }
}
