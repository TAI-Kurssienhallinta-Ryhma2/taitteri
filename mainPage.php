<?php
$id = null;
if(isset($_GET) && isset($_GET["user_id"])) {
    $id = $_GET["user_id"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>
<body>
    <h1>Main page - Main information from user(ID: <?= $id ?>)</h1>
</body>
</html>