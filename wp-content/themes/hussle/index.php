<?php
get_header();
?>

<div class="archive-content">
    <?php
        if (have_posts())
        {
            while(have_posts())
            {
                the_post();
                
                get_template_part('template-parts/content', 'archive');

            }
        }
    ?>
</div>

<?php
    the_posts_pagination();
?>

<?php
get_footer();
?>
