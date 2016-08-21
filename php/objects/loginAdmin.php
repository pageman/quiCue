<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 4:27 PM
 */

    include_once "../controller/Functions.php";

    $username = $_POST["username"];
    $password = $_POST["password"];

    $obj = new Functions();
    $obj->loginAdmin($username, $password);