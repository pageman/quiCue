<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:15 PM
 */

class DatabaseConnector {
    private $dbHost =  "mysql:host=localhost;";
    private $dbName = "dbName=quiCue";
    private $username = "root";
    private $password = "";
    protected $dbHolder;

    protected function open_connection() {
        $this->dbHolder = new PDO($this->dbHost.$this->dbName, $this->username, $this->password);
    }

    protected function close_connection() {
        $this->dbHolder = null;
    }
} 