<?php

namespace Mailjet;

use Mailjet\Connection\ConnectionInterface;

/**
 * Base Mailjet API class
 *
 * @author dguyon <dguyon@gmail.com>
 */
class Api
{
    private $connection;

    /**
     * Constructor
     *
     * @param ConnectionInterface $connection
     */
    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection;
    }

    /**
     * Get current connection instance
     *
     * @return ConnectionInterface
     */
    public function getConnection()
    {
        return $this->connection;
    }

    /**
     * Call a path with GET method
     *
     * @param string $path
     * @param array $params
     * @return array
     */
    public function get($path, array $params = array())
    {
        return $this->getConnection()->get($path, $params);
    }

    /**
     * Call a path with POST method
     *
     * @param string $url
     * @param array $params
     * @return array
     */
    public function post($path, array $params = array())
    {
        return $this->getConnection()->post($path, $params);
    }

    /**
     * List all your apiKeys available
     *
     * @param bool $active
     * @return array
     */
    public function getKeyList($active = true)
    {
        return $this->get('apiKeyList', array('active' => (int)$active));
    }
}