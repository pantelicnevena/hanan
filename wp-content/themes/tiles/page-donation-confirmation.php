<?php
/**
 * Created by PhpStorm.
 * User: enco
 * Date: 7/27/15
 * Time: 4:08 PM
 */

get_header('charity');
?>
<div class="opposites_cover">
    <h1 class="opposites-title">
        <img src="<?php echo get_bloginfo('template_directory'); ?>/images/vinyl-logo.png" alt=""/>
    </h1>
</div>

<div class="mdl-grid">
    <div class="mdl-cell--3-col"></div>
    <div class="mdl-cell--6-col">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post post-charity" id="post-<?php the_ID(); ?>">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </div>
    <div class="mdl-cell--3-col"></div>
</div>


<?php get_footer('charity'); ?>
