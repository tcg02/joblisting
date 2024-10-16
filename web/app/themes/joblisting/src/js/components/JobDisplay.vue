<template>
    <div class="col-sm-8 col-md-9">				
        <div class="section job-list-item">
            <div class="featured-top">
                <h4>Showing x of y ads</h4>
                <div class="dropdown pull-right">
                    <div class="dropdown category-dropdown">
                        <h5>Sort by:</h5>						
                        <a data-toggle="dropdown" href="#"><span class="change-text">Most Relevant</span><i class="fa fa-caret-square-o-down"></i></a>
                        <ul class="dropdown-menu category-change">
                            <li><a href="#">Most Relevant</a></li>
                            <li><a href="#">Most Popular</a></li>
                        </ul>								
                    </div><!-- category-change -->		
                </div>							
            </div><!-- featured-top -->	

            <div v-for="job in job_posts" :key="job.id" class="job-ad-item">
                <div class="item-info">
                    <div class="ad-info">
                        <span><a :href="job.permalink" class="title">{{ job.title }}</a> @ <a href="#">{{ job.company }}</a></span>
                        <div class="ad-meta">
                            <ul>
                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ job.location }}</a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ job.employment_type }}</a></li>
                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>{{ job.salary }}</a></li>
                                <li><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i>{{ job.experience_level }}</a></li>
                            </ul>
                        </div><!-- ad-meta -->									
                    </div><!-- ad-info -->
                </div><!-- item-info -->
            </div><!-- job-ad-item -->				

            <!-- pagination  -->
            <div class="text-center">
                <ul class="pagination ">
                    <li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
                    <li><a href="#">1</a></li>
                    <li class="active"><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">5</a></li>
                    <li><a>...</a></li>
                    <li><a href="#">10</a></li>
                    <li><a href="#">20</a></li>
                    <li><a href="#">30</a></li>
                    <li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
                </ul>
            </div><!-- pagination  -->					
        </div>
    </div>
</template>

<script>
    export default {
        props: ['job_posts'],
    }
</script>