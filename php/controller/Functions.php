<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:18 PM
 */

include_once "DatabaseConnector.php";
class Functions extends DatabaseConnector {
    function addAdmin($type, $address, $name, $username, $password) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("INSERT INTO admins VALUES (null, ?, ?, ?, ?, password(?));");
        $sql->execute(array(htmlentities($type), htmlentities($address), htmlentities($name), htmlentities($username), htmlentities($password)));

        $this->close_connection();
    }

    function addUser($phoneNumber, $verificationCode) {
        $this->open_connection();

        $sqlCheckPhoneNumber = $this->dbHolder->prepare("SELECT * FROM users WHERE phoneNumber = ?;");
        $sqlCheckPhoneNumber->execute(array($phoneNumber));

        if($sqlCheckPhoneNumber->fetch()) {
            echo "The phone number you entered is already in use.";
        } else {
            $sql = $this->dbHolder->prepare("INSERT INTO users VALUES(null, ?, ?, 0)");
            $sql->execute(array(htmlentities($phoneNumber), $verificationCode));
        }

        $this->close_connection();
    }

    function checkVerificationCode($phoneNumber, $verificationCodeEntered) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT verificationCode FROM users WHERE phonheNumber = ?;");
        $sql->execute(array($phoneNumber));
        $data = $sql->fetch();

        if($data[0] == $verificationCodeEntered) {
            $sqlVerifyUser = $this->dbHolder->prepare("UPDATE users SET status = 1 WHERE phoneNumber = ?;");
            $sqlVerifyUser->execute(array($phoneNumber));
        } else {
            echo "You entered an invalid verification code.";
        }

        $this->close_connection();
    }

    function displayNearRespondents($type, $address) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT * FROM admins WHERE type = ?;");
        $sql->execute(array($type));

        

        $this->close_connection();
    }

    function addLog($adminId, $message) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("INSERT INTO logs VALUES (null, ?, ?, ?, ?, ?, 0);");
        $sql->execute(array($adminId, $_SESSION["userId"], nl2br(htmlentities($message)), $this->getCurrentTime(), $this->getCurrentDate()));

        $this->close_connection();
    }

    function displayLogs() {
        $this->open_connection();

        $sql = $this->dbHolder->query("SELECT u.phoneNumber, l.* FROM users u, logs l WHERE u.userId = l.userId ORDER BY l.status ASC, l.dateReceived DESC, l.timeReceived DESC;");
        $dataToDisplay = "";
        while($data = $sql->fetch()) {
            if($data[7] == 1) $class = "alreadySeen"; // Anjo, please specify here the class for seen logs
            else $class = "unseen"; // and if not yet seen, what would be the style
            $dataToDisplay .= "<div class='".$class."'>
                                    <p onclick='viewFullLog(".$data[1].")'><span id='contactNumber'>".$data[0]."</span><span id='timeReceived'>".$data[5]."</span><span id='dateReceived'>".$data[6]."</span></p>
                                    <p id='message'>".$data[4]."</p>
                               </div>";
        }
        $this->close_connection();
        echo $dataToDisplay;
    }

    function displayFullLog($logId) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT u.phoneNumber, l.* FROM users u, logs l WHERE logId = ?;");
        $sql->execute(array($logId));

        $dataToDisplay = "";
        $data = $sql->fetch();
        if($data[7] == 0) {
            $sqlSetStatus = $this->dbHolder->prepare("UPDATE logs SET status = 1 WHERE logId = ?;");
            $sqlSetStatus->execute(array($logId));
        }

        $dataToDisplay .= "<div>
                                <p onclick='viewFullLog(".$data[1].")'><span id='contactNumber'>".$data[0]."</span><span id='timeReceived'>".$data[5]."</span><span id='dateReceived'>".$data[6]."</span></p>
                                <p id='message'>".$data[4]."</p>
                           </div>";

        $this->close_connection();
        echo $dataToDisplay;
    }

    function getCurrentTime() {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT CURTIME();");
        $time = $sql->fetch();

        $this->close_connection();
        return $time[0];
    }

    function getCurrentDate() {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT CURDATE();");
        $date = $sql->fetch();

        $this->close_connection();
        return $date[0];
    }
} 