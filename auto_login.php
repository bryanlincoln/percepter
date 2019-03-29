<?php

define("URL_PREFIX", "");
define("PAGE_TITLE", "");
define("NO_INDEX", false);

include_once "api/definitions.php";
include_once "api/users.php";
include_once "api/instagram.php";

$access_token = $_GET["at"];
$ig_user = ig_get_profile($access_token);
$user = user_get_by_ig_id($ig_user["id"]);

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

header("Location: vote.php");