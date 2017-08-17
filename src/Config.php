<?php

namespace Yampsdk;

class Config
{
    private $data;

    public function __construct()
    {
        $this->data = array();
    }

    public function __call($name, $arguments)
    {
        $action = substr($name, 0, 3);
        $property = substr($name, 3);

        switch ($action) {
            case 'get':
                return $this->getter($property);
            case 'set':
                return $this->setter($property, $arguments[0]);
            default:
                throw new \Exception('Error: Unknown method: ' . $name);
        }
    }

    private function getter(string $property)
    {
        return isset($this->data[$property]) ? $this->data[$property] : null;
    }

    private function setter($property, $value): Config
    {
        $this->data[$property] = $value;
        return $this;
    }
}