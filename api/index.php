<?php
// --- BIBLIOTECAS
include_once "definitions.php";
include_once "users.php";
include_once  "ratings.php";

// --- INTERFACE

// usuário
if(isset($_GET["auth"])) {
    if(!isset($_GET["code"])) {
        continue_request(BASE_URL, "err=Faltou o código.");
    }
    $code = $_GET["code"];

    if(user_login($code)) {
        continue_request(DEFAULT_LOGGED, "msg=Bem vindo!");
    } else {
        continue_request(BASE_URL, "err=Ocorreu um erro no login.");
    }
}
else if(isset($_GET["logout"])) {
    user_logout();
    continue_request(BACK_RESPONSE, "msg=Sessão finalizada.");
}

// premium
else if(isset($_GET["premium_buy"])) {
    $new_premium_until = date("Y-m-d H:i:s", strtotime("+1 hour"));

    db_update("users", array("premium_until"), array($new_premium_until), "ig_id=" . $_SESSION["ig_id"]);

    $_SESSION["premium"]       = strtotime($new_premium_until) > strtotime("now");
    $_SESSION["premium_until"] = $new_premium_until;

    continue_request(BACK_RESPONSE, "msg=Comprado com sucesso.");
}

// votos
else if(isset($_GET["rate"])) {
    if(!isset($_POST["ig_id"])) {
        continue_request(BACK_RESPONSE, "err=Faltam parâmetros.");
    }

    $ig_id = filter_input(INPUT_POST, "ig_id", FILTER_SANITIZE_NUMBER_INT);
    $beauty = !isset($_POST["beauty"])? "null" : filter_input(INPUT_POST, "beauty", FILTER_SANITIZE_NUMBER_INT);
    $sexappeal = !isset($_POST["sexappeal"])? "null" : filter_input(INPUT_POST, "sexappeal", FILTER_SANITIZE_NUMBER_INT);
    $reliance = !isset($_POST["reliance"])? "null" : filter_input(INPUT_POST, "reliance", FILTER_SANITIZE_NUMBER_INT);
    $intelligence = !isset($_POST["intelligence"])? "null" : filter_input(INPUT_POST, "intelligence", FILTER_SANITIZE_NUMBER_INT);
    $interesting = !isset($_POST["interesting"])? "null" : filter_input(INPUT_POST, "interesting", FILTER_SANITIZE_NUMBER_INT);
    $authentic = !isset($_POST["authentic"])? "null" : filter_input(INPUT_POST, "authentic", FILTER_SANITIZE_NUMBER_INT);
    $informative = !isset($_POST["informative"])? "null" : filter_input(INPUT_POST, "informative", FILTER_SANITIZE_NUMBER_INT);
    $expensive = !isset($_POST["expensive"])? "null" : filter_input(INPUT_POST, "expensive", FILTER_SANITIZE_NUMBER_INT);
    $comments = filter_input(INPUT_POST, "comments", FILTER_SANITIZE_STRING);

    if(ratings_new($ig_id,
        $beauty, $sexappeal, $reliance, $intelligence,
        $interesting, $authentic, $informative, $expensive,
        $comments)) {
        continue_request(BACK_RESPONSE, "msg=Avaliado!");
    } else {
        continue_request(BACK_RESPONSE, "err=Algo deu errado.");
    }
}
else if(isset($_GET["rate_skip"])) {
    if(!isset($_GET["ig_id"])) {
        continue_request(BACK_RESPONSE, "err=Faltam parâmetros.");
    }

    $ig_id = filter_input(INPUT_GET, "ig_id", FILTER_SANITIZE_NUMBER_INT);

    if(ratings_new($ig_id,
        "null", "null", "null", "null",
        "null", "null", "null", "null",
        "null")) {
        continue_request(BACK_RESPONSE, "msg=Pulado!");
    } else {
        continue_request(BACK_RESPONSE, "err=Algo deu errado.");
    }
}

else {
    continue_request(BACK_RESPONSE, "err=Requisição inválida. Faltam parâmetros.");
}