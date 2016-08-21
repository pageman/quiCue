<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:18 PM
 */
session_start();

include_once "DatabaseConnector.php";
class Functions extends DatabaseConnector {
    function addAdmin($type, $address, $name, $username, $password, $telephoneNumber, $mobileNumber) {
        $this->open_connection();
        if($mobileNumber != "") "63".$mobileNumber;
        $sql = $this->dbHolder->prepare("INSERT INTO admins VALUES (null, ?, ?, ?, ?, password(?), ?, ?);");
        $sql->execute(array(htmlentities($type), htmlentities($address), htmlentities($name), htmlentities($username), htmlentities($password), $telephoneNumber, $mobileNumber));

        $this->close_connection();
    }

    function loginUser($phoneNumber) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT * FROM users WHERE phoneNumber = ?;");
        $sql->execute(array($phoneNumber));

        $data = $sql->fetch();

        if($data[1] != "") {
            if($data[3] == 1) {
                $_SESSION["userId"] = $data[0];
                $_SESSION["phoneNumber"] = $data[1];
                echo "valid";
            } else {
                echo "Your phone number isn't verified yet. Please enter verification code below";
            }
        } else {
            echo "Your phone number isn't verified yet. Please submit it as register to receive a verifications code.";
        }



        $this->close_connection();
    }

    function loginAdmin($username, $password) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT * FROM admins WHERE username = ? AND password = password(?);");
        $sql->execute(array($username, $password));

        $data = $sql->fetch();

        if($data[0] != "" || $data[0] != NULL) {
            echo "valid";
            $_SESSION["adminId"] = $data[0];
            $_SESSION["type"] = $data[1];
            $_SESSION["address"] = $data[2];
            $_SESSION["name"] = $data[3];
        } else {
            echo "Either you entered an invalid username or password";
        }

        $this->close_connection();
    }

    function addUser($phoneNumber, $verificationCode) {
        $this->open_connection();

        $sqlCheckPhoneNumber = $this->dbHolder->prepare("SELECT * FROM users WHERE phoneNumber = ?;");
        $sqlCheckPhoneNumber->execute(array($phoneNumber));

        if($sqlCheckPhoneNumber->fetch()) {
            echo "used";
        } else {
            $sql = $this->dbHolder->prepare("INSERT INTO users VALUES(null, ?, ?, 0)");
            $sql->execute(array(htmlentities($phoneNumber), $verificationCode));
            $_SESSION["phoneNumberToBeVerified"] = $phoneNumber;
        }

        $this->close_connection();
    }

    function checkVerificationCode($verificationCodeEntered) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT verificationCode FROM users WHERE phoneNumber = ?;");
        $sql->execute(array($_SESSION["phoneNumberToBeVerified"]));
        $data = $sql->fetch();

        if($data[0] == $verificationCodeEntered) {
            echo "valid";
            $sqlVerifyUser = $this->dbHolder->prepare("UPDATE users SET status = 1 WHERE phoneNumber = ?;");
            $sqlVerifyUser->execute(array($_SESSION["phoneNumberToBeVerified"]));
        } else {
            echo "You entered an invalid verification code.";
        }

        $this->close_connection();
    }

    function contactFireMen() {
        $this->open_connection();
        $sql = $this->dbHolder->query("SELECT * FROM admins WHERE type = 'Fire Station';");

        $dataArray = array();
        while($fsData = $sql->fetch()) {
            $tmp = array("adminId"=>$fsData[1], "address"=>$fsData[2], "name"=>$fsData[3], "telephoneNumber"=>$fsData[6], "mobileNumber"=>$fsData[7]);
            array_push($dataArray, $tmp);
        }
        echo json_encode($dataArray);
        $this->close_connection();
    }

    function contactHospital() {
        $this->open_connection();
        $sql = $this->dbHolder->query("SELECT * FROM admins WHERE type = 'Hospital';");

        $dataArray = array();
        while($fsData = $sql->fetch()) {
            $tmp = array("adminId"=>$fsData[0], "address"=>$fsData[2], "name"=>$fsData[3], "telephoneNumber"=>$fsData[6], "mobileNumber"=>$fsData[7]);
            array_push($dataArray, $tmp);
        }
        echo json_encode($dataArray);
        $this->close_connection();
    }
    function contactPolice() {
        $this->open_connection();
        $sql = $this->dbHolder->query("SELECT * FROM admins WHERE type = 'Police Station';");

        $dataArray = array();
        while($fsData = $sql->fetch()) {
            $tmp = array("adminId"=>$fsData[1], "address"=>$fsData[2], "name"=>$fsData[3], "telephoneNumber"=>$fsData[6], "mobileNumber"=>$fsData[7]);
            array_push($dataArray, $tmp);
        }
        echo json_encode($dataArray);
        $this->close_connection();
    }
    function contactRedCross() {
        $this->open_connection();
        $sql = $this->dbHolder->query("SELECT * FROM admins WHERE type = 'Red Cross';");

        $dataArray = array();
        while($fsData = $sql->fetch()) {
            $tmp = array("adminId"=>$fsData[1], "address"=>$fsData[2], "name"=>$fsData[3], "telephoneNumber"=>$fsData[6], "mobileNumber"=>$fsData[7]);
            array_push($dataArray, $tmp);
        }
        echo json_encode($dataArray);
        $this->close_connection();
    }

    function addLog($adminId, $message, $userLocation) {
        $this->open_connection();

        if(trim($message) == "") {
            $message = "Emergency situation at the moment. Please respond.";
        }

        $sql = $this->dbHolder->prepare("INSERT INTO logs VALUES (null, ?, ?, ?, ?, ?, ?, 0);");
        $sql->execute(array($adminId, $_SESSION["userId"], nl2br(htmlentities($message)), $userLocation, $this->getCurrentTime(), $this->getCurrentDate()));

        $sqlAdminMobile = $this->dbHolder->prepare("SELECT mobileNumber FROM admins WHERE adminId = ?;");
        $sqlAdminMobile->execute(array($adminId));

        echo $sqlAdminMobile->fetch()[0];

        $this->close_connection();
    }

    function displayLogs() {
        $this->open_connection();

        $sql = $this->dbHolder->query("SELECT u.phoneNumber, l.* FROM users u, logs l WHERE u.userId = l.userId ORDER BY l.status ASC, l.dateReceived DESC, l.timeReceived DESC;");
        $dataToDisplay = "";
        while($data = $sql->fetch()) {
            if($data[7] == 1) {
                $dataToDisplay .= "<tr>
                                        <div class='alert alert-info'>
                                            <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                                            <button type='button' class='btn btn-xs btn-success' onclick='displayFullLog(".$data[1].")'><span class='hidden-xs glyphicon glyphicon-inbox'></span>+".$data[0]."</button>&nbsp; ".$data[6]." - ".$data[7]."
                                        </div>
                                    </tr>";
            }  else {
                $dataToDisplay .= "<tr><td><button type='button' class='btn btn-success' onclick='displayFullLog(".$data[1].")'>+".$data[0]."</button> &nbsp; ".$data[6]." - ".$data[5]." </td></tr>";
            } // and if not yet seen, what would be the style
            /*$dataToDisplay .= "<div class='".$class."'>
                                    <p onclick='viewFullLog(".$data[1].")'><span id='contactNumber'>".$data[0]."</span><span id='timeReceived'>".$data[5]."</span><span id='dateReceived'>".$data[6]."</span></p>
                                    <p id='message'>".$data[4]."</p>
                               </div>";
            */
        }
        $this->close_connection();
        echo $dataToDisplay;
    }

    function displayFullLog($logId) {
        $this->open_connection();

        $sql = $this->dbHolder->prepare("SELECT u.phoneNumber, l.* FROM users u, logs l WHERE u.userId = l.userId AND l.logId = ?;");
        $sql->execute(array($logId));

        $data = $sql->fetch();
        if($data[7] == 0) {
            $sqlSetStatus = $this->dbHolder->prepare("UPDATE logs SET status = 1 WHERE logId = ?;");
            $sqlSetStatus->execute(array($logId));
        }

        $dataToDisplay = array("senderPhoneNumber"=>$data[0], "message"=>$data[4]);
        $this->close_connection();
        echo json_encode($dataToDisplay);
    }

    function getCurrentTime() {

        $sql = $this->dbHolder->prepare("SELECT CURTIME();");
        $time = $sql->fetch();

        return $time[0];
    }

    function getCurrentDate() {

        $sql = $this->dbHolder->prepare("SELECT CURDATE();");
        $date = $sql->fetch();

        return $date[0];
    }
}
