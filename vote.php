<?php
// definições desta página
define("URL_PREFIX", "");
define("PAGE_TITLE", "Vote");
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
    <h1>Vote</h1>

    <?php
    $random = ratings_next();
    $user = $random["user"];
    $ig_posts = $random["posts"];
    if($ig_posts) { ?>
        <div class="row">
            <div class="col-md-6">
                <div class="row">
                <?php foreach($ig_posts as $post) { ?>
                    <div class="col-md-4">
                        <img src="<?php echo $post["images"]["thumbnail"]["url"]; ?>">
                    </div>
                <?php } ?>
                </div>
            </div>
            <div class="col-md-6">
                <form action="<?php echo URL_PREFIX; ?>api/?rate" method="post">
                    <input type="hidden" name="ig_id" value="<?php echo $user["ig_id"]; ?>"/>

                    <?php if($user["type"] == "social") { ?>

                        <label for="beauty" class="container-fluid">
                            <span class="float-left">Horroroso</span>
                            <span class="float-right">Atrativo</span>
                        </label>
                        <input id="beauty" type="range" name="beauty" min="0" max="10" step="1" class="form-control"/>

                        <label for="sexappeal" class="container-fluid">
                            <span class="float-left">Desengonçado</span>
                            <span class="float-right">Sexy</span>
                        </label>
                        <input id="sexappeal" type="range" name="sexappeal" min="0" max="10" step="1" class="form-control"/>

                        <label for="reliance" class="container-fluid">
                            <span class="float-left">Suspeito</span>
                            <span class="float-right">Confiável</span>
                        </label>
                        <input id="reliance" type="range" name="reliance" min="0" max="10" step="1" class="form-control"/>

                        <label for="intelligence" class="container-fluid">
                            <span class="float-left">Leigo</span>
                            <span class="float-right">Especialista</span>
                        </label>
                        <input id="intelligence" type="range" name="intelligence" min="0" max="10" step="1" class="form-control"/>

                    <?php } else { ?>

                        <label for="interesting" class="container-fluid">
                            <span class="float-left">Sem graça</span>
                            <span class="float-right">Interessante</span>
                        </label>
                        <input id="interesting" type="range" name="interesting" min="0" max="10" step="1" class="form-control"/>

                        <label for="authentic" class="container-fluid">
                            <span class="float-left">Falso</span>
                            <span class="float-right">Autêntico</span>
                        </label>
                        <input id="authentic" type="range" name="authentic" min="0" max="10" step="1" class="form-control"/>

                        <label for="informative" class="container-fluid">
                            <span class="float-left">Vazio</span>
                            <span class="float-right">Informativo</span>
                        </label>
                        <input id="informative" type="range" name="informative" min="0" max="10" step="1" class="form-control"/>

                        <label for="expensive" class="container-fluid">
                            <span class="float-left">Produtos baratos</span>
                            <span class="float-right">Produtos caros</span>
                        </label>
                        <input id="expensive" type="range" name="expensive" min="0" max="10" step="1" class="form-control"/>

                    <?php } ?>

                    <label for="comments">Deixe um elogio ou uma crítia =)</label>
                    <textarea id="comments" class="form-control" name="comments"></textarea>

                    <a class="btn text-muted">Denunciar</a>
                    <div class="float-right pt-2">
                        <a class="btn btn-outline-dark" href="<?php echo URL_PREFIX; ?>api/?rate_skip&ig_id=<?php echo $user["ig_id"]; ?>">Pular</a>
                        <input type="submit" class="btn btn-primary" value="Votar" />
                    </div>
                </form>
            </div>
        </div>
    <?php } else { ?>
        <div class="row">
            <div class="col-md-12 text-center">
                Isso é tudo por agora. <a href="profile.php">Veja suas avaliações</a>.
            </div>
        </div>
    <?php } ?>
</div>

<?php
include_once "views/default/footer.php";