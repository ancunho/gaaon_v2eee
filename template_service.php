<?php 
/*
	Template Name: Service Template
*/


get_header(); ?>
<!-- Container Start -->
<div class="top_banner">
	<div class="titleTop container">	
		<h2 class="topH2_01">COMPANY BLOG & NEWSROOM</h2>
	</div>
</div>
<div id="containerBox">
<div id="container" class="container bs-docs-container">
	<!-- Post List Start -->
	<div class="row">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		
		<h1 style="text-align:center;">Comming Soon</h1>
			
	<?php endwhile; ?>
	<?php endif; ?>
	</div>	
		
	<!-- Post List End -->

</div>
</div>
<!-- Container End -->
<?php get_footer(); ?>