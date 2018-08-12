<?php

namespace Bulldog;

use Psr\Container\ContainerInterface;

/**
 * Class Container
 * @package Bulldog\Container
 */
class Container implements ContainerInterface, \ArrayAccess
{
    /**
     * @var array
     */
    private $container;

    /**
     * Get an entry from the container.
     *
     * This method will attempt to get an entry from the container. The ID must
     * be a string or it will throw a ContainerException. It will then check
     * if the container has an entry for that ID, if it does not then it
     * will throw a NotFoundException.
     *
     * @param string $id
     * @return mixed
     * @throws ContainerException
     * @throws NotFoundException
     */
    public function get($id)
    {
        $this->validateId($id);

        if ($this->has($id)) {
            return $this->container[$id];
        }

        throw new NotFoundException();
    }

    /**
     * See if the container has an entry for the ID.
     *
     * Has will check the container to see if there is an entry for the ID. The
     * ID must be a string or it will throw a ContainerException. Then it will
     * check to see if the container has an entry, it will return true if it
     * has one and false if it doesn't.
     *
     * @param string $id
     * @return bool
     * @throws ContainerException
     */
    public function has($id)
    {
        $this->validateId($id);

        if (isset($this->container[$id])) {
            return true;
        }

        return false;
    }

    /**
     * Add a new entry to the container.
     *
     * Set will add a new entry to the container. The ID must be a string or it
     * will throw a ContainerException. The value can be anything, as long as
     * it isn't itself. Don't try and add the container to the container.
     * It returns the value that you set, if you want to confirm that.
     *
     * @param $id
     * @param $value
     * @return mixed
     * @throws ContainerException
     */
    public function set($id, $value)
    {
        $this->validateId($id);

        return $this->container[$id] = $value;
    }
    
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }
    
    public function offsetGet($offset)
    {
        return $this->get($offset);
    }
    
    public function offsetSet($offset, $value)
    {
        $this->set($offset, $value);
    }
    
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Check if ID is a string.
     *
     * If ID is not a string, throw the exception. Otherwise, do nothing.
     *
     * @param $id
     * @throws ContainerException
     */
    private function validateId($id)
    {
        if (!is_string($id)) {
            throw new ContainerException('ID MUST be a string.');
        }
    }
}
