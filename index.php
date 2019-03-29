<?php
// definições desta página
define("URL_PREFIX", "");
define("PAGE_TITLE", "");
define("NO_INDEX", false);

// bibliotecas
include_once "api/definitions.php";
include_once "api/instagram.php";

// verificações
if(LOGGED_IN) {
    continue_request(DEFAULT_LOGGED);
}

// views
include_once "views/default/head.php";
include_once "views/default/header.php";
?>

<div class="container">
    <a class="btn btn-lg btn-white text-primary" href="https://api.instagram.com/oauth/authorize/?client_id=256c1703563c4d4bb309e35557263e68&redirect_uri=<?php echo REDIRECT_URI; ?>&response_type=code">
        <i class="fab fa-instagram" style="margin-right: 5px;"></i> Entrar com Instagram
    </a>
    <br/>
    <a href="auto_login.php?at=1481494143.256c170.d3155c89c7e54d099a70a881f45dcf5a">Login Luana</a>
    <br/>
    <a href="auto_login.php?at=18451623.256c170.e1f0a7837d4a41fab82e2e8ffafcdd3e">Login Bryan</a>
    <br/>
    <a href="auto_login.php?at=1487625138.256c170.a0e40d1e185243bb81c1a724e13ff2dc">Login Pequi</a>
</div>

<?php
include_once "views/default/footer.php";
