<?php
if(isset($_GET["search"]) && $_GET["search"] != "") {
    $search = $_GET["search"];
    $field = "title"; ?>

    Resultados da busca por "<b><?php echo $_GET["search"]; ?></b>". <a href="?search=">Limpar busca.</a> <br><br>

    <?php
} else if(isset($_GET["author"]) && $_GET["author"] != "") {
    $search = $_GET["author"];
    $field = "id_user";
    $post_owner = user_get($_GET["author"]);
    ?>

    Postagens de <b><?php echo $post_owner["name"]; ?></b>. <a href="?author=">Limpar busca.</a> <br><br>

    <?php
} else if(isset($_GET["category"]) && $_GET["category"] != "") {
    $search = $_GET["category"];
    $field = "id_category";
    ?>

    Postagens em <b><?php echo category_get($search)["name"]; ?></b>. <a href="?category=">Limpar busca.</a> <br><br>

    <?php
}
else {
    $search = "";
    $field = "title";
}

$posts = post_get_all($search, $field);

if(count($posts) == 0) echo "Nenhuma postagem encontrada.";