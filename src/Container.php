<?php

namespace Bulldog\Container;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private $container;

    public function get($id)
    {
        $this->validateId($id);

        if($this->has($id)) {
            return $this->container[$id];
        }

        throw new \Bulldog\Container\NotFoundException();
    }

    public function has($id)
    {
        $this->validateId($id);

        if(isset($this->container[$id])) {
            return true;
        }

        return false;
    }

    public function set($id, $value)
    {
        $this->validateId($id);

        return $this->container[$id] = $value;
    }

    private function validateId($id)
    {
        if(!is_string($id)) {
            throw new \Bulldog\Container\ContainerException('ID MUST be a string.');
        }
    }
}
