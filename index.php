<?php

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Taitter - login</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Libre+Bodoni:ital,wght@0,400..700;1,400..700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="./style.css">

</head>

<body class="dark-bg">
    <section class="body-section">
        <div class="login-section">
            <div class="top-wrap">
                <div class="logo-wrapper">
                    <img src="./images/logo.svg" alt="Likes, hearts and bells" width="50" height="50">
                </div>

                <h1 class="title-text">Welcome to TAITTER</h1>
                <h3 class="title3-text">Share your moments, connect with friends</h3>

            </div>

            <div class="form-wrapp">

                <form id="login-form" class="login-form">
                    <div class="input-section-wrap">
                        <label for="email" class="login-form-lable">Email</label>
                        <div class="input-field-wrap input-field-wrap-mail">
                            <input type="email" name="email" id="email" class="login-form-input" placeholder="Enter your email">
                        </div>

                    </div>
                    <div class="input-section-wrap">
                        <label for="password" class="login-form-lable">Password</label>
                        <div class="input-field-wrap input-field-wrap-lock">
                            <input type="password" name="password" id="password" class="login-form-input" placeholder="Enter your password">
                        </div>
                    </div>
                </form>

                <div class="midl-wrap">
                    <div class="chckb-wrap">
                        <input type="checkbox" name="remember" id="remember-chck" class="remember-chck">
                        <label for="remember-chck" class="remember-label">Remember me</label>
                    </div>
                    <p class="plain-text">Forgot password?</p>
                </div>

                <button type="submit" class="btn-submit" id = "loginButton">Sign In</button>
                <label id = "messageStatus"></label>

                <p class="btm-text">Don't have an account? <span><a href="register.php" class="sign-link">Sign up</a></span></p>
            </div>
        </div>
    </section>


<script src = "index.js"></script>
</body>

</html>