<template>
    <div class="banner-form banner-form-full job-list-form">
        <form action="#">
            <!-- category-change -->
            <div class="dropdown category-dropdown">						
                <a data-toggle="dropdown" href="#"><span class="change-text">Job Category</span> <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu category-change">
                    <li><a href="#">Customer Service</a></li>
                    <li><a href="#">Software Engineer</a></li>
                    <li><a href="#">Program Development</a></li>
                    <li><a href="#">Project Manager</a></li>
                    <li><a href="#">Graphics Designer</a></li>
                </ul>								
            </div><!-- category-change -->
            
            <!-- language-dropdown -->
            <div class="dropdown category-dropdown language-dropdown">
                <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu category-change language-change">
                    <li><a href="#">Location 1</a></li>
                    <li><a href="#">Location 2</a></li>
                    <li><a href="#">Location 3</a></li>
                </ul>								
            </div><!-- language-dropdown -->
        
            <input type="text" class="form-control" placeholder="Type your key word">
            <button type="submit" class="btn btn-primary" value="Search">Search</button>
        </form>
    </div><!-- banner-form -->
</template>