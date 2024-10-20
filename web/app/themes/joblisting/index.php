<?php 

	$controller = new Controllers\JobPostController();
	$view_data = $controller->index();

	//error_log(print_r($view_data,true),3,'c:/xampp_server/htdocs/joblisting/_a.log');

	get_header();
?>

	<section class="job-bg page job-list-page">
		<div class="container">
			<div class="breadcrumb-section">
				<!-- breadcrumb -->
				<ol class="breadcrumb">
					<li><a href="<?= get_home_url(); ?>">Home</a></li>
					<li>Technical</li>
				</ol><!-- breadcrumb -->						
				<h2 class="title">Engineers & Architects</h2>
			</div>

			<div id="app">
				<job-listing
					:job_posts='<?= json_vue_prop($view_data['job_posts']); ?>'
				></job-listing>
			</div>
		</div><!-- container -->
	</section><!-- main -->
	
	
<?php get_footer(); ?>
