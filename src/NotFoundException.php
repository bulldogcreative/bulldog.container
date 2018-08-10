<?php

namespace Bulldog\Container;

use Psr\Container\NotFoundExceptionInterface;
use Psr\Container\ContainerExceptionInterface;

class NotFoundException extends ContainerException implements NotFoundExceptionInterface
{
}
