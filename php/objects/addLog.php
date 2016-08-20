<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:59 PM
 */

    include_once "../controller/Functions.php";

    $adminId = $_POST["adminId"];
    $message = $_POST["message"];

    $obj = new Functions();
    $obj->addLog($adminId, $message);