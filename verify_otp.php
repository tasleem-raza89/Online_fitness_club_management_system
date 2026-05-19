<?php
$conn = new mysqli("localhost", "root", "", "fitness_club");

if ($conn->connect_error) {
    die(json_encode(["success" => false, "message" => "Database connection failed"]));
}

$mobile = $_POST["mobile_number"];
$otp = $_POST["otp"];

$stmt = $conn->prepare("SELECT id FROM payments WHERE mobile_number = ? AND otp = ? AND payment_status = 'pending'");
$stmt->bind_param("ss", $mobile, $otp);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows > 0) {
    $update_stmt = $conn->prepare("UPDATE payments SET payment_status = 'successful' WHERE mobile_number = ?");
    $update_stmt->bind_param("s", $mobile);
    $update_stmt->execute();
    echo json_encode(["success" => true]);
} else {
    echo json_encode(["success" => false]);
}

$stmt->close();
$conn->close();
?>
