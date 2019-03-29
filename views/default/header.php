<header class="blog-header py-3 container-fluid">
    <div class="collapse navbar-collapse" id="menu">
        <!-- Links -->
        <ul class="navbar-nav mr-auto">
            <?php if(LOGGED_IN) { ?>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-dark btn-lg btn-block" href="<?php echo URL_PREFIX; ?>api/?logout">
                    Encerrar sessão
                </a>
            </li>
            <?php } else { ?>
            <li class="nav-item">
                <a class="nav-link btn btn-outline-dark btn-lg btn-block" href="#">Oi</a>
            </li>
            <?php } ?>
        </ul>
        <!-- Links -->
    </div>
    <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-1 pt-1" style="z-index: 10;">
            <a class="navbar-toggle" data-toggle="collapse" data-target="#menu" aria-controls="menu" aria-expanded="false" aria-label="Abrir menu">
                <img alt="menu" src="https://mdbootstrap.com/img/svg/hamburger8.svg?color=eeeeee" style="width:40px; height:40px;"/>
            </a>
        </div>
        <div class="col-10 text-center">
            <a class="blog-header-logo" href="<?php echo BASE_URL; ?>">Percepter</a>
        </div>
        <div class="col-1 d-flex justify-content-end align-items-center text-light">
            <?php if(LOGGED_IN) { ?>
            <a href="<?php echo URL_PREFIX; ?>profile.php">
                <img src="<?php echo $_SESSION["profile_picture"]; ?>" style="width:30px;"/> <?php echo $_SESSION["name"]; ?>
            </a>
            <?php } ?>
        </div>
    </div>
</header>