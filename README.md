# Bulldog Container

[![Travis (.org) branch](https://img.shields.io/travis/bulldogcreative/bulldog.container/master.svg?style=flat-square)](https://travis-ci.org/bulldogcreative/bulldog.container)
[![Coveralls github](https://img.shields.io/coveralls/github/bulldogcreative/bulldog.container.svg?style=flat-square)](https://coveralls.io/github/bulldogcreative/bulldog.container)
[![Packagist](https://img.shields.io/packagist/v/bulldog/container.svg?style=flat-square)](https://packagist.org/packages/bulldog/container)
[![Packagist](https://img.shields.io/packagist/dt/bulldog/container.svg?style=flat-square)](https://packagist.org/packages/bulldog/container)


Aka, the dog house. This container implements [PSR-11][2] and [ArrayAccess][5].

## Installation

```sh
composer require bulldog/container
```

## Usage

You **should** check to see if the container `has` an entry for that ID before
you try to `get` that entry.

### Key / Value

```php
<?php
include 'vendor/autoload.php';

$container = new Bulldog\Container;

$value = $container->set('id', 'value');
echo $value;
// value

$result = $container->has('id');
var_dump($result);
// bool(true)

$value = $container->get('id');
echo $value;
// value
```

### Key / Closure

If the value associated with the key is [callable][4], then the container will 
call it for you, returning the contents of the closure. This allows you to 
lazy load classes or services. 

```php
<?php
include 'vendor/autoload.php';

$container = new Bulldog\Container;

class Example
{
    public function test()
    {
        echo 'it works!';
    }
    
}

// Using a closure
$container['service'] = function() {
    return new Example;
};

$service = $container['service'];
$service->test();
// it works!

// Storing an object (not lazy loaded)
$container['service'] = new Example;
$service = $container['service'];
$service->test();
// it works!
```

### Dependency Injection Container

```php
<?php

include 'vendor/autoload.php';

$container = new Bulldog\Container;

class Required 
{
    private $test = "Hello";
    
    public function getTest()
    {
        return $this->test;
    }
}

class Example
{
    private $required;
    
    public function __construct(Required $required)
    {
        $this->required = $required;
    }
    
    public function run()
    {
        echo $this->required->getTest();
    }
    
}
$container['required'] = function() {
    return new Required;
};

$container['example'] = function($c) {
    return new Example($c['required']);
};

$e = $container['example'];
$e->run();
```

### Available Methods

| Method | Parameters      | Returns | Exceptions                               |
|--------|-----------------|---------|------------------------------------------|
| `set`  | `$id`, `$value` | mixed   | `ContainerException`                     |
| `has`  | `$id`           | boolean | `ContainerException`                     |
| `get`  | `$id`           | mixed   | `ContainerException`, `NotFoundException` |

*All parameters are required.*

Users **SHOULD NOT** pass a container into an object so that the object can retrieve its own dependencies. Please refer to the [Meta Document][1] provided by

## Contributing

All contributions welcome! Please first create an issue if something is wrong
and let us know if you intend to fix it. Then fork the repo, create a new
branch, and work on the issue. The branch name should be relevant to the
issue.

## Style

Run `php-cs-fixer` with the default rules.

```bash
php-cs-fixer fix ./src
php-cs-fixer fix ./tests
```

[1]: https://www.php-fig.org/psr/psr-11/meta/#4-recommended-usage-container-psr-and-the-service-locator
[2]: https://www.php-fig.org/psr/psr-11/
[3]: https://www.bulldogcreative.com
[4]: https://secure.php.net/is_callable
[5]: https://secure.php.net/array_access
