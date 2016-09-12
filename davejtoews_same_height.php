<?php 
/*
Plugin Name: DaveJToews Same Height
Version: 1.0
Author: Dave J Toews
Author URI: http://davejtoews.com
Description: Javascript that ensures all elements with the class "same-height" are the same height.
*/


add_action( 'wp_footer', 'djt_same_height_js' );

wp_enqueue_script( 'jquery' );


function djt_same_height_js() {
?>
<script type="text/javascript">
    function djt_sameHeight(selector) {
        jQuery(document).ready(function($){
            function djt_getBiggestHeight(selector) {
                var biggestHeight = 0;
                $(selector).each(function() {
                    if ($(this).height() > biggestHeight) {
                        biggestHeight = $(this).height();
                    }
                })
                return biggestHeight;
            }
            function djt_setHeights(selector) {
                if (window.matchMedia('(min-width: 768px)').matches) {
                    $(selector).height(djt_getBiggestHeight(selector));
                }
            }
            function djt_unsetHeights(selector) {
                $(selector).height("auto");
            }
            
            
            $(window).on('load', function(){
                djt_setHeights(selector);
            });
            $('iframe').on('load', function() {
                djt_unsetHeights(selector);
                djt_setHeights(selector);
            });   
            $(window).resize(function() {
                djt_unsetHeights(selector);
                djt_setHeights(selector);
            });        

            

        }, jQuery); 
    }

    djt_sameHeight(".same-height");
</script>
<?php
}

?>
