<?php
include_once "definitions.php";
include_once "instagram.php";
include_once "database.php";

function user_get_by_ig_id($ig_id) {
    $db_user = db_select("users", array("*"), "ig_id='".$ig_id."'");
    if($db_user->num_rows > 0)
        return $db_user->fetch_assoc();
    return false;
}

function user_get_by_token($token) {
    $db_user = db_select("users", array("*"), "ig_token='".$token."'");
    if($db_user->num_rows > 0)
        return $db_user->fetch_assoc();
    return false;
}

function user_register($ig_id, $type, $token) {
    if(db_insert(
        "users",
        array("ig_id", "type", "ig_token"),
        array($ig_id, $type, $token)
    )) {
        return true;
    }
    return false;
}

function user_login($code) {
    // pega a token do usuário com o código de permissão
    $access_token = ig_get_token($code);
    $ig_user = ig_get_profile($access_token);

    // verifica se o usuário já existe
    $user = user_get_by_ig_id($ig_user["id"]);
    if(!$user) { // se não existe, cria uma conta
        if(!user_register($ig_user["id"], ($ig_user["is_business"] == 1 ? "business" : "social"), $access_token)) {
            return false;
        }
        $user = user_get_by_ig_id($ig_user["id"]);
    }
    # atualiza a token no banco de dados
    db_update("users", array("ig_token"), array($access_token), "ig_id=" . $user["ig_id"]);

    // inicia a sessão
    $_SESSION["ig_token"]        = $user["ig_token"];
    $_SESSION["date_created"]    = $user["date_created"];
    $_SESSION["premium"]         = strtotime($user["premium_until"]) > strtotime("now");
    $_SESSION["premium_until"]   = $user["premium_until"];
    $_SESSION["type"]            = $user["type"];
    $_SESSION["ig_id"]           = $ig_user["id"];
    $_SESSION["profile_picture"] = $ig_user["profile_picture"];
    $_SESSION["name"]            = $ig_user["full_name"];
    $_SESSION["username"]        = $ig_user["username"];
    $_SESSION["bio"]             = $ig_user["bio"];


    // logado
    return true;
}

function user_logout() {
    // desfaz todos os valores da sessão
    $_SESSION = array();

    // obtém os parâmetros da sessão
    $params = session_get_cookie_params();

    // Deleta o cookie em uso.
    setcookie(session_name(),
        '', time() - 3600,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]);

    // Destrói a sessão
    session_destroy();
}