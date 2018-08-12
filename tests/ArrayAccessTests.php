<?php

use PHPUnit\Framework\TestCase;

class ArrayAccessTests extends TestCase
{
    private $container;

    public function setUp()
    {
        $this->container = new Bulldog\Container;
    }
}
