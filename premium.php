<?php
// definições desta página
define("URL_PREFIX", "");
define("PAGE_TITLE", "Seja premium!");
define("NO_INDEX", true);

// bibliotecas
include_once "api/definitions.php";

// views
include_once "views/default/head.php";
include_once "views/default/header.php";
?>

<div class="container">
    <h1>Percepter Premium</h1>
    <?php if($_SESSION["premium"]) { ?>
    Parabéns, você é premium até <?php echo $_SESSION["premium_until"]; ?>!
    <a href="api/?premium_buy">Extender sua assinatura</a>!
    <?php } else { ?>
    Você não é premium. <a href="api/?premium_buy">Compre uma assinatura</a>!
    <?php } ?>
</div>

<?php
include_once "views/default/footer.php";