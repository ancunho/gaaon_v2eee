<?php get_header(); ?>

<!-- Main Start -->
<div id="mainHome">
	<div id="mainIcon" class="text-center"><span class="glyphicon glyphicon-user"></span></div>
	<p class="mainP1"><em>웹을 사랑하는 <i>고슴도치</i>의 야생블로그!</em></p>
	<h1 class="mainH1">Hello! I'm a <a href="">Front End</a> Developer!</h1>
	<span id="line01"></span>
	<p class="mainBtn01"><a href="#intro"><button type="button" class="btn btn-default btn-lg mainBtn01">자료실 바로가기</button></a><button type="button" class="btn btn-default btn-lg mainBtn01">자료실 바로가기</button></p>
</div>

<!--
	col-xs-12  ===> 스마트폰에서는 한줄에 한개 포스트
	col-sm-4   ===> 패드에서는 한줄에 3개씩 
	col-md-3   ===> 컴터에서는 한줄에 4개식 
	col-lg-3   ===> 큰 컴터에서는 한줄에 4개식 
-->
<div class="container" style="margin:3em auto 2em auto;">
	<div class="row">
		<div class="mainCon02 col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<h2>What is<br><span>Front End Development?</span></h2>
			<p>Form is built on the idea that you will deliver your website the way you want it. You can mix and match all of the content blocks.Form is built on the idea that you will deliver your website the way you want it. You can mix and match all of the content blocks.Form is built on the idea that you will deliver your website the way you want it. You can mix and match all of the content blocks.</p>
		</div>
		<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
			<img src="<?php echo IMAGES; ?>/macbook_coffee.jpg" alt="..." class="img-circle" style="width:90%;">
		</div>
	</div>
</div>
<div id="mainCon03">
	<div class="container">
		<div class="row">
			<h3 class="mainH3" id="intro">A trully immersive experience.</h3>
			<p class="mainP2"><small>Form is built on the idea that you will deliver your website the way you want it. You can mix and match all of the content blocks.</small></p>
			<div class="container mainCon01">
				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<h4 class="text-center">Fully responsive.</h4>
						<p class="text-center">Every piece of content looks gorgeous on all devices. Built on Bootstrap 3.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<h4 class="text-center">Fully responsive.</h4>
						<p class="text-center">Every piece of content looks gorgeous on all devices. Built on Bootstrap 3.</p>
					</div>
					<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
						<h4 class="text-center">Fully responsive.</h4>
						<p class="text-center">Every piece of content looks gorgeous on all devices. Built on Bootstrap 3.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Post List Start -->
<div class="container" style="margin-top:2em;">
	<div class="row">
		<h3 class="text-center" style="margin-bottom:1.3em;">최신 포스트</h3>
	<?php if(have_posts()) : ?>
	<?php while(have_posts()) : the_post(); ?>
	
		<!--
		col-xs-12  ===> 스마트폰에서는 한줄에 한개 포스트
		col-sm-4   ===> 패드에서는 한줄에 3개씩 
		col-md-3   ===> 컴터에서는 한줄에 4개식 
		col-lg-3   ===> 큰 컴터에서는 한줄에 4개식 
			
		-->

		<div class="postList col-lg-3 col-xs-12 col-sm-6 col-md-3">
			
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
</div>
	<!-- Post List End -->

<!-- Main End -->






<?php get_footer(); ?>