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
  	if ( undefined !== window.jQuery ) {
	    // script dependent on jQuery
        function djt_getBiggestHeight() {
            var biggestHeight = 0;

            jQuery(".same-height").each(function() {
                if (jQuery(this).height() > biggestHeight) {
                    biggestHeight = jQuery(this).height();
                }
            })

            return biggestHeight;
        }

        function djt_setHeights() {
            if (window.matchMedia('(min-width: 768px)').matches) {

                jQuery(".same-height").height(djt_getBiggestHeight());

            }
        }

        

        jQuery(window).load(function(){
            djt_setHeights();
        });

        jQuery(window).resize(function() {
            djt_setHeights();
        });
  	}
</script>
<?php
}

?>