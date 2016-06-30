<?php
// Homepage CUSTOM LOOP
remove_action( 'genesis_loop', 'genesis_do_loop' );
add_action( 'genesis_loop', 'my_custom_loop' );
function my_custom_loop () {
	the_post();
	# parse details
	$strDetails = get_field("basic_details");
	$strDetails = str_replace("<br />","<li>",$strDetails);
?>

<article class="page type-page status-publish entry" itemscope="" itemtype="http://schema.org/CreativeWork">
	<header class="entry-header">
		<h1 class="entry-title" itemprop="headline"><?php the_title();?></h1> 
	</header>
	<div class="entry-content" itemprop="text">
		<div class="one-half first">
			<img alt='<?=get_the_title()?>' title='<?=get_the_title()?>' class='watch_page_thumbnail' src='<?=get_the_post_thumbnail_url()?>'/>
		</div>
		<div class="one-half">
			<div class="watch_page_row_header">
			PRICE
			</div>
			<span class="watch_page_price">$<?=get_field("price") ?></span>
			<br><br>
			<?php if (!empty($strDetails)) { ?>
			<div class="watch_page_row_header">
			BASIC DETAILS
			</div>
			<span class="watch_page_basic_details"><ul><li><?=$strDetails?></ul></span>
			<?php } ?>
		</div>
		<div class="clearfix"></div>
	<br>
	<?php the_content();?>
	</div>
</article>

<?php } ?>


<?php genesis(); ?>