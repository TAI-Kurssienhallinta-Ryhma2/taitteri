<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h1>Welcome to TAItter</h1>
    <h3>Just a minute away from discovering a new world.</h3>
    <h4>The registration process it's at least 15 seconds!!</h4>
    <form id = "registerForm">
        <div>
            <label for = "email">Email: </label>
            <input type = "email" id = "email" name = "email" required>
        </div>
        <div>
            <label for = "password">Password: </label>
        <input type = "password" id = "password" name = "password" required>
        </div>
        <div>
            <button type = "submit" id = "registerButton">Submit</button>
        </div>
    </form>
    <label id = "statusMessage"></label>
    <script src = "Register.js" type = "module"></script>
</body>
</html>