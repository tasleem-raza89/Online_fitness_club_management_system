<?php
$conn = new mysqli("localhost", "root", "", "fitness_club");

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

$mobile = $_POST["mobile_number"];
$payment_type = $_POST["payment_type"];
$otp = rand(100000, 999999);

$stmt = $conn->prepare("INSERT INTO payments (mobile_number, otp, payment_type) VALUES (?, ?, ?)");
$stmt->bind_param("sss", $mobile, $otp, $payment_type);

if ($stmt->execute()) {
    // Simulate OTP sending (in a real app, send via SMS API)
    echo json_encode(["success" => true, "otp" => $otp]);  
} else {
    echo json_encode(["success" => false]);
}

$stmt->close();
$conn->close();
?>
