<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/21/16
 * Time: 12:00 PM
 */
    session_start();
    if(isset($_SESSION["userId"])) {
        session_unset();
        session_destroy();
    }
    header("Location: index.php");