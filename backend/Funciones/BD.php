<?php

namespace Funciones;

use Exception;
use PDO;

class BD
{
    public static function obtenerHoteles()
    {
        try {
            $password = Utiles::obtenerVariableDelEntorno("MYSQL_PASSWORD");
            $user = Utiles::obtenerVariableDelEntorno("MYSQL_USER");
            $dbName = Utiles::obtenerVariableDelEntorno("MYSQL_DATABASE_NAME");
            $port = Utiles::obtenerVariableDelEntorno("MYSQL_PORT");
            $host = Utiles::obtenerVariableDelEntorno("MYSQL_HOST");
            $database = new PDO('mysql:host=' . $host . ':' . $port . ';dbname=' . $dbName, $user, $password);
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $database;
        } catch (Exception $e) {
            return $e;
        }
    }
    public static function obtenerAdmin()
    {
        try {
            $password = Utiles::obtenerVariableDelEntorno("MYSQL_PASSWORD");
            $user = Utiles::obtenerVariableDelEntorno("MYSQL_USER");
            $dbName = Utiles::obtenerVariableDelEntorno("MYSQL_DATABASE_NAME_ADMIN");
            $port = Utiles::obtenerVariableDelEntorno("MYSQL_PORT");
            $host = Utiles::obtenerVariableDelEntorno("MYSQL_HOST");
            $database = new PDO('mysql:host=' . $host . ':' . $port . ';dbname=' . $dbName, $user, $password);
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $database;
        } catch (Exception $e) {
            return $e;
        }
    }

    public static function obtenerSybase()
    {
        try {

            $dsn = Utiles::obtenerVariableDelEntorno("SYBASE_DSN");
            $user = Utiles::obtenerVariableDelEntorno("SYBASE_USER");
            $password = Utiles::obtenerVariableDelEntorno("SYBASE_PASSWORD");
            return odbc_connect($dsn, $user, $password);
        } catch (Exception $e) {
            return $e;
        }
    }
    public static function obtenerTest()
    {
        try {
            $password = Utiles::obtenerVariableDelEntorno("MYSQL_TEST_PASSWORD");
            $user = Utiles::obtenerVariableDelEntorno("MYSQL_TEST_USER");
            $dbName = Utiles::obtenerVariableDelEntorno("MYSQL_TEST_NAME");
            $port = Utiles::obtenerVariableDelEntorno("MYSQL_TEST_PORT");
            $host = Utiles::obtenerVariableDelEntorno("MYSQL_TEST_HOST");
            $database = new PDO('mysql:host=' . $host . ':' . $port . ';dbname=' . $dbName, $user, $password);
            $database->query("set names utf8;");
            $database->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            $database->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $database->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            return $database;
        } catch (Exception $e) {
            return $e;
        }
    }
}
