<?php

namespace Bulldog\Container;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private $container;

    public function get($id)
    {
        if($this->has($id)) {
            return $this->container[$id];
        }

        throw new \Bulldog\Container\NotFoundException();
    }

    public function has($id)
    {
        if(isset($this->container[$id])) {
            return true;
        }

        return false;
    }

    public function set($id, $value)
    {
        return $this->container[$id] = $value;
    }
}
