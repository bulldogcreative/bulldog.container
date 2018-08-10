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

    public function testGoodGetCall()
    {
        $value = 'test';
        $this->container->set('test', $value);
        $result = $this->container->get('test');
        $this->assertSame($result, $value);
    }
}
