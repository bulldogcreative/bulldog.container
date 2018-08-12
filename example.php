<?php
include 'vendor/autoload.php';

$container = new Bulldog\Container;
$container->set('id', 'value');
$value = $container->get('id');
echo $value;
// value

$result = $container->has('id');

var_dump($result);
// bool(true)

class Example
{
    public function test()
    {
        echo 'it works!';
    }
    
}

$container['service'] = function() {
    return new Example;
};

$service = $container['service'];
$service->test();
// it works!

$container['service'] = new Example;
$service = $container['service'];
$service->test();
// it works!