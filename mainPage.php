<?php

session_start();

require_once "sql-request.php";

if (!isset($_SESSION["user_id"]) || !isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("Location: index.php");
    exit();
}

$id = $_SESSION["user_id"];

updateLastLoginStatus($id);
$profileInformation = getProfileInformation($id);

function generatePost($rowPost) {
    $html = "<div class = 'posts'>";
        $html .= "<div>";
            $html .= "<img src = './images/profileUser.png' id = 'image'>";
        $html .= "</div>";
        $html .= "<div class = 'justText'>";
            $html .= "<span id = 'usernames'>{$rowPost['kayttajanimi']}</span>";
            $html .= "<span>{$rowPost['nykyinen_postauksenteksti']}</span>";
            $html .= "<div id = 'postStatus'>";
                $html .= "<img src = './images/heart.png' id = 'hearts'>";
                $html .= getLikesOfSpecificPost($rowPost["postauksen_tunnus"])["likes_post"];
            $html .= "</div>";
        $html .= "</div>";
    $html .= "</div>";
    return $html;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
    <style>

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .headerImages {
            width: 20px;
            height: 20px;
        }

        .headerContainer {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-left: 40px;
            margin-right: 40px;
            margin-top: 10px;
            margin-bottom: 5px;
        }

        #searchBox {
            border-radius: 20px;
            width: 22rem;
            height: 2rem;
            background-color: #F0C9BA;

            background-image: url('./images/search-icon.png');
            background-size: 16px 16px;
            background-repeat: no-repeat;
            background-position: 10px center; /* position the icon */
            padding-left: 30px; /* leave space for the icon */

        }

        .imageAndText{
            display: flex;
            flex-direction: row;
            margin-top: 5px;
        }

        #taitterText {
            margin-left: 10px;
        }

        #content{
            background-color: #F0C9BA;
            height: 100vh;
        }

        #postHeader {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            padding-top: 25px;
            margin-left: 500px;
            margin-right: 500px;
        }

        #newPostButton {
            background-color: #C44D2F;
            margin-top: 30px;
            width: 100px;
            height: 30px;
            border-radius: 10px;
            cursor: pointer;
            border: none;
            color: white;
        }

        .boxes {
            display: flex;
            justify-content: center; /* horizontal */
            align-items: center;     /* vertical */
            
            width: 140px;
            height: 50px;
            border: 1px black inset;
            border-radius: 10px;

            background-color: white;

            flex-direction: column;

            border: none;
        }

        #information {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            margin-top: 30px;
            margin-left: 500px;
            margin-right: 500px;
        }

        #menuButtonsContainer {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 30px;
            background-color: white;
            width: 43rem;
            height: 3rem;
            margin-left: 500px;
            border-radius: 10px;
        }

        .menuButtons {
            width: 230px;
            height: 37px;
            margin: 6px;
            border-radius: 12px;
            cursor: pointer;
            border: none;
        }

        .activeMenuButton {
            background-color: #C44D2F;
            color: white;
        }

        #welcomeMessage {
            margin-left: 500px;
        }

        .posts {
            display: flex;
            flex-direction: row;
            justify-content: left;
            align-items: center;

            background-color: white;
            margin-top: 5px;
            margin-bottom: 30px;
            margin-left: 500px;
            margin-right: 500px;
            height: 120px;
            border-radius: 10px;
        }

        #image {
            width: 80px;
            height: 80px;
            margin-left: 20px;
        }

        #hearts {
            width: 15px;
            height: 15px;
        }

        .justText {
            display: flex;
            flex-direction: column;
            padding-left: 50px;
        }
        .justText > * {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <div class = "headerContainer">
        <div class = "imageAndText">
            <img src = "./images/logo-png-format.png" class = "headerImages">
            <div id = "taitterText">
                <span>Taitter</span>
            </div>  
        </div>
        <div>
            <input type = "text" id = "searchBox" placeholder = "Search...">  
        </div>
        <div>
            <a href = "#"><img src = "./images/profile.png" class = "headerImages"></a>
            <a href = "#"><img src = "./images/followers.png" class = "headerImages"></a>
            <a href = "#"><img src = "./images/tags.png" class = "headerImages"></a>
            <a href = "#"><img src = "./images/posts.png" class = "headerImages"></a>
            <a href= "#"><img src = "./images/log-out.png" class = "headerImages"></a>
        </div>
    </div>
    <!--  -->

    <!--  -->
    <div id = "content">
        <div id = "welcomeMessage">
            <h1>Welcome, <?= $profileInformation["user_information"]["kayttajanimi"]?></h1>
        </div>
        <div id = "postHeader">
            <div>
                <h1>All posts</h1>
                <h4>Manage and explore content</h4>
            </div>
            <div>
                <button id = "newPostButton">+ New post</button>
            </div>
        </div> 
        <!--  -->

        <!--  -->
        <div id = "information">
            <div class = "boxes">
                <span>My Posts</span>
                <span id = "v1"><?= $profileInformation["total_count_posts"] ?></span>
            </div>
            <div class = "boxes">
                <span>Total Likes</span>
                <span id = "v2"><?= $profileInformation["total_count_likes"] ?></span>
            </div>
            <div class = "boxes">
                <span>Following</span>
                <span id = "v3"><?= $profileInformation["total_count_followings"] ?></span>
            </div>
            <div class = "boxes">
                <span>Mentions</span>
                <span id = "v4"><?= $profileInformation["total_count_mentions"] ?></span>
            </div>
        </div>
        <!--  -->

        <div id = "menuButtonsContainer">
            <button class = "menuButtons activeMenuButton">Following</button>
            <button class = "menuButtons">Favorite #Tags</button>
            <button class = "menuButtons">Mentions</button>
        </div>
        <!--  -->

        <!--  -->
        <div id = "postsContainer">
            <?php
                $posts = $profileInformation["posts"];
                for($i = 0; $i < $profileInformation["total_count_posts"]; $i++) {
                    echo generatePost($posts[$i]);
                }
            ?>
        </div>
    </div>
    <!--  -->

    <!--  -->
    <script>
        const user_id = <?= $_SESSION["user_id"] ?>
    </script>
    <script src = "mainPage.js" type = "module"></script>
</body>
</html>