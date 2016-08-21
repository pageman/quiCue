<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 5:41 PM
 */
session_start();
$messageId = rand(0, 9999999999999);

while(strlen($messageId) != 32) {
    $messageId .= rand(0, 99999999999999);
    if(strlen($messageId) > 32) {
        break;
    }
}

$final = substr($messageId, 0, 32);
$message = $_POST["message"];
if($message == "") {
  $message = "Emergency! The owner of the number ".$_SESSION["phoneNumber"]." is current on an emergency situation at ".$_POST["userLocation"].". Please respond immediately.";
} else {
  $message .= " My number: ".$_SESSION["phoneNumber"].". My address: ".$_POST["userLocation"].".";
}

//echo "yeyy = " .$verificationCode;
//===== Using Chikka API here to sent the verification code the user [ AS SENDER ] From Web to the person's phone/mobile

$arr_post_body = array(
    "message_type" => "SEND",
    "mobile_number" => $_POST["adminPhoneNumber"],
    "shortcode" => "29290439",
    "message_id" => $final,
    "message" => urlencode($message),
    "client_id" => "b9f9fc65fab192171c44aafd78afac20b2ea100ee10dd22aee7941073417afc4",
    "secret_key" => "bb16f8000c71ddb07f401e0e587bed25488d2533370ed90b10308fd7bd42db0c"
);
echo "this is the phone number : ".$_POST["adminPhoneNumber"];
$query_string = "";
foreach($arr_post_body as $key => $frow) {
    $query_string .= '&'.$key.'='.$frow;
}

$URL = "https://post.chikka.com/smsapi/request";

$curl_handler = curl_init();
curl_setopt($curl_handler, CURLOPT_URL, $URL);
curl_setopt($curl_handler, CURLOPT_POST, count($arr_post_body));
curl_setopt($curl_handler, CURLOPT_POSTFIELDS, $query_string);
curl_setopt($curl_handler, CURLOPT_RETURNTRANSFER, TRUE);
//-- additional starts here
curl_setopt($curl_handler, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($curl_handler, CURLOPT_SSL_VERIFYPEER, 0);

$response = curl_exec($curl_handler);
if($response === false) {
    echo 'Curl error: ' . curl_error($curl_handler);
} else {
    echo "\nresponse is = ".$response;
}
//$resp = json_decode($response);
//echo "response: message = ".$resp["message"]." status = ".$resp["status"];
curl_close($curl_handler);

exit(0);
