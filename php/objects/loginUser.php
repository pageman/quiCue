<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 11:15 PM
 */

    include_once "../controller/Functions.php";

    $phoneNumber = $_POST["phoneNumber"];

    $obj = new Functions();
    $obj->loginUser($phoneNumber);
