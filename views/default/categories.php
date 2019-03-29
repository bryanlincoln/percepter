<div class="nav-scroller py-1 mb-2">
    <nav class="nav d-flex justify-content-between">
        <?php
        $categories = category_get_all();
        foreach($categories as $category) {
            ?>
            <a class="hvr-bounce-to-right" href="<?php echo BASE_URL; ?>?category=<?php echo $category["id"]; ?>"><?php echo $category["name"]; ?></a>
        <?php } ?>
    </nav>
</div>