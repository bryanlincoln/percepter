        <footer class="blog-footer">
            <p>&copy; 2019 Percepter</p>
        </footer>

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="<?php echo URL_PREFIX; ?>js/bootstrap.min.js"></script>

        <!-- Inseridos dinamicamente -->
<?php
if(isset($JS_SCRIPTS)) {
    foreach ($JS_SCRIPTS as $source) {
        echo "<script src=\"" . $source . "\"></script>
";
    }
}
?>

    </body>
</html>