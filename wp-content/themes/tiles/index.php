<?php get_header(); ?>

<!--
<div class="grid-wrap">
<div id="contentwrapper">
-->

<main class="mdl-layout__content">
    <div class="opposites_cover">
        <div>
            <h1 class="opposites-title">
                <img src="<?php echo get_bloginfo('template_directory'); ?>/images/vinyl-logo.png" alt=""/>
                Opposites
            </h1>
            <!--<h1>OPPOSITES</h1>-->
            <h2 class="opposites-subtitle"></h2>
            <p class="opposites-description">
                When Adora was 4 years old, we started composing little songs together. <br>
                In the past 18 months, we wrote about 40 songs, and published one book. <br>
                Many of these songs had been put to music by musicians from around the world. <br>
                The song “Opposites“ was interpreted in 6 different styles. <br>
                Now you can vote for the versions you like. No registration needed. <br>
            </p>

        </div>
    </div>


    <div class="mdl-grid">


        <div class="mdl-cell mdl-cell--4-col mdl-cell--hide-desktop">
            <div id="header_opposites">
                <h1 class="opposites-lyric-title">Lyrics by <br>Adora Levin <br>& Hanan Levin</h1>
                <p class="opposites-description">
                    An old dad, a young mom,<br/>
                    The one stayed, the other gone.<br/>
                    A dark hole, a bright sun,<br/>
                    A pretty daughter is so much fun. <br>
                    <br>
                    A long road, a fast car<br/>
                    The sky and moon, they are so far.<br/>
                    Today we’re here,<br/>
                    Tomorrow there<br/>
                    We’re waiting for the ones who care. <br>
                    <br>
                    A paper cup, a metal spoon<br/>
                    A lonely cat, a bride and groom.<br/>
                    A glass of milk, a cup of tea.<br/>
                    I love that you are here with me!<br/>
                </p>
            </div>
        </div>


        <div class="mdl-cell mdl-cell--8-col">
            <div id="post-opposites">

                <?php query_posts( 'posts_per_page=-1' ); ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>



                        <div class="mdl-card mdl-shadow--4dp demo-card-wide">
                            <div class="mdl-card__title">
                                <?php if( function_exists('zilla_likes') ) zilla_likes(); ?>
                                <h2 class="mdl-card__title-text opposites-sub-title"><?php the_title(); ?></h2>
                            </div>
                            <div class="mdl-card__supporting-text opposites-description">
                                <?php the_content(); ?>

                                <?php echo get_the_tag_list('<p class="singletags">',' ','</p>'); ?>

                            </div>
                        </div>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>


        <div id="lyrics" class="mdl-cell mdl-cell--4-col mdl-cell--hide-tablet mdl-cell--hide-phone " style="float: right;" >
            <div id="header_opposites">
                <h1 class="opposites-lyric-title">Lyrics by <br>Adora Levin <br>& Hanan Levin</h1>
                <p class="opposites-description">
                    An old dad, a young mom,<br/>
                    The one stayed, the other gone.<br/>
                    A dark hole, a bright sun,<br/>
                    A pretty daughter is so much fun. <br>
                    <br>
                    A long road, a fast car<br/>
                    The sky and moon, they are so far.<br/>
                    Today we’re here,<br/>
                    Tomorrow there<br/>
                    We’re waiting for the ones who care. <br>
                    <br>
                    A paper cup, a metal spoon<br/>
                    A lonely cat, a bride and groom.<br/>
                    A glass of milk, a cup of tea.<br/>
                    I love that you are here with me!<br/>
                </p>
            </div>
        </div>



    </div>




    <?php get_footer(); ?>
