<?php
// definições desta página
define("URL_PREFIX", "");
define("PAGE_TITLE", "Perfil");
define("NO_INDEX", true);

// bibliotecas
include_once "api/definitions.php";
include_once "api/instagram.php";
include_once "api/ratings.php";

// verificações
if(!LOGGED_IN) {
continue_request(DEFAULT_RESPONSE, "err=Poucos privilégios!");
}

// views
include_once "views/default/head.php";
include_once "views/default/header.php";
?>

<div class="container">
    <h1>Perfil <?php echo $_SESSION["type"]; ?> [<?php echo ($_SESSION["premium"] ? "Premium" : "Free <a href='premium.php'>Seja premium</a>"); ?>]</h1>
    <div class="row">
        <div class="col-md-5">
            <h2>Seu perfil</h2>
            <div class="row">
                <?php
                $ig_posts = ig_get_media($_SESSION["ig_token"]);

                foreach($ig_posts as $post) {
                ?>
                <div class="col-md-4">
                    <img src="<?php echo $post["images"]["thumbnail"]["url"]; ?>" class="container-fluid">
                </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-4">
            <h2>Estatísticas</h2>
            <?php
            $statistics = ratings_avg($_SESSION["ig_id"]);

            if($_SESSION["type"] == "social") {
            ?>
                <p>Beleza</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["beauty"]; ?>"></progress></p>
                <p>Sensualidade</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["sexappeal"]; ?>"></progress></p>
                <p>Confiança</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["reliance"]; ?>"></progress></p>
                <p>Inteligência</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["intelligence"]; ?>"></progress></p>
            <?php } else { ?>
                <p>Interessante</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["interesting"]; ?>"></progress></p>
                <p>Autêntico</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["authentic"]; ?>"></progress></p>
                <p>Informativo</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["informative"]; ?>"></progress></p>
                <p>Caro</p>
                <p><progress class="container-fluid" max="10" value="<?php echo $statistics["expensive"]; ?>"></progress></p>
            <?php } ?>
        </div>
        <div class="col-md-3">
            <h2>Comentários</h2>
            <?php
            $comments = ratings_comments($_SESSION["ig_id"]);
            $n_comments = count($comments);

            if($n_comments == 0) {
                echo "Nenhum comentário ainda.";
            }
            else {
                if(!$_SESSION["premium"])
                    echo $n_comments . " comentário" . ($n_comments > 1 ? "s" : "") . " te esperando.<br/><a href='premium.php'>Seja premium</a>!";
                else {
                    foreach ($comments as $comment) {
                        echo "<p>" . $comment . "</p>";
                    }
                }
            }
            ?>
        </div>
    </div>
</div>

<?php
include_once "views/default/footer.php";