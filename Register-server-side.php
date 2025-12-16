<?php
require_once "connection.php";
if($_SERVER["REQUEST_METHOD"] != "POST") {
     echo json_encode(["message" => "Use POST instead of GET method", "status" => "error"]);
}

// $data = json_decode(file_get_contents("php://input"))->formData;

$email = $_POST["email"];
$originalPassword = $_POST["password"];

try {
    $query = "INSERT INTO kayttajat_logins(email, hashed_password)
                  VALUES(:email, :hashed_password)";
    $hashed_password = password_hash($originalPassword, PASSWORD_DEFAULT);
    $statement = $conn->prepare($query);
    $statement->execute([
        ":email" => $email,
        ":hashed_password" => $hashed_password
    ]);

    header("Content-type: application/json");
    http_response_code(200);
    echo json_encode(["message" => "User registered successfully", "status" => "ok", "user_id" => $conn->lastInsertId()]);
} catch(PDOException $e) {
    header("Content-type: application/json");
    if($e->getCode() == "23000") {
        http_response_code(409);
        $statement = $conn->prepare("ALTER TABLE kayttajat_logins AUTO_INCREMENT = 1");
        $statement->execute();
        echo json_encode(["message" => "This email already exists", "status" => "error"]);
    } else {
        http_response_code(500);
        echo json_encode(["message" => "Database error", "status" => "error"]);
    }
}
?>