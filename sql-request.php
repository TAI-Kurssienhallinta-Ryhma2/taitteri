<?php
include_once 'connection.php';

function updateLastLoginStatus($id) {
    global $conn;

    try {
        $query = "UPDATE kayttajat
        SET viimeisen_kaynti = CURRENT_TIMESTAMP
        WHERE kayttaja_tunnus = :id";

        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return true; // information update successfully
    } catch(PDOException $e) {
        return false; // something went wrong
    }
}

function getUserInformation($id) {
    global $conn;

    try {
        $query = "SELECT * FROM kayttajat WHERE kayttaja_tunnus = :id";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getPosts($id) {
    global $conn;

    try {
        $query = "SELECT kayttajat.kayttajanimi, postaukset.postauksen_tunnus, postaukset.nykyinen_postauksenteksti FROM postaukset
                INNER JOIN kayttajat ON kayttajat.kayttaja_tunnus = postaukset.kayttajan_id
                WHERE postaukset.kayttajan_id = :id";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetchAll(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getTotalCountPosts($id) {
    global $conn;

    try {
        $query = "SELECT COUNT(*) AS total_posts FROM postaukset
                WHERE postaukset.kayttajan_id = :id";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getTotalCountOfLikesFromAllPosts($id) {
    global $conn;

    try {
        $query = "SELECT COUNT(likes.like_tunnus) AS total_likes
                  FROM postaukset
                  LEFT JOIN likes
                    ON likes.postauksen_id = postaukset.postauksen_tunnus
                  WHERE postaukset.kayttajan_id = :id";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getTotalFollowings($id) {
    global $conn;

    try {
        $query = "SELECT COUNT(seurattavat.seurattava_id) AS total_followings
                  FROM seurattavat
                  WHERE seurattavat.kayttajan_id = :id";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getTotalMentions($id) {
    global $conn;

    try {
        $query = "SELECT COUNT(viittauksen_tunnus) AS total_mentions
                  FROM viittaukset
                  WHERE mainittukayttajan_id = :id";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getLikesOfSpecificPost($id) {
    global $conn;

    try {
        $query = "SELECT COUNT(like_tunnus) AS likes_post
                  FROM likes
                  WHERE postauksen_id = :id;";


        $statement = $conn->prepare($query);
        $statement->execute([
            ":id" => $id
        ]);

        return $statement->fetch(PDO::FETCH_ASSOC); // information update successfully
    } catch(PDOException $e) {
        return [false, $e->getMessage()]; // something went wrong
    }
}

function getProfileInformation($id) {
    return [
        "user_information" => getUserInformation($id),
        "posts" => getPosts($id),
        "total_count_posts" => getTotalCountPosts($id)["total_posts"],
        "total_count_likes" => getTotalCountOfLikesFromAllPosts($id)["total_likes"],
        "total_count_followings" => getTotalFollowings($id)["total_followings"],
        "total_count_mentions" => getTotalMentions($id)["total_mentions"]
    ];
}
?>