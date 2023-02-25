    </div>
</div>

<footer class="footer-main d-flex border-top">

    <?php 
        echo "<p class='col-md-4 mb-0 text-muted'>" . date("Y") . " Company, Inc</p>";
    ?>

    <?php
        $authorURL = wp_get_theme()->get('AuthorURI');
        $author = wp_get_theme()->get('Author');
        echo "<p class='copyright col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none'><a target='_blank' href='$authorURL'>$author</a></p>";
    ?>

    <?php
        dynamic_sidebar('footer-1');
    ?>

</footer>

<?php
	wp_footer();
?>

</body>
</html> 
