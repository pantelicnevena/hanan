<?php get_header(); ?>

<!--
<div class="grid-wrap">
<div id="contentwrapper">
-->

<div class="container">
    <div class="row">

        <div class="col-md-8">
            <div id="post-opposites">

                <?php query_posts( 'posts_per_page=-1' ); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>



                        <div class="mdl-card mdl-shadow--4dp demo-card-wide">
                            <div class="mdl-card__title">
                                <h2 class="mdl-card__title-text"><?php the_title(); ?></h2>

                                <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
                            </div>
                            <div class="mdl-card__supporting-text">
                                <?php the_content(); ?>

                                <?php echo get_the_tag_list('<p class="singletags">',' ','</p>'); ?>

                            </div>
                        </div>





                        <!--
                <div class="panel panel-danger">
                    <div class="media">
                        <div class="media-left">
                            <a href="#">
                                <img class="media-object" src="<?php echo get_bloginfo('template_directory');?>/images/vinyl-logo.png" alt="Sound" style="height:100px; width:auto;">
                            </a>
                        </div>
                        <div class="media-body">
                            <div class="row">
                                <a class="post_title col-md-9" href="<?php the_permalink() ?>" rel="bookmark">
                                    <h4 class="media-heading entry-title" id="post-<?php the_ID(); ?>"><?php the_title(); ?></h4>
                                </a>
                            </div>
                            <?php the_content(); ?>
                            <?php echo get_the_tag_list('<p class="singletags">',' ','</p>'); ?>
                        </div>
                    </div>

                    <?=function_exists('thumbs_rating_getlink') ? thumbs_rating_getlink() : ''?>
                </div>
                -->
                    <?php endwhile; ?>
                <?php else : ?>
                    <p class="center">
                        <?php _e( 'You don&#39;t have any posts yet.', 'tiles' ); ?>
                    </p>
                <?php endif; ?>
            </div>
        </div>
        <div class="col-md-4">
            <div id="header_opposites" >
                <h3 style="line-height: 1.6; font-weight: 500;">
                    An old dad, a young mom,<br/>
                    The one stayed, the other gone.<br/>
                    A dark hole, a bright sun,<br/>
                    A pretty daughter is so much fun.
                    <hr/>
                    A long road, a fast car<br/>
                    The sky and moon, they are so far.<br/>
                    Today we’re here,<br/>
                    Tomorrow there<br/>
                    We’re waiting for the ones who care.
                    <hr/>
                    A paper cup, a metal spoon<br/>
                    A lonely cat, a bride and groom.<br/>
                    A glass of milk, a cup of tea.<br/>
                    I love that you are here with me!<br/>
                </h3>
            </div>
        </div>

    </div>
</div>
<?php get_footer(); ?>
