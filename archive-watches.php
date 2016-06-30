<?php
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'my_custom_loop' );

function my_custom_loop () {
	the_post();
	$strDetails = get_field("basic_details");
	$strDetails = str_replace("<br />","<li>",$strDetails);
	?>

	<article class="page type-page status-publish entry" itemscope="" itemtype="http://schema.org/CreativeWork">
		<header class="entry-header">
			<h1 class="entry-title" itemprop="headline">Watches</h1> 
		</header>
		<div class="entry-content" itemprop="text">

			<?php 
			$query = new WP_Query( array( 'post_type' => array( 'watches' ) ) );
			while ( $query->have_posts() ) : $query->the_post();			
			?>
	
			<div class="watch_listing_row">
	
				<div class="one-fourth first">
				<a href="<?=get_the_permalink();?>"><img alt='<?=get_the_title()?>' title='<?=get_the_title()?>' class='watch_page_thumbnail' src='<?=get_the_post_thumbnail_url()?>'/></a>
				<br><br>
				</div>

				<div class="three-fourths">
					<div class="wrap">
					<h3><b><a class="watch_listing_link" href="<?=get_the_permalink();?>"><?php the_title();?></a></h3></b>
					<?php if (!empty($strDetails)) { ?>
					<span class="watch_page_basic_details"><ul><li><?=$strDetails?></ul></span>
					<?php } ?>
					</div>
				</div>

				<div class="clearfix"></div>

			</div>
	

			<?php endwhile;?>
		</div>
	</article>
<?php } ?>


<?php genesis(); ?>