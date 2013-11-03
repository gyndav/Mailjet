<?php

namespace Mailjet\Connection;

interface ConnectionInterface
{
    public function setOption($key, $value);

    public function get($path, array $params = array());

    public function post($path, array $params = array());
}
