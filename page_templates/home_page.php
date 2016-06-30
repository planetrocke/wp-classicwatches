<?php
/**
* Template Name: Home PAGE
* Description: Home page template
*/

remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'child_do_custom_loop' );

function child_do_custom_loop(){
?>

<article class="page type-page status-publish entry" itemscope="" itemtype="http://schema.org/CreativeWork">
		<header class="entry-header">
			<h1 class="entry-title" itemprop="headline">Welcome.</h1> 
		</header>
		<div class="entry-content" itemprop="text">

		<?php 
		if(have_rows('content')) { ?>
			<div class="home-page-content">
				<?php 
				while(have_rows('content')) {
					the_row();
					$intColumns = get_sub_field('columns');
					if ($intColumns == '2') {
						$strClass = "one-half";
					}
					?>
					<div class="<?=$strClass?><?php if ($intColumns == 2){?> first<?php } ?>">
					<?php the_sub_field('text'); ?>
					</div>
					<?php if ($intColumns == 2){ ?>
					<div class="<?=$strClass?>">
					<?php the_sub_field('text_2'); ?>
					</div>
					<?php } ?>
					<div class="clearfix"></div>
				<?php
				} ?>
			</div>
		<?php 
		}
?>
		</div>
</article>
<?php

}

genesis();