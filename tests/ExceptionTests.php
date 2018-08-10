<?php

use PHPUnit\Framework\TestCase;

class ExceptionTests extends TestCase
{
    private $container;

    public function setUp()
    {
        $this->container = new Bulldog\Container\Container;
    }

    /**
     * @expectedException Bulldog\Container\NotFoundException
     */
    public function testGetException()
    {
        $result = $this->container->get('not-in-there');
    }

    /**
     * @expectedException Psr\Container\NotFoundExceptionInterface
     */
    public function testGetExceptionInterface()
    {
        $result = $this->container->get('not-in-there');
    }
}
