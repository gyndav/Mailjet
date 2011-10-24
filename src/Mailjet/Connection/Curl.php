<?php

namespace Mailjet\Connection;

use Mailjet\Exception\Exception as ConnectionException;

/**
 * cURL connection class
 * 
 * @author dguyon <dguyon@gmail.com>
 */
class Curl extends HttpConnection
{
    /**
     * Execute a cURL request to Mailjet API
     * 
     * @param string $url
     * @param array $params
     * @param string $method http method
     * @return string the Mailjet API response
     */
    public function request($url, array $params = array(), $method = 'GET')
    {
        $ch = curl_init();
        
        if ($method == 'POST') {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        } else {
            $url .= '?'.http_build_query($params);
        }
        
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 3);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_USERPWD, $this->apiKey.':'.$this->secretKey);
        
        $response = curl_exec($ch);
        $responseCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        $curlErrorNumber = curl_errno($ch);
        $curlErrorMessage = curl_error($ch);
        
        curl_close($ch);
        
//        echo '$url : '.$url;
//        echo '$params'."\n";
//        var_dump($params);
//        echo('$response : '.$response."\n");
//        echo('$responseCode : '.$responseCode."\n");
//        echo('$curlErrorNumber : '.$curlErrorNumber."\n");
//        echo('$curlErrorMessage : '.$curlErrorMessage."\n");
        
        if (!in_array($responseCode, array(0, 200, 201, 204))) {
            throw new ConnectionException(null, (int)$responseCode);
        }
        
        if (!empty($curlErrorNumber)) {
            throw new ConnectionException($curlErrorMessage, (int)$curlErrorNumber);
        }
        
        return $response;
    }
}