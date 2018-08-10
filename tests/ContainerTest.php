<?php

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    private $container;

    public function setUp()
    {
        $this->container = new Bulldog\Container\Container;
    }

    public function testSet()
    {
        $id = 'id';
        $value = 'bulldog';

        $result = $this->container->set($id, $value);
        $this->assertSame($result, $value);
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
