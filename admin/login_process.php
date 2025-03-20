<?php
session_start();
include(__DIR__ . '/../dbconnection.php'); // Corrected path

header('Content-Type: application/json');

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

try {
    if (empty($username) || empty($password)) {
        echo json_encode(["status" => "error", "message" => "Both fields are required."]);
        exit();
    }

    $query = "SELECT * FROM admin_users WHERE username = :username LIMIT 1";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':username', $username, PDO::PARAM_STR);
    $stmt->execute();
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($admin && password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = true;
        $_SESSION['username'] = $admin['username'];
        
        echo json_encode(["status" => "success", "redirect" => "../index.php"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Invalid username or password."]);
    }
} catch (PDOException $e) {
    echo json_encode(["status" => "error", "message" => "Database error: " . $e->getMessage()]);
}
?>
