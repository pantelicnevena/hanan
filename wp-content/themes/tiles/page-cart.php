<?php
/**
 * Created by PhpStorm.
 * User: enco
 * Date: 7/24/15
 * Time: 2:26 PM
 */

get_header('shop');

;?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div class="post" id="post-<?php the_ID(); ?>">
        <?php the_content(); ?>
    </div>
<?php endwhile; endif; ?>

<?php get_footer('shop'); ?>

