<template>
    <div class="col-sm-8 col-md-9">				
        <div class="section job-list-item">
            <div class="featured-top">
                <h4>Showing 1-25 of 65,712 ads</h4>
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

            <div class="job-ad-item">
                <div class="item-info">
                    <div class="item-image-box">
                        <div class="item-image">
                            <a href="job-details.html"><img src="<?= get_template_directory_uri(); ?>/dist/images/job/1.png" alt="Image" class="img-responsive"></a>
                        </div><!-- item-image -->
                    </div>

                    <div class="ad-info">
                        <span><a href="job-details.html" class="title">Project Manager</a> @ <a href="#">Dominos Pizza</a></span>
                        <div class="ad-meta">
                            <ul>
                                <li><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>San Francisco, CA, US </a></li>
                                <li><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>Full Time</a></li>
                                <li><a href="#"><i class="fa fa-money" aria-hidden="true"></i>$25,000 - $35,000</a></li>
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