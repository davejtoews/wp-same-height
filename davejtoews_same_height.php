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
    jQuery(document).ready(function($){

        function djt_getBiggestHeight() {
            var biggestHeight = 0;
            $(".same-height").each(function() {
                if ($(this).height() > biggestHeight) {
                    biggestHeight = $(this).height();
                }
            })
            return biggestHeight;
        }

        function djt_setHeights() {
            if (window.matchMedia('(min-width: 768px)').matches) {
                $(".same-height").height(djt_getBiggestHeight());
            }
        }

        function djt_unsetHeights() {
            $(".same-height").height("auto");
        }

        $(window).load(function(){
            djt_setHeights();
        });

        $('iframe').load(function() {
            djt_unsetHeights();
            djt_setHeights();
        });   

        $(window).resize(function() {
            djt_unsetHeights();
            djt_setHeights();
        });

    }, jQuery);
</script>
<?php
}

?>
