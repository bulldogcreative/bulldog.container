<?php

use PHPUnit\Framework\TestCase;

class ContainerTests extends TestCase
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

    public function testGoodGetCall()
    {
        $value = 'test';
        $this->container->set('test', $value);
        $result = $this->container->get('test');
        $this->assertSame($result, $value);
    }
}
