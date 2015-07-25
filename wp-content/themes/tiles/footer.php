
<?php if(!is_product()  && !( is_home()) && !(is_archive())) {?>
    <div class="footer">
        <div style="float: left;">
            <div class="text-center square-link" style="padding-top: 11%;">
                <a href="mailto:hanan@adoralevin.com">
                    <i class="fa fa-envelope fa-2x"></i>
                </a>
            </div>
        </div>
        <!--<div style="float: right; width: 360px;">-->
        <div class="social_container row" style="float: right; width: 90%;">
            <div class="container">
                <div class="col-md-1">
                    <div class="text-center square-link" style="padding-top: 10%">
                        <a href="https://instagram.com/adoralevin/" target="_blank">
                            <i class="fa fa-instagram fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center square-link" style="padding-top: 7%;">
                        <a href="https://www.facebook.com/pages/Adora-Art-Project-Fan-Club/837747369619420" target="_blank">
                            <i class="fa fa-facebook fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="text-center square-link" style="padding-top: 10%;">
                        <a href="https://twitter.com/AdoraLevin" target="_blank">
                            <i class="fa fa-twitter fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center square-link" style="padding-top: 6%;">
                        <a href="https://www.youtube.com/user/growabrain" target="_blank">
                            <i class="fa fa-youtube fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="text-center square-link" style="padding-top: 10%;">
                        <a href="https://vimeo.com/user27307021" target="_blank">
                            <i class="fa fa-vimeo-square fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center square-link" style="padding-top: 5%;">
                        <a href="https://soundcloud.com/adorasdad" target="_blank">
                            <i class="fa fa-soundcloud fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-1">
                    <div class="text-center square-link" style="padding-top: 11%;">
                        <a href="https://www.flickr.com/photos/60289418@N03/favorites/" target="_blank">
                            <i class="fa fa-flickr fa-2x"></i>
                        </a>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="text-center square-link" style="padding-top: 6%;">
                        <a href="http://abcbanana123.deviantart.com/favourites/" target="_blank">
                            <i class="fa fa-deviantart fa-2x"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php }

if ( is_home() ) {?>

    <footer class="mdl-mini-footer mdl-color--red-900 opposites-footer">
        <div class="mdl-mini-footer--left-section">
            <div class="mdl-logo">&copy; 2015 adoralevin. All rights reserved</div>
        </div>
        <div class="mdl-mini-footer--right-section">
            <ul class="mdl-mini-footer--link-list">
                <li>
                    <button
                        class="mdl-button mdl-js-button mdl-button--fab
                        mdl-js-ripple-effect mdl-color--teal-500 footer-btn mdl-button--mini-fab"
                        onclick="location.href='mailto:hanan@adoralevin.com'">
                        <i class="fa fa-envelope fa-fw"></i>
                    </button>
                </li>
                <li>
                    <button
                        class="mdl-button mdl-js-button mdl-button--fab
                        mdl-js-ripple-effect mdl-color--teal-500 footer-btn mdl-button--mini-fab"
                        onclick="location.href='https://instagram.com/adoralevin/'">
                        <i class="fa fa-instagram fa-fw"></i>
                    </button>
                </li>
                <li>
                    <button
                        class="mdl-button mdl-js-button mdl-button--fab
                        mdl-js-ripple-effect mdl-color--teal-500 footer-btn mdl-button--mini-fab"
                        onclick="location.href='https://www.facebook.com/pages/Adora-Art-Project-Fan-Club/837747369619420'">
                        <i class="fa fa-facebook fa-fw"></i>
                    </button>
                </li>
                <li>
                    <button
                        class="mdl-button mdl-js-button mdl-button--fab
                        mdl-js-ripple-effect mdl-color--teal-500 footer-btn mdl-button--mini-fab"
                        onclick="location.href='https://twitter.com/AdoraLevin'">
                        <i class="fa fa-twitter fa-fw"></i>
                    </button>
                </li>
            </ul>
        </div>
    </footer>
</main>
<!-- MDL end of layout -->
</div>

<?php } ?>


<?php wp_footer(); ?>
</body>

<style>
    .footer .square-link{
        width: 40px;
        height: 40px;
    }
    .footer .col-md-2{
        padding-left: 5%;
    }
</style>
</html>
