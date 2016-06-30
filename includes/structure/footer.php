<?php

if( !defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/** Customize Genesis Footer */
/** This snippet will help to modify the complete genesis footer area */
/** For Non HTML5 Websites */

remove_action( 'genesis_footer', 'genesis_do_footer' );
add_action( 'genesis_footer', 'ncclassicwatches_genesis_footer' );
function ncclassicwatches_genesis_footer() {
    ?>

	</div><!-- .wrapper -->
</div><!-- .contbody -->

<div id="footer">

    <div class="wrap">
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' => 'header-menu' ) ); ?>
	</div>

	<?php if ( is_active_sidebar( 'footer_bottom_content' ) ) : ?>
    <div class="wrap">
		<div class="footer_bottom_content">
			<?php dynamic_sidebar( 'footer_bottom_content' ); ?>
		</div>
	</div>	
	<?php endif; ?>

</div><!-- .footer -->

    <?php
}

// add_action( 'wp_footer', 'bfg_disable_pointer_events_on_scroll', 99 );
/**
 * Disable pointer events when scrolling. Be careful using this with CSS :hover-enabled menus.
 *
 * See: https://gist.github.com/ossreleasefeed/7768761
 *
 * @since 2.0.20
 */
function bfg_disable_pointer_events_on_scroll() {

	ob_start();
	?><script>
		if( window.addEventListener ) {
			var root = document.documentElement;
			var timer;

			window.addEventListener('scroll', function() {
				clearTimeout(timer);

				if (!root.style.pointerEvents) {
					root.style.pointerEvents = 'none';
				}

				timer = setTimeout(function() {
					root.style.pointerEvents = '';
				}, 250);
			}, false);
		}
	</script>
	<?php
	$output = ob_get_clean();
	echo preg_replace( '/\s+/', ' ', $output ) . "\n";

}

// add_action( 'wp_footer', 'bfg_ie_font_face_fix', 99 );
/**
 * Forces the main stylesheet to reload on document ready for IE8 and below.
 * This redraws any @font-face fonts, fixing the IE8 font loading bug.
 *
 * See: http://stackoverflow.com/questions/9809351/ie8-css-font-face-fonts-only-working-for-before-content-on-over-and-sometimes
 *
 * @since 2.0.13
 */
function bfg_ie_font_face_fix() {

	ob_start();
	?><!--[if lt IE 9]>
		<script>
			jQuery(document).ready(function($) {
				var head = document.getElementsByTagName('head')[0],
					style = document.createElement('style');
				style.type = 'text/css';
				style.styleSheet.cssText = ':before,:after{content:none !important;}';
				head.appendChild(style);
				setTimeout(function(){
					head.removeChild(style);
				}, 0);
			});
		</script>
	<![endif]-->
	<?php
	$output = ob_get_clean();
	echo preg_replace( '/\s+/', ' ', $output ) . "\n";

}
