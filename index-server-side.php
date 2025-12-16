<?php

session_start();

require_once "connection.php";

if($_SERVER["REQUEST_METHOD"] != "POST") {
     echo json_encode(["message" => "Use POST instead of GET method", "status" => "error"]);
}

$email = $_POST["email"];
$originalPassword = $_POST["password"];

try {
    $query = "SELECT * FROM kayttajat_logins WHERE email = :email";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":email" => $email
    ]);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    if($result && password_verify($originalPassword, $result["hashed_password"])) {
        $_SESSION["user_id"] = $result["kayttajan_id"];
        $_SESSION["logged_in"] = true;

        header("Content-type: application/json");
        http_response_code(200);
        echo json_encode(["message" => "User logged in successfully", "status" => "ok", "user_id" => $result["kayttajan_id"]]);
    } else {
        header("Content-type: application/json");
        http_response_code(500);
        echo json_encode(["message" => "Wrong credentials", "status" => "error"]);
    }
} catch(PDOException $e) {
    header("Content-type: application/json");
    http_response_code(500);
    echo json_encode(["message" => "Database error", "status" => "error"]);
}
?>