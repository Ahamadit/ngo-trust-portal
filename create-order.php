<?php
require('razorpay-config.php');
header('Content-Type: application/json');

// Get donation amount from POST request
$input = json_decode(file_get_contents("php://input"), true);
$amount = isset($input['amount']) ? $input['amount'] : 500; // Default 500 INR

$data = [
    "amount" => $amount * 100, // amount in paise
    "currency" => "INR",
    "receipt" => "DONATE_" . rand(1000,9999)
];

// Use cURL server-side
$ch = curl_init("https://api.razorpay.com/v1/orders");
curl_setopt($ch, CURLOPT_USERPWD, $keyId . ":" . $keySecret); // secret key only on server
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ["Content-Type: application/json"]);

$response = curl_exec($ch);
curl_close($ch);

echo $response;
