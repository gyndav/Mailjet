# Mailjet API wrapper for PHP 5.3

## Requirements

- PHP >= 5.3.2
- CURL extension for PHP
- a Mailjet account with your apiKey and apiSecret (subscribe at http://www.mailjet.com/)

## How to use

### Install vendors

After cloning or downloading this library, just hit your favorite terminal with :

    $ curl -s http://getcomposer.org/installer | php
    $ php composer.phar install

### Autoload

This library is using PSR-0 autoloading conventions helped by the Composer :

    require_once path/to/vendor/.composer/autoload.php';

### Create a Connection

    $connection = Mailjet\Connection\Curl('MAILJET_API_KEY', 'MAILJET_API_SECRET');

You can customize Mailjet connection with options :

    $connection->setOption('protocol', 'https');
    $connection->setOption('output', 'xml');

### Choose your API

Mailjet API is divided into 4 types and each type has a dedicated class :

* Contact
* Lists
* Message
* User

Instanciate an API is like :

    $mailjet = new Mailjet\Api\Lists($connection);
    $results = $mailjet->getAll();

## Credits

Credits goes to J.Wage as an inspiration for classes structure.