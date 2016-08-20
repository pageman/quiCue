<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 2:20 PM
 */

    include_once "../controller/Functions.php";

    $phoneNumber = $_POST["phoneNumber"];
    $verificationCodeEntered = $_POST["verificationCodeEntered"];

    $obj = new Functions();
    $obj->checkVerificationCode($phoneNumber, $verificationCodeEntered);