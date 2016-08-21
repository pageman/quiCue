<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 4:42 PM
 */

    session_start();

    if(isset($_SESSION["adminId"])) {
        session_unset();
        session_destroy();
    }
    header("Location: login.php");