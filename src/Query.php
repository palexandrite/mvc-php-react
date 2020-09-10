<?php

namespace Src;

/**
 * @var $config array The configuration of the App
 * @author Alexander Bulatov <alexander.leon.bulatov@gmail.com>
 */
class Query
{
    private $pdo;

    public function __construct()
    {
        $dsn = 'mysql:host='. DB_HOST .';dbname='. DB_NAME .';charset='. DB_CHARSET;
        $opt = [
            \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
            \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_ASSOC,
            \PDO::ATTR_EMULATE_PREPARES   => false,
        ];
        $this->pdo = new PDO($dsn, DB_USER, DB_PASSWORD, $opt);
    }

    public function all()
    {

    }

    public function one()
    {

    }
}