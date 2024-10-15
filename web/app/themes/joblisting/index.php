<?php 

	$controller = new Controllers\JobPostController();
	$view_data = $controller->index();

	get_header();
?>

	<section class="job-bg page job-list-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="index.html">Home</a></li>
					<li>Engineer/Architects</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Software Engineer</h2>
			</div>

			<div id="app">
				<job-listing
					:job_posts='<?= json_vue_prop($view_data['job_posts']); ?>'
				></job-listing>
			</div>
		</div><!-- container -->
	</section><!-- main -->
	
	
<?php get_footer(); ?>
