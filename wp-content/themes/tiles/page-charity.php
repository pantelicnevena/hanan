<?php
/**
 * Created by PhpStorm.
 * User: enco
 * Date: 7/27/15
 * Time: 4:08 PM
 */

get_header('charity');
?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>



<?php get_footer('charity'); ?>
