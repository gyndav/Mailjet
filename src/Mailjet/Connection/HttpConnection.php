<?php

namespace Mailjet\Connection;

/**
 * Abstract class for Connection
 *
 * @author dguyon <dguyon@gmail.com>
 */
abstract class HttpConnection implements ConnectionInterface
{
    protected $apiKey;
    protected $secretKey;

    protected $options = array(
        'url'      => ':protocol://api.mailjet.com/:version/:path',
        'protocol' => 'http',
        'version'  => 0.1,
        'output'   => 'json',
        'strict'   => true
    );

    /**
     * Constructor
     *
     * @param string $apiKey
     * @param string $secretKey
     */
    public function __construct($apiKey, $secretKey)
    {
        $this->apiKey    = $apiKey;
        $this->secretKey = $secretKey;
    }

    /**
     * Change Mailjet default options
     *
     * @param string $key   the key
     * @param string $value the value associated to the key
     */
    public function setOption($key, $value)
    {
        $this->options[$key] = $value;

        return $this;
    }

    /**
     * Perform a GET request
     *
     * @param  string $path
     * @param  array  $params
     * @return array
     */
    public function get($path, array $params = array())
    {
        return $this->execute($path, $params, 'GET');
    }

    /**
     * Perform a POST request
     *
     * @param  string $path
     * @param  array  $params
     * @return array
     */
    public function post($path, array $params = array())
    {
        return $this->execute($path, $params, 'POST');
    }

    /**
     * Build final request
     *
     * @param  string $path
     * @param  array  $params
     * @param  string $method
     * @return array
     */
    public function execute($path, array $params = array(), $method = 'GET')
    {
        // create the url to call the API method
        $url = strtr($this->options['url'], array(
            ':protocol' => $this->options['protocol'],
            ':version' => $this->options['version'],
            ':path' => $path
        ));

        $queryParams = array('output' => $this->options['output']);
        $queryParams = array_merge($params, $queryParams);

        $response = $this->request($url, $queryParams, $method);
        $encodedResponse = $response['response'];

        $decodedResponse = $this->decodeResponse($encodedResponse, $this->options['output']);
        $decodedResponse['code'] = $response['code'];

        return $decodedResponse;
    }

    /**
     * Decode Mailjet API response
     *
     * @param  mixed $encodedResponse
     * @return mixed
     */
    public function decodeResponse($encodedResponse)
    {
        switch ($this->options['output']) {
            case 'json':
                return json_decode($encodedResponse, true);
            case 'php':
                eval('$decodedResponse = '.$encodedResponse.';');

                return $response;
            case 'serialize':
                return unserialize($encodedResponse);
            default:
                return $encodedResponse;
        }
    }

    /**
     * @return array with response and response code keys
     */
    abstract protected function request($url, array $params = array(), $method = 'GET');
}
