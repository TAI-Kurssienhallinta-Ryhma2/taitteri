<?php
require_once "connection.php";
if($_SERVER["REQUEST_METHOD"] != "POST") {
     echo json_encode(["message" => "Use POST instead of GET method", "status" => "error"]);
}

// $data = json_decode(file_get_contents("php://input"))->formData;

$username = $_POST["username"];
$originalPassword = $_POST["password"];

try {
    $query = "INSERT INTO kayttajat_logins(email, hashed_password)
                  VALUES(:username, :hashed_password)";
    $hashed_password = password_hash($originalPassword, PASSWORD_DEFAULT);
    $statement = $conn->prepare($query);
    $statement->execute([
        ":username" => $username,
        ":hashed_password" => $hashed_password
    ]);

    header("Content-type: application/json");
    http_response_code(200);
    echo json_encode(["message" => "User registered successfully", "status" => "ok"]);
} catch(PDOException $e) {
    header("Content-type: application/json");
    if($e->getCode() == "23000") {
        http_response_code(409);
        echo json_encode(["message" => "This email already exists", "status" => "error"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Database error", "status" => "error"]);
    }
}
?>