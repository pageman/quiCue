<?php
/**
 * Created by PhpStorm.
 * User: Marejean
 * Date: 8/20/16
 * Time: 1:59 PM
 */

    include_once "../controller/Functions.php";

    $phoneNumber = $_POST["phoneNumber"];

    $verificationCode = rand(0, 99999999999999999);

    $obj = new Functions();
    $obj->addUser($phoneNumber, $verificationCode);

    //===== Using Chikka API here to sent the verification code the user [ AS SENDER ] From Web to the person's phone/mobile

    $arr_post_body = array(
        "message_type" => "SEND",
        "mobile_number" => substr($phoneNumber, 1),
        "shortcode" => "29290439",
        "message_id" => $verificationCode,
        "message" => urlencode("Welcome to QUICUE Service! Your verification code is ".$verificationCode),
        "client_id" => "b9f9fc65fab192171c44aafd78afac20b2ea100ee10dd22aee7941073417afc4",
        "secret_key" => "bb16f8000c71ddb07f401e0e587bed25488d2533370ed90b10308fd7bd42db0c"
    );

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
    $response = curl_exec($curl_handler);
    curl_close($curl_handler);

    exit(0);