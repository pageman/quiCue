<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:59 PM
 */

    include_once "../controller/Functions.php";

    $phoneNumber = $_POST["phoneNumber"];

    $verificationCode = rand(0, 99999);

    $obj = new Functions();
    $obj->addUser($phoneNumber, $verificationCode);
    echo $verificationCode;