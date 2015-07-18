<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=2.0, user-scalable=yes" />
    <script src="http://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <!--  BOOTSTRAP  -->
    <link rel="stylesheet" href="media.css">
    <link rel="icon" href="http://adoralevin.com/wp-content/uploads/2015/05/logo_original_white_circle.ico" type="image/x-icon" />
    <?php if(is_home() ) {?>
	<link rel="shortcut icon" href="http://adoralevin.netne.net/wp-content/uploads/2015/07/1-logo1.ico" type="image/x-icon" />
    <?php } else {?>
	<link rel="shortcut icon" href="http://adoralevin.com/wp-content/uploads/2015/05/logo_original_white_circle.ico" type="image/x-icon" />
    <?php }?>
    <title>
        <?php wp_title('|',true,'right'); ?>
    </title>
    <?php wp_head(); ?>

</head>


<body <?php body_class(); ?> style="border-collapse:collapse; display : table;">
    <div class="menu-wrap">
        <?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'menu' ) ); ?>
        <button class="close-button" id="close-button">Close Menu</button>
    </div>

    <div id="contachiner">
        <?php if(!is_product() && !is_archive()) {?>
        <div id="header">
            <div id="logo" style="position: relative;"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
                <?php if (get_theme_mod( 'logo_img' )) : ?>
                    <img src="<?php echo esc_url (get_theme_mod( 'logo_img')); ?>" alt="Logo"/>
                <?php endif; ?>
                <div id="site-description">
                    <?php bloginfo( 'description' ); ?>
                </div>
            </a>
        </div>

        <div id="mainmenu">
            <div class="menu-main-menu-container">
                <ul id="menu-main-menu-2" class="mainnav">
                    <li class="icon-art"><a href="http://growabrain.tumblr.com/" target="_blank">Art Blog</a></li>
                    <li class="icon-book"><a href="http://www.amazon.com/Songs-Five-Year-Hanan-Levin/dp/1312715995/" target="_blank">My Book</a></li>
                    <li class="icon-songs"><a href="http://growabrain.tumblr.com/tagged/songs-we-wrote" target="_blank">My Songs</a></li>
                    <li class="icon-sites"><a href="http://adoralevin.com/sites/" target="_blank">All My Sites</a></li>
                    <li class="icon-buy"><a href="http://adoralevin.com/shop/" target="_blank">Shop</a></li>
                    <li class="icon-forum"><a href="http://adoralevin.com/forum/" target="_blank">Community</a></li>
                </ul>
            </div>
        </div>

        <!-- Start of StatCounter Code for Default Guide -->
	<script type="text/javascript">
		var sc_project=10453760; 
		var sc_invisible=0; 
		var sc_security="0120b437"; 
		var scJsHost = (("https:" == document.location.protocol) ?
			"https://secure." : "http://www.");
		document.write("<sc"+"ript type='text/javascript' src='" + scJsHost + "statcounter.com/counter/counter.js'></"+"script>");
	</script>

	<noscript>
		<div id="statcounter_image" class="statcounter">
			<a title="hit counter" href="http://statcounter.com/" target="_blank">
			    <img class="statcounter" src="http://c.statcounter.com/10453760/0/0120b437/0/" alt="hit counter">
			</a>
		</div>
	</noscript>
	<!-- End of StatCounter Code for Default Guide -->

    </div>
    <?php } ?>


    <!--SHOP PAGE-->
    <?php if (is_archive() || is_page('Cart') || is_product() || is_page('Checkout')) {?>
	<!--HEADER-->
	<div class="jumbotron" style="padding-top: 0; padding-bottom: 0;">
	    <a href="http://adoralevin.com/shop">
	        <img src="http://adoralevin.com/wp-content/uploads/2015/07/Estore.png" alt="Cover image" style="width:100%;">
	    </a>
	</div>

	<!--SUBHEADER-->
	<div class="shop_subheader row">
	    <div class="col-md-6"></div>
	    <div class="col-md-6">
		<a href="mailto:hanan@adoralevin.com">
	            <img class="shop_email_icon" src="http://adoralevin.com/wp-content/uploads/2015/05/connect_bb.png" alt="Contact me"/>
        	</a>
		<a href="https://www.facebook.com/pages/Adora-Art-Project-Fan-Club/837747369619420">
		    <img class="shop_social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/facebook_blue_2.png" alt="Facebook" title="Facebook"/>
		</a>
		<a href="https://twitter.com/AdoraLevin" target="_blank">
		    <img class="shop_social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/twitter_blue_2.png" alt="Twitter" title="Twitter"/>
		</a>
	    </div>
	</div>

	<!--SIDEBAR-->
	<div class="shop_sidebar">
	    <?php /*dynamic_sidebar( 'sidebar-1' ); */?>
	    <ul class="product_categories">
	    <li><a href="http://adoralevin.com/wp-content/uploads/2015/05/Book_blue.png" class="category">Adora Book</a><br/></li>
	    <li><a href="http://adoralevin.com/wp-content/uploads/2015/05/Mug_blue.png" class="category">Adora coffe mugs</a><br/></li>
	    <li><a href="http://adoralevin.com/wp-content/uploads/2015/05/Mouse_blue.png" class="category">Adora mouse pad</a><br/></li>
	    <li><span class="parent_category">Adora Shirts</span><br/>
	    <a href="http://www.zazzle.com/songs_for_five_year_olds_shirts-235945995068783534" class="subcategory">Female T-Shirt</a><br/>
	    <a href="http://www.zazzle.com/songs_for_five_year_olds_shirts_mens_t_shirt-235479052345941175" class="subcategory">Male T-Shirt</a><br/></li>
	    <li><a href="http://www.zazzle.com/songs_for_five_year_olds_shirts_tote_bag-149398615970097273" class="category">Adora Tote bag</a><br/></li>
	    <li><span class="parent_category">Art Cards</span><br/>
	    <a href="http://adoralevin.com/shop/?add-to-cart=203" class="subcategory">6 Movie posters Adora</a><br/>
	    <a href="" class="subcategory">6 November 2012 Adora</a><br/>
	    <a href="http://adoralevin.com/shop/?add-to-cart=209" class="subcategory">I love Dad greeting card</a><br/></li>
	    <li><a href="http://adoralevin.com/wp-content/uploads/2015/05/Dorian_blue.png" class="category">Original Adora art</a><br/></li>
	    </ul>
	</div>
	
    <?php }?>



    <?php if(is_home() ) {?>
    <div class="opposites_cover">
	<div class="jumbotron" style="padding-top: 0; padding-bottom: 0; margin-bottom: 0px !important">
	    <img src="http://adoralevin.com/wp-content/uploads/2015/07/Opposites.png" alt="Cover image">
<!--        <img src="http://adoralevin.com/wp-content/uploads/2015/07/tumblr_static_apyekj7a014oswkgc408gkcw4.jpg" alt="Cover image"/>-->
	</div>
	<div>
	    <!--<h1>OPPOSITES</h1>-->
	    <h2 style="margin-bottom: 1.5%; font-size: 38px; font-weight: 600;">Lyrics by Adora Levin & Hanan Levin</h2>
        <span><b>When Adora was 4 years old, we started composing little songs together.
                <br>In the past 18 months, we wrote about 40 songs, and published one book.</b></span><br>
        <span><b>Many of these songs had been put to music by musicians from around the world.</b></span><br>
        <span><b>The song “Opposites“ was interpreted in 6 different styles.</b></span><br>
        <span><b>Now you can vote for the versions you like. No registration needed.</b></span>
	</div>
    </div>
        <hr>

    <?php }?>

    <?php if(!is_home() ) {?>
    <div id="header2">
        <a class="menu-button" id="open-button" style="text-align: center; margin-left: 5%"></a>
        <a id="logo2" href="http://adoralevin.com">
            <img src="http://adoralevin.com/wp-content/uploads/2015/05/logo_original_white_circle_100.png" style="margin-top: 3px" alt="Logo"/>
        </a>
        <!--<div id="logo2" style="position: relative;"> <a href="<?php /*echo esc_url( home_url( '/' ) ); */?>" title="<?php /*echo esc_attr( get_bloginfo( 'name', 'display' ) ); */?>" rel="home">
                <?php /*if (get_theme_mod( 'logo_img' )) : */?>
                    <img src="<?php /*echo esc_url (get_theme_mod( 'logo_img')); */?>">
                <?php /*endif; */?>
            </a>
        </div>-->

        <div id="mainmenu1">
            <div class="menu-main-menu-container">
                <ul id="menu-main-menu-2" class="mainnav">
                    <li class="icon-art"><a href="http://growabrain.tumblr.com/" target="_blank">Art Blog</a></li>
                    <li class="icon-book"><a href="http://www.amazon.com/Songs-Five-Year-Hanan-Levin/dp/1312715995/" target="_blank">My Book</a></li>
                    <li class="icon-songs"><a href="http://growabrain.tumblr.com/tagged/songs-we-wrote" target="_blank">My Songs</a></li>
                    <li class="icon-sites"><a href="http://adoralevin.com/sites/" target="_blank">All My Sites</a></li>
                    <li class="icon-buy"><a href="http://adoralevin.com/shop/" target="_blank">Shop</a></li>
                    <li class="icon-forum"><a href="http://adoralevin.com/forum/" target="_blank">Community</a></li>
                </ul>
            </div>
        </div>
    </div>
    <?php }?>
