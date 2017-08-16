<?php

namespace Yampsdk\Endpoint;

class BaseEndpoint implements \JsonSerializable
{
    public function __call(string $name, array $arguments)
    {
        $method = substr($name, 0, 3);

        switch ($method) {
            case 'get':
                return $this->getter(lcfirst(substr($name, 3)));
            case 'set':
                $this->setter(lcfirst(substr($name, 3)), $arguments);
                break;
            default:
                throw new \Exception('Error: Unknown method' . $name);
        }
    }

    private function getter(string $name): string
    {
        if (property_exists($this, $name)) {
            return $this->{$name};
        }

        throw new \Exception('Error: Unknown property ' . $name);
    }

    private function setter(string $name, array $arguments): void
    {
        if (property_exists($this, $name)) {
            $this->{$name} = $arguments[0];
            return;
        }

        throw new \Exception('Error: Unknown property ' . $name);
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
        return class_exists('\\Yampsdk\\Endpoint\\' . ucwords($className));
    }

    public function jsonSerialize()
    {
        $result = array();
        $properties = get_object_vars($this);

        foreach ($properties as $name => $value) {
            $propertyName = $this->camelCaseToSnakeCase($name);
            if ($this->isObject($name)) {
                $result[$propertyName] = json_encode($this->{$name}, JSON_PRETTY_PRINT);
            } elseif (isset($this->{$name})) {
                $result[$propertyName] = $value;
            }
        }

        return $result;
    }
}
