<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, 'Helvetica Neue', Arial, sans-serif;
            background: linear-gradient(135deg, #d17a63 0%, #c96a54 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        h1 {
            color: white;
            font-size: 32px;
            font-weight: 600;
            margin-bottom: 8px;
            text-align: center;
            text-transform: uppercase;
            letter-spacing: 1px;
        }

        h3 {
            color: rgba(255, 255, 255, 0.95);
            font-size: 16px;
            font-weight: 400;
            margin-bottom: 4px;
            text-align: center;
        }

        h4 {
            color: rgba(255, 255, 255, 0.9);
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 30px;
            text-align: center;
        }

        form {
            background: #f5f5f0;
            border-radius: 24px;
            padding: 40px;
            width: 100%;
            max-width: 480px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.15);
        }

        form > div {
            margin-bottom: 20px;
        }

        label[for] {
            display: block;
            color: #555;
            font-size: 14px;
            font-weight: 500;
            margin-bottom: 8px;
        }

        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 14px 16px;
            border: 2px solid #e0e0d8;
            border-radius: 12px;
            font-size: 15px;
            background: #ededeb;
            transition: all 0.3s ease;
            outline: none;
            color: #333;
        }

        input[type="email"]:focus,
        input[type="password"]:focus {
            background: white;
            border-color: #c96a54;
        }

        button[type="submit"] {
            width: 100%;
            padding: 16px;
            background: #c44d37;
            color: white;
            border: none;
            border-radius: 12px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(196, 77, 55, 0.3);
        }

        button[type="submit"]:hover {
            background: #b03f2a;
            transform: translateY(-1px);
            box-shadow: 0 6px 16px rgba(196, 77, 55, 0.4);
        }

        button[type="submit"]:active {
            transform: translateY(0);
        }

        #statusMessage {
            display: block;
            margin-top: 16px;
            text-align: center;
            font-size: 14px;
            color: #c44d37;
            font-weight: 500;
        }
    </style>
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