# Bulldog Container

[![Build Status](https://travis-ci.org/bulldogcreative/bulldog.container.svg?branch=master)](https://travis-ci.org/bulldogcreative/bulldog.container)

Aka, the dog house. This container implements [PSR-11][2].

## Installation

```sh
composer require bulldog/container
```

## Usage

You **should** check to see if the container `has` an entry for that ID before
you try to `get` that entry.

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
