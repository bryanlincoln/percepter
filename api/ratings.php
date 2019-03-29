<?php

include_once "definitions.php";
include_once "instagram.php";
include_once "database.php";

function ratings_next() {
    /**
     * Pega usuários que não receberam uma avaliação sua nas últimas 3 horas
     * Dá prioridade aos perfis que tem menos avaliações
     */
    $user = db_select(
        "users AS u LEFT JOIN ratings AS r ON r.ig_id = u.ig_id",
        array("u.ig_id AS ig_id", "u.ig_token AS ig_token", "u.type AS type", "u.date_created AS date_created", "COUNT(r.ig_id) AS rated"),
        "u.ig_id!=" . $_SESSION["ig_id"] . " AND (r.date_created IS NULL OR
                                                  " . $_SESSION["ig_id"] . " NOT IN (
                                                        SELECT id_from 
                                                        FROM ratings WHERE 
                                                        ig_id=r.ig_id AND
                                                        date_created > '" . date("Y-m-d H:i:s", strtotime(IG_SELECT_DELAY)) . "')
                                                  )",
        "u.ig_id",
        "rated ASC, u.premium_until DESC LIMIT 1"
    )->fetch_assoc();

    if($user)
        return array(
            "user" => $user,
            "posts" => ig_get_media($user["ig_token"])
        );
    return false;
}

function ratings_new($ig_id, $beauty, $sexappeal, $reliance, $intelligence, $interesting, $authentic, $informative, $expensive, $comments) {
    if(db_insert(
        "ratings",
        array("id_from", "ig_id", "comments",
            "beauty", "sexappeal", "reliance", "intelligence",
            "interesting", "authentic", "informative", "expensive"),
        array($_SESSION["ig_id"], $ig_id, $comments,
            $beauty, $sexappeal, $reliance, $intelligence,
            $interesting, $authentic, $informative, $expensive))) {
        return true;
    }
    return false;
}

function ratings_avg($ig_id, $date_limit=null) {
    if($date_limit == null) {
        $date_limit = strtotime(IG_STATS_RANGE);
    }

    return db_select(
        "ratings",
        array(
            "avg(beauty) as beauty",
            "avg(sexappeal) as sexappeal",
            "avg(reliance) as reliance",
            "avg(intelligence) as intelligence",
            "avg(interesting) as interesting",
            "avg(authentic) as authentic",
            "avg(informative) as informative",
            "avg(expensive) as expensive"),
        "ig_id=" . $ig_id . " AND date_created > '" . date("Y-m-d H:i:s", $date_limit) . "'"
    )->fetch_assoc();
}

function ratings_comments($ig_id) {
    $comments = array();

    $db_comments = db_select("ratings", array("comments"), "ig_id=" . $ig_id . " AND comments != ''");
    while($db_comment = $db_comments->fetch_assoc()) {
        array_push($comments, $db_comment["comments"]);
    }

    return $comments;
}