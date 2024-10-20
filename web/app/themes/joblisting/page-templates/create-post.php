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
                <form id="create-job-form" action="<?= esc_url( admin_url('admin-post.php') ); ?>" method="POST">
                <?php wp_nonce_field('create_job_post_action', 'create_job_post_nonce'); ?>
                <input type="hidden" name="action" value="create_job_post">
                        <fieldset>
                            <div class="section postdetails">
                                <h4>Post Your Job<span class="pull-right">* Mandatory Fields</span></h4>
                                <!-- Error message container -->
                                <div id="error-message" class="alert alert-danger" style="display: none;"></div>
                                
                                <!-- Job Category -->
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Job Category</label>
                                    <div class="col-sm-9">
                                        <select name="job_category" class="form-control" required>
                                            <option value="">Select a category</option>
                                            <option value="Software Engineer">Software Engineer</option>
                                            <option value="Program Development">Program Development</option>
                                            <option value="Project Manager">Project Manager</option>
                                            <option value="Graphics Designer">Graphics Designer</option>
                                        </select>
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
                                        <!-- Country Dropdown -->
                                        <div class="col-sm-6">
                                            <select name="country" class="form-control" required>
                                                <option value="">Select a country</option>
                                                <option value="United States">United States</option>
                                                <option value="United Kingdom">United Kingdom</option>
                                                <option value="Germany">Germany</option>
                                                <option value="Australia">Australia</option>
                                                <option value="Brazil">Brazil</option>
                                            </select>
                                        </div>
                                        <!-- State Dropdown -->
                                        <div class="col-sm-6">
                                            <select name="state" class="form-control" required>
                                                <option value="">Select a state</option>
                                                <option value="California">California</option>
                                                <option value="New York">New York</option>
                                                <option value="Texas">Texas</option>
                                            </select>
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
                                        <select name="salary_type" class="form-control" required>
                                            <option value="Per Hour">Per Hour</option>
                                            <option value="Daily">Daily</option>
                                            <option value="Monthly">Monthly</option>
                                            <option value="Yearly">Yearly</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Experience Level -->
                                <div class="row form-group add-title">
                                    <label class="col-sm-3 label-title">Experience<span class="required">*</span></label>
                                    <div class="col-sm-9">
                                        <select name="experience_level" class="form-control" required>
                                            <option value="">Select experience level</option>
                                            <option value="Entry Level">Entry Level</option>
                                            <option value="Mid Level">Mid Level</option>
                                            <option value="Mid-Senior Level">Mid-Senior Level</option>
                                            <option value="Top Level">Top Level</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Agreement -->
                                <div class="checkbox section agreement">
                                    <label for="agreement">
                                        <input type="checkbox" name="agreement" id="agreement" >
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
<script>
document.addEventListener('DOMContentLoaded', function () {
    const form = document.getElementById('create-job-form');
    const errorMessage = document.getElementById('error-message');

    form.addEventListener('submit', function (event) {
        
        errorMessage.style.display = 'none';
        errorMessage.innerHTML = '';
 
        const jobCategory = form['job_category'].value;
        const employmentType = form.querySelector('input[name="employment_type"]:checked');
        const jobTitle = form['job_title'].value;
        const jobDescription = form['job_description'].value;
        const country = form['country'].value;
        const state = form['state'].value;
        const salaryMin = form['salary_min'].value;
        const salaryMax = form['salary_max'].value;
        const salaryType = form['salary_type'].value;
        const experienceLevel = form['experience_level'].value;
        const agreement = document.getElementById('agreement');

        let errors = [];
 
        if (!jobCategory) {
            errors.push("Please select a job category.");
        }
        if (!employmentType) {
            errors.push("Please select a job type.");
        }
        if (!jobTitle) {
            errors.push("Please enter a job title.");
        }
        if (!jobDescription) {
            errors.push("Please enter a job description.");
        }
        if (!country) {
            errors.push("Please select a country.");
        }
        if (!state) {
            errors.push("Please select a state.");
        }
        if (!salaryMin || !salaryMax) {
            errors.push("Please enter a valid salary range.");
        }
        if (!salaryType) {
            errors.push("Please select a salary type.");
        }
        if (!experienceLevel) {
            errors.push("Please select an experience level.");
        }
        if (!agreement.checked) {            
            errors.push('You must agree to the Terms of Use and Privacy Policy.');
        }
 
        if (errors.length > 0) {
            event.preventDefault();  // Prevent form submission
            errorMessage.style.display = 'block';
            errorMessage.innerHTML = errors.join('<br>'); // Show error messages
        }
    });
});

</script>


<?php get_footer(); ?>
