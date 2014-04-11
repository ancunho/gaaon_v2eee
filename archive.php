<?php get_header(); ?>
<!-- Container Start 
<div class="titleTop container">	
	<h2 class="topH2_01">COMPANY BLOG & NEWSROOM</h2>
</div>-->
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
		<div class="postList col-lg-3 col-xs-12 col-sm-4 col-md-4">
			
			<div class="thumbnail"><a href="<?php the_permalink(); ?>">
				<div class="hidden-xs">
					<?php 
					if ( has_post_thumbnail() ) { ?> 
					<?php the_post_thumbnail(); ?> 
					<?php } else { ?> 
					<img src="<?php echo IMAGES; ?>/1.png" /> 
					<?php } ?> 
				</div>
				<div class="caption">
			        <h3><?php the_title(); ?></h3>
			        <p><?php the_excerpt(); ?></p>
			   		<!--<span class="span01 glyphicon glyphicon-circle-arrow-right"></span>-->
			   	</div></a>
			</div>
			
		</div>
		<div class="postList col-lg-3 col-xs-12 col-sm-4 col-md-4">
			
			<div class="thumbnail"><a href="#">
				<div class="hidden-xs"><img src="<?php echo IMAGES ?>/2.jpg"></div>
				<div class="caption">
			        <h3>미역에는 칼슘. 무지질</h3>
			        <p>미역에는 칼슘. 무지질 함량이 뛰어나 골격 치아형성 심장 그렇다고 너무 많이 드시면 안되구요. </p>
			   		<!--<span class="span01 glyphicon glyphicon-circle-arrow-right"></span>-->
			   	</div></a>
			</div>
			
		</div>
		<div class="postList col-lg-3 col-xs-12 col-sm-4 col-md-4">
			
			<div class="thumbnail"><a href="#">
				<div class="hidden-xs"><img src="<?php echo IMAGES ?>/3.jpg"></div>
				<div class="caption">
			        <h3>미역에는 칼슘. 무지질</h3>
			        <p>미역에는 칼슘. 무지질 함량이 뛰어나 골격 치아형성 심장 그렇다고 너무 많이 드시면 안되구요. </p>
			   		<!--<span class="span01 glyphicon glyphicon-circle-arrow-right"></span>-->
			   	</div></a>
			</div>
			
		</div>
		<div class="postList col-lg-3 col-xs-12 col-sm-4 col-md-4">
			
			<div class="thumbnail"><a href="#">
				<div class="hidden-xs"><img src="<?php echo IMAGES ?>/4.jpg"></div>
				<div class="caption">
			        <h3>미역에는 칼슘. 무지질</h3>
			        <p>미역에는 칼슘. 무지질 함량이 뛰어나 골격 치아형성 심장 그렇다고 너무 많이 드시면 안되구요. </p>
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