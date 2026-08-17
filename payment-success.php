<?php
$data = json_decode(file_get_contents("php://input"), true);

if (!isset($data['razorpay_payment_id'])) {
    echo json_encode(["status" => "error"]);
    exit;
}

$payment_id = $data['razorpay_payment_id'];

$keyId = "rzp_test_XXXXXXXXXX";      // 🔴 YOUR KEY ID
$keySecret = "XXXXXXXXXXXXXXX";     // 🔴 YOUR KEY SECRET

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://api.razorpay.com/v1/payments/" . $payment_id);
curl_setopt($ch, CURLOPT_USERPWD, $keyId . ":" . $keySecret);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);

$result = json_decode($response, true);

if (isset($result['status']) && $result['status'] === "captured") {

    // ✅ PAYMENT SUCCESS
    // (Optional) Save payment details in database here

    echo json_encode(["status" => "success"]);
} else {
    echo json_encode(["status" => "failed"]);
}
