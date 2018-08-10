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
    public function testBulldogGettingNotFoundException()
    {
        $result = $this->container->get('not-in-there');
    }

    /**
     * @expectedException Psr\Container\NotFoundExceptionInterface
     */
    public function testPsrGettingNotFoundException()
    {
        $result = $this->container->get('not-in-there');
    }

    /**
     * @expectedException Bulldog\Container\ContainerException
     * @expectedExceptionMessage ID MUST be a string.
     */
    public function testSetNotStringException()
    {
        $this->container->set(new class {
        }, 'value');
    }

    /**
     * @expectedException Bulldog\Container\ContainerException
     * @expectedExceptionMessage ID MUST be a string.
     */
    public function testGetNotStringException()
    {
        $this->container->get(new class {
        }, 'value');
    }

    /**
     * @expectedException Bulldog\Container\ContainerException
     * @expectedExceptionMessage ID MUST be a string.
     */
    public function testHasNotStringException()
    {
        $this->container->has(new class {
        }, 'value');
    }
}
