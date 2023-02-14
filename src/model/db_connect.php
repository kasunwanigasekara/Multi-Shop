<?php
namespace Multishop\model;

class db_connect
{
    public  function connect()
    {
        $pdo = require __DIR__ . '/../config/Pdo.php';
        return $pdo;
    }
}

?>