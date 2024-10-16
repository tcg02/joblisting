<?php 
/**
 * Template Name: Create Job
 *
 * @package WordPress
 * @subpackage job-listing
 */

$controller = new Controllers\JobPostController();
$view_data = $controller->create();

get_header();
?>

<section class="job-bg ad-details-page">
    <div class="container">
        <div class="breadcrumb-section">
            <!-- breadcrumb -->
            <ol class="breadcrumb">
                <li><a href="<?= get_home_url(); ?>">Home</a></li>
                <li>Job Post</li>
            </ol><!-- breadcrumb -->						
            <h2 class="title">Post Your Job</h2>
        </div><!-- banner -->

        <div class="job-postdetails">
            <div class="row">	
                <div class="col-md-8">
                <form action="#" method="POST">
                        <fieldset>
                            <div class="section postdetails">
                                <h4>Post Your Job<span class="pull-right">* Mandatory Fields</span></h4>

                                <!-- Job Category -->
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Job Category</label>
                                    <div class="col-sm-9">
                                        <div class="dropdown category-dropdown">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Select a category</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">Software Engineer</a></li>
                                                <li><a href="#">Program Development</a></li>
                                                <li><a href="#">Project Manager</a></li>
                                                <li><a href="#">Graphics Designer</a></li>
                                            </ul>                                
                                        </div>
                                    </div>
                                </div>

                                <!-- Job Type -->
                                <div class="row form-group">
                                    <label class="col-sm-3">Job Type<span class="required">*</span></label>
                                    <div class="col-sm-9 user-type">
                                        <input type="radio" name="employment_type" value="Full Time" id="full-time"> <label for="full-time">Full Time</label>
                                        <input type="radio" name="employment_type" value="Part Time" id="part-time"> <label for="part-time">Part Time</label>
                                        <input type="radio" name="employment_type" value="Freelance" id="freelance"> <label for="freelance">Freelance</label>    
                                        <input type="radio" name="employment_type" value="Contractor" id="contract"> <label for="contract">Contractor</label>    
                                    </div>
                                </div>

                                <!-- Job Title -->
                                <div class="row form-group">
                                    <label class="col-sm-3 label-title">Title for your job<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="job_title" placeholder="ex, Human Resource Manager" required>
                                    </div>
                                </div>

                                <!-- Job Description -->
                                <div class="row form-group item-description">
                                    <label class="col-sm-3 label-title">Description<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <textarea class="form-control" name="job_description" placeholder="Write few lines about your job" rows="8" required></textarea>        
                                    </div>
                                </div>

                                <!-- Job Location -->
                                <div class="row form-group add-title location">
                                    <label class="col-sm-3 label-title">Location<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="dropdown category-dropdown pull-left">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Country</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">United States</a></li>
                                                <li><a href="#">United Kingdom</a></li>
                                                <li><a href="#">Germany</a></li>
                                                <li><a href="#">Australia</a></li>
                                                <li><a href="#">Brazil</a></li>
                                            </ul>                                
                                        </div>
                                        <div class="dropdown category-dropdown pull-right">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">State</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">California</a></li>
                                                <li><a href="#">New York</a></li>
                                                <li><a href="#">Texas</a></li>
                                            </ul>                                
                                        </div>
                                    </div>
                                </div>

                                <!-- Salary -->
                                <div class="row form-group select-price">
                                    <label class="col-sm-3 label-title">Salary<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <label>$USD</label>
                                        <input type="text" name="salary_min" class="form-control" placeholder="Min" required>
                                        <span>-</span>
                                        <input type="text" name="salary_max" class="form-control" placeholder="Max" required>
                                        <input type="radio" name="price" value="negotiable" id="negotiable">
                                        <label for="negotiable">Negotiable</label>
                                    </div>
                                </div>

                                <!-- Salary Type -->
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Salary Type<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="dropdown category-dropdown">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Per Hour</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">Per Hour</a></li>
                                                <li><a href="#">Daily</a></li>
                                                <li><a href="#">Monthly</a></li>
                                                <li><a href="#">Yearly</a></li>
                                            </ul>                                
                                        </div>
                                    </div>
                                </div>

                                <!-- Experience Level -->
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Experience<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <div class="dropdown category-dropdown">
                                            <a data-toggle="dropdown" href="#" aria-expanded="false"><span class="change-text">Mid Level</span> <i class="fa fa-angle-down pull-right"></i></a>
                                            <ul class="dropdown-menu category-change">
                                                <li><a href="#">Entry Level</a></li>
                                                <li><a href="#">Mid Level</a></li>
                                                <li><a href="#">Mid-Senior Level</a></li>
                                                <li><a href="#">Top Level</a></li>
                                            </ul>                                
                                        </div>
                                    </div>
                                </div>    

                                <!-- Agreement -->
                                <div class="checkbox section agreement">
                                    <label for="send">
                                        <input type="checkbox" name="send" id="send" required>
                                        You agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a> and acknowledge that you are the rightful owner of this item and using Jobs to find a genuine buyer.
                                    </label>
                                    <button type="submit" class="btn btn-primary">Post Your Job</button>
                                </div><!-- section -->
                            </div><!-- postdetails -->
                        </fieldset>
                    </form><!-- form -->    
                </div><!-- col-md-8 -->

                <!-- quick-rules -->	
                <div class="col-md-4">
                    <div class="section quick-rules">
                        <h4>Quick rules</h4>
                        <p class="lead">Posting an ad on <a href="<?= get_home_url(); ?>"><?php bloginfo('name'); ?></a> is free! However, all ads must follow our rules:</p>
                        <ul>
                            <li>Make sure you post in the correct category.</li>
                            <li>Do not post the same ad more than once or repost an ad within 48 hours.</li>
                            <li>Do not upload pictures with watermarks.</li>
                            <li>Do not post ads containing multiple items unless it's a package deal.</li>
                            <li>Do not put your email or phone numbers in the title or description.</li>
                        </ul>
                    </div><!-- quick-rules -->
                </div><!-- quick-rules -->
            </div><!-- row -->
        </div><!-- job-postdetails -->
    </div><!-- container -->
</section><!-- main -->

<?php get_footer(); ?>
