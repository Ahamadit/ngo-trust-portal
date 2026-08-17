<?php
require('razorpay-config.php');

$data = json_decode(file_get_contents("php://input"), true);

$generatedSignature = hash_hmac(
    'sha256',
    $data['razorpay_order_id'] . "|" . $data['razorpay_payment_id'],
    $keySecret
);

if ($generatedSignature === $data['razorpay_signature']) {
    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "failed"]);
}
