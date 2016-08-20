<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:59 PM
 */

    include_once "../controller/Functions.php";

    $type = $_POST["type"];
    $address = $_POST["address"];
    $name = $_POST["name"];
    $username = $_POST["username"];
    $password =$_POST["password"];

    $obj = new Functions();
    $obj->addAdmin($type, $address, $name, $username, $password);