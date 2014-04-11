<?php get_header(); 
/* Search page */
?>

<div id="containerBox">
	<div id="container" class="container bs-docs-container">
		<h2 class="cate_title">Search Results
			<?php 
				//$category = get_the_category(); 
				//echo $category[0]->cat_name;
				$str = single_cat_title();
				echo $str;
			?>
		</h2>
		<!-- Post List Start -->
		<div class="row">
		<?php $posts=query_posts($query_string .'&posts_per_page=20'); ?>
		<?php if (have_posts()) {  ?>
		<?php while (have_posts()) : the_post(); ?>
			<div class="postList col-lg-3 col-xs-12 col-sm-4 col-md-4">
				<div class="thumbnail">
					<a href="<?php the_permalink(); ?>">
						<div class="hidden-xs">
							<?php 
							if ( has_post_thumbnail() ) { 
								the_post_thumbnail(); 
							}else{ ?> 
							<img src="<?php echo IMAGES; ?>/1.png" /> 
							<?php } ?> 
						</div>
						<div class="caption">
					        <h3><?php the_title(); ?></h3>
					        <p>
					        	<a href="http://www.naver.com">
					        		<span class="label <?php categoryStyle($post->ID); ?>"><?php categoryName($post->ID); ?></span>
					        	</a>
					        </p>
					   	</div>
					</a>
				</div>
			</div>
		<?php endwhile; ?>
		<?php }else{ ?>
		<div class="search_no_result">
			<h3>검색결과가 없습니다. 아래 태그들을 참고하세요.</h3>
			<?php wp_tag_cloud('number=500'); ?>

		</div>
		<?php }  ?>
		</div>
			
		<!-- Post List End -->
	</div>
</div>
<!-- Container End -->
<?php get_footer(); ?>