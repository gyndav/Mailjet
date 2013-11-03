<?php

namespace Mailjet\Exception;

/**
 * Mailjet API Exception class
 *
 * @author dguyon <dguyon@gmail.com>
 */
class Exception extends \Exception
{
    /**
     * List of codes returned by Mailjet API
     *
     * @var $statusCodes array
     */
    protected static $statusCodes = array(
        0 => 'OK',
        200 => 'OK',
        201 => 'Created',
        204 => 'No Content',
        304 => 'Not Modified',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        500 => 'Internal Server Error',
    );

    /**
     * Constructor
     *
     * @param string $message
     * @param int    $code
     */
    public function __construct($message = null, $code = null, Exception $previous = null)
    {
        if ($message === null && $code !== null && isset(self::$statusCodes[$code])) {
            $message = self::$statusCodes[$code];
        }

        parent::__construct($message, $code, $previous);
    }
}
