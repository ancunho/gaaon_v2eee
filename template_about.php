<?php 
/*
	Template Name: About
*/


get_header(); ?>
<script type="text/javascript">
$(document).ready(function(){

	$('#myTab a').click(function (e) {
  e.preventDefault()
  $(this).tab('show')
})
});
</script>
<h2 id="cate_title">About</h2>
<div id="containerBox">
<div id="container" class="container bs-docs-container">
	
	<!-- Post List Start -->
	<div class="row">
		<!-- Nav tabs -->
		<ul class="nav nav-tabs" id="aboutTab">
  			<li class=-"active"><a href="#home" data-toggle="tab">Home</a></li>
  			<li><a href="#profile" data-toggle="tab">Profile</a></li>
  			<li><a href="#messages" data-toggle="tab">Messages</a></li>
  			<li><a href="#settings" data-toggle="tab">Settings</a></li>
		</ul>

		<!-- Tab panes -->
		<div class="tab-content">
			<div class="tab-pane active" id="home">...</div>
			<div class="tab-pane" id="profile">...</div>
			<div class="tab-pane" id="messages">...</div>
			<div class="tab-pane" id="settings">...</div>
		</div>
		<?php if(have_posts()) : ?>
		<?php while(have_posts()) : the_post(); ?>
		
			<!--
			col-xs-12  ===> 스마트폰에서는 한줄에 한개 포스트
			col-sm-4   ===> 패드에서는 한줄에 3개씩 
			col-md-3   ===> 컴터에서는 한줄에 4개식 
			col-lg-3   ===> 큰 컴터에서는 한줄에 4개식 
				
			-->
			


		<?php endwhile; ?>
		<?php endif; ?>
	</div>	
		
	<!-- Post List End -->

</div>
</div>
<!-- Container End -->

<?php get_footer(); ?>