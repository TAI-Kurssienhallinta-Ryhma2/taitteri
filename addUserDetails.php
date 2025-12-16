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
    <title>Add user details</title>
</head>
<body>
    <h1>Add User details</h1>
    <form id = "registerForm">
        <div>
            <input type = "text" id = "user_id" name = "user_id" value = <?= $id ?> hidden>
        </div>
        <div>
            <label for = "profileName">Käyttäjän profiilin nimi </label>
            <input type = "text" id = "profileName" name = "profileName" required>
        </div>
        <div>
            <label for = "description">Kuvaus: </label>
            <input type = "text" id = "description" name = "description" required>
        </div>
        <div>
            <button type = "submit" id = "registerButton">Submit</button>
        </div>
    </form>
    <script>
        const user_id = <?= $id ?>
    </script>
    <script src = "addUserDetails.js" type = "module"></script>
</body>
</html>