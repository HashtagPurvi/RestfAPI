<?php

/**
 * Created by PhpStorm.
 * User: pagrawal
 * Date: 9/29/15
 * Time: 2:41 PM
 */
$data = array("name" => "Hagrid", "age" => "36");
$data_string = json_encode($data);

$ch = curl_init('http://programmertest-apppartner.rhcloud.com/endpoints/register.php');
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($data_string))
);

$result = curl_exec($ch);
echo $result;
