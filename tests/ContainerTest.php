<?php

use PHPUnit\Framework\TestCase;

class ContainerTest extends TestCase
{
    public function testSet()
    {
        $id = 'id';
        $value = 'bulldog';

        $container = new Bulldog\Container\Container;

        $result = $container->set($id, $value);
        $this->assertSame($result, $value);
    }
}
