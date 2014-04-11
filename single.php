<?php get_header(); ?>


<!-- Container Start -->
<h2 id="cate_title">
IT News borad is Good!
</h2>

<div id="containerBox">
<div id="container" class="container bs-docs-container">
	<!-- Post List Start -->
	<div class="row" id="view">
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
		
		<div class="viewLeft col-lg-9 col-md-9 col-sm-12 col-xs-12">
			<h3><?php the_title(); ?></h3>
			<div class="content_div">
				<?php the_content(); ?>
			</div>
			<!--************************* Comment *************************-->
			<!-- Duoshuo Comment BEGIN -->
			<div style="margin-top:30px; border-top:3px solid #bbb;"></div>
				<div class="ds-thread"></div>
			<script type="text/javascript">
			var duoshuoQuery = {short_name:"gaaon"};
				(function() {
					var ds = document.createElement('script');
					ds.type = 'text/javascript';ds.async = true;
					ds.src = 'http://static.duoshuo.com/embed.js';
					ds.charset = 'UTF-8';
					(document.getElementsByTagName('head')[0] 
					|| document.getElementsByTagName('body')[0]).appendChild(ds);
				})();
				</script>
			<!-- Duoshuo Comment END -->
			<!--************************* //Comment *************************-->
		</div>
		<div class="viewRight col-xs-3 col-md-3 hidden-sm hidden-xs">
			<form class="navbar-form" role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
				<div class="form-group">
					<input type="text" class="letterinput form-control" name="s" placeholder="Search">
				</div>
				<button type="submit" class="gobutton btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
			</form>
		</div>








			
	<?php endwhile; ?>
	<?php endif; ?>
	</div>	
		
	<!-- Post List End -->

</div>
</div>
<!-- Container End -->
<?php get_footer(); ?>