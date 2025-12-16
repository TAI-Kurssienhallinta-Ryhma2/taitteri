<?php
require_once "connection.php";
if($_SERVER["REQUEST_METHOD"] != "POST") {
     echo json_encode(["message" => "Use POST instead of GET method", "status" => "error"]);
}

$user_id = $_POST["user_id"];
$profileName = $_POST["profileName"];
$description = $_POST["description"];

try {
    $query = "INSERT INTO kayttajat(kayttaja_tunnus, kayttajanimi , kuvaus) 
    VALUES (:user_id, :profileName, :description)";
    $statement = $conn->prepare($query);
    $statement->execute([
        ":user_id" => $user_id,
        ":profileName" => $profileName,
        ":description" => $description
    ]);

    header("Content-type: application/json");
    http_response_code(200);
    echo json_encode(["message" => "Personal details updated successfully", "status" => "ok"]);
} catch(PDOException $e) {
    header("Content-type: application/json");
    http_response_code(500);
    echo json_encode(["message" => "Database error", "status" => "error"]);
}
?>