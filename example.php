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
