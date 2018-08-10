<?php

namespace Bulldog\Container;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private $container;

    public function get($id)
    {

    }

    public function has($id)
    {
     //
    }

    public function set($id, $value)
    {
        return $this->container[$id] = $value;
    }
}
