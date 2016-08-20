<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 2:00 PM
 */

    include_once "../controller/Functions.php";

    $logId = $_POST["logId"];

    $obj = new Functions();
    $obj->displayFullLog($logId);