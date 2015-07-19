</div>
<?php wp_footer(); ?>
<?php if(!is_product()  && !( is_home()) && !(is_archive())) {?>
    <div class="footer">
        <div style="float: left;">
            <a href="mailto:hanan@adoralevin.com">
                <img class="email_icon" src="http://adoralevin.com/wp-content/uploads/2015/05/connect_bb.png" alt="Contact me"/>
            </a>
        </div>
        <!--<div style="float: right; width: 360px;">-->
        <div class="social_container" style="float: right; width: 90%;">
            <a href="https://instagram.com/adoralevin/" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/instagram_blue_2.png" alt="Instagram" title="Instagram"/>
            </a>
            <a href="https://www.facebook.com/pages/Adora-Art-Project-Fan-Club/837747369619420">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/facebook_blue_2.png" alt="Facebook" title="Facebook"/>
            </a>
            <a href="https://twitter.com/AdoraLevin" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/twitter_blue_2.png" alt="Twitter" title="Twitter"/>
            </a>

            <a href="https://www.youtube.com/user/growabrain" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/youtube_blue_2.png" alt="Youtube" title="YouTube"/>
            </a>
            <a href="https://vimeo.com/user27307021" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/vimeo_blue_2.png" alt="Vimeo" title="Vimeo"/>
            </a>
            <a href="https://soundcloud.com/adorasdad" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/soundcloud_blue_2.png" alt="Soundcloud" title="Soundlcoud"/>
            </a>
            <a href="https://www.flickr.com/photos/60289418@N03/favorites/" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/flickr_blue_2.png" alt="Flickr" title="Flickr"/>
            </a>
            <a href="http://abcbanana123.deviantart.com/favourites/" target="_blank">
                <img class="social_icon" src="http://adoralevin.com/wp-content/uploads/2015/07/deviantart_blue_2.png" alt="Deviant Art" title="Deviant Art"/>
            </a>
        </div>
    </div>
<?php }

if ( is_home() ) {?>
    <div class="footer row" style="text-align: center; padding-top: 5px; margin-left: 0;">
        <div class="container">
            <div class="col-md-1">

                <div class="text-center square-link" >
                    <a href="mailto:hanan@adoralevin.com">
                        <i class="fa fa-envelope fa-2x"></i>
                    </a>
                </div>

            </div>

            <div class="col-md-8">
                <span class="footer_span text-center" style="font-size: 20px;">
                This is part of The Adora Art Project
                </span>
            </div>

            <div class="col-md-1">
                <div class="text-center square-link" >

                    <a href="https://instagram.com/adoralevin/" target="_blank">
                        <i class="fa fa-instagram fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="text-center square-link" >
                    <a href="https://www.facebook.com/pages/Adora-Art-Project-Fan-Club/837747369619420">
                        <i class="fa fa-facebook fa-2x"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-1">
                <div class="text-center square-link" >
                    <a href="https://twitter.com/AdoraLevin" target="_blank">
                        <i class="fa fa-twitter fa-2x"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
</body>
</html>
