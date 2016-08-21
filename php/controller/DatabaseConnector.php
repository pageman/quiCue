<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:15 PM
 */

class DatabaseConnector {
    protected  $dbHost =  "mysql:host=localhost;";
    protected  $dbName = "dbname=quiCue";
    protected  $username = "root";
    protected  $password = "";
    protected $dbHolder;

    protected function open_connection() {
        $this->dbHolder = new PDO($this->dbHost.$this->dbName, $this->username, $this->password);
    }

    protected function close_connection() {
        $this->dbHolder = null;
    }
} 