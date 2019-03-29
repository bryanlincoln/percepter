<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title><?php if(PAGE_TITLE != "") echo PAGE_TITLE . " | "; ?>Percepter</title>

        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="application-name" content="Percepter"/>
        <meta name="apple-mobile-web-app-title" content="Percepter">
        <meta name="description" content="Perceba como os outros te percebem!"/>
        <meta name="keywords" content="redes, sociais"/>
        <meta name="revisit-after" content="2 days"/>
        <meta name="author" content="Bryan Lincoln @ YADAH Robotics"/>
        <meta name="apple-mobile-web-app-capable" content="yes"/>
        <meta name="mobile-web-app-capable" content="yes">

        <meta name="apple-mobile-web-app-status-bar-style" content="#000000"/>
        <meta name="theme-color" content="#000000">

        <?php if(NO_INDEX) echo "<meta name=\"robots\" content=\"noindex\">"; ?>

        <link rel="icon" type="image/x-icon" class="link-icon" href="<?php echo URL_PREFIX; ?>images/favicon.png"/>
        <link rel="shortcut icon" type="image/x-ickkon" class="link-icon" href="<?php echo URL_PREFIX; ?>images/favicon.png"/>
        <link rel="apple-touch-icon" href="<?php echo URL_PREFIX; ?>images/favicon.png" />
        <link rel="apple-touch-icon-precomposed" href="<?php echo URL_PREFIX; ?>images/favicon.png" />

        <link href="https://fonts.googleapis.com/css?family=Quicksand" rel="stylesheet">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
        <link href="<?php echo URL_PREFIX; ?>css/bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo URL_PREFIX; ?>css/default_layout.css" rel="stylesheet" />
        <?php
        if(isset($CSS)) {
            foreach ($CSS as $source) {
                echo "<link href=\"" . $source . "\" rel=\"stylesheet\"/>
";
            }
        }
        ?>
    </head>
<body>