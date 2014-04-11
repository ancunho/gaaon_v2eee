<?php get_header(); 

?>

<h2 id="cate_title" style="background:none;">

	<?php 
		//$category = get_the_category(); 
		//echo $category[0]->cat_name;
	$str = single_cat_title();
	echo $str;
	?>
</h2>
<div id="containerBox">
<div id="container" class="container bs-docs-container">
	
	<!-- Post List Start -->
	<div class="row">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	
		<!--
		col-xs-12  ===> 스마트폰에서는 한줄에 한개 포스트
		col-sm-4   ===> 패드에서는 한줄에 3개씩 
		col-md-3   ===> 컴터에서는 한줄에 4개식 
		col-lg-3   ===> 큰 컴터에서는 한줄에 4개식 
			
		-->

		<div class="postList col-lg-3 col-xs-12 col-sm-4 col-md-3">
			
			<div class="thumbnail"><a href="<?php the_permalink(); ?>">
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

			   		<!--<span class="span01 glyphicon glyphicon-circle-arrow-right"></span>-->
			   	</div></a>
			</div>
			
		</div>
		
		
	
	<?php endwhile; ?>
	<?php endif; ?>
	</div>	
		
	<!-- Post List End -->

</div>
</div>
<!-- Container End -->
<?php get_footer(); ?>