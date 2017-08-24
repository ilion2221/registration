<?php

/**
 * Class Db
 * Component for working with the database
 */
class Db
{

    /**
     * Сonnection to the database
     * PDO
     */
    public static function getConnection()
    {
        //Get connection parameters from file
        $paramsPath = ROOT . '/config/db_params.php';
        $params = include($paramsPath);

        // Set up the connection
        $dsn = "mysql:host={$params['host']};dbname={$params['dbname']}";
        $db = new PDO($dsn, $params['user'], $params['password']);

        // Set the encoding
        $db->exec("set names utf8");

        return $db;
    }

}
