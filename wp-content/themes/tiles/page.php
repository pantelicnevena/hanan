<?php get_header(); ?>

<div id="contentwrapper" class="col-md-6">
    <div id="content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="post" id="post-<?php the_ID(); ?>">
<!--                <a class="entry_link" href="http://adoralevin.com">-->
                    <h1 class="entry-title">
                        <?php the_title(); ?>
                    </h1>
<!--                </a>-->
                <div class="entry">
                    <?php if (is_page() && !is_front_page() && !is_page('Cart') && !is_page('Checkout')) : ?>
                        <div class="entry_social">
                    <?php endif;?>

                    <?php the_content(); ?>
                    <?php comments_template( '', true ); ?>
                    <?php wp_link_pages(array('before' => '<p><strong>'. __( 'Pages:', 'tiles' ) .'</strong> ', 'after' => '</p>', 'next_or_number' => 'number')); ?>

                    <?php if (is_page()) : ?>
                    </div>
                    <?php endif;?>
                </div>
            </div>
        <?php endwhile; endif; ?>
    </div>
<!--    <img class="design-button" src="http://adoralevin.com/wp-content/uploads/2015/05/developer_dots.png" alt="developer" title="Developer Nevena Pantelić"/>-->
<!--    <a class="design-button" id="open-button" title="Nevena Pantelić"></a>-->
</div>
<?php get_footer(); ?>
