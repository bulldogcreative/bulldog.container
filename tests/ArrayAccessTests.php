<?php

use PHPUnit\Framework\TestCase;

class ArrayAccessTests extends TestCase
{
    private $container;

    public function setUp()
    {
        $this->container = new Bulldog\Container;
    }
    
    public function testOffsetExists()
    {
        $this->container['test'] = 'hello';
        $this->assertTrue(isset($this->container['test']));
        $this->assertFalse(isset($this->container['notset']));
    }
    
    public function testOffsetSetAndGet()
    {
        $value = 'hello';
        $this->container['test'] = $value;
        $result = $this->container['test'];
        $this->assertSame($value, $result);
    }
    
    public function testUnsetOffset()
    {
        $this->container['test'] = 'something';
        unset($this->container['test']);
        $this->assertFalse(isset($this->container['test']));
    }
    
    public function testDifferentTypesOfValues()
    {
        $toTest = [
            1 => [
                'key' => 'one',
                'value' => function() {
                    new stdClass();
                },
                'type' => 'null',
            ],
            2 => [
                'key' => 'two',
                'value' => 'test',
                'type' => 'string',
            ],
            3 => [
                'key' => 'three',
                'value' => 1,
                'type' => 'int',
            ],
            4 => [
                'key' => 'four',
                'value' => [],
                'type' => 'array',
            ],
        ];
        
        foreach($toTest as $test) {
            $this->container[$test['key']] = $test['value'];
            $value = $this->container[$test['key']];
            $this->assertInternalType($test['type'], $value);
        }
    }
    
}
