<?php
if(isset($_GET["code"])) {
    header("Location: api/?auth&code=" . $_GET["code"]);
} else {
    echo "Ops...";
}