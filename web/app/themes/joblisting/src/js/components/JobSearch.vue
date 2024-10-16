<template>
    <div class="banner-form banner-form-full job-list-form">
        <form @submit.prevent="handleSearch">
            <!-- Static Category -->
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
            
            <!-- Static Location -->
            <div class="dropdown category-dropdown language-dropdown">
                <a data-toggle="dropdown" href="#"><span class="change-text">Job Location</span> <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu category-change language-change">
                    <li><a href="#">Location 1</a></li>
                    <li><a href="#">Location 2</a></li>
                    <li><a href="#">Location 3</a></li>
                </ul>								
            </div><!-- language-dropdown -->
        
            <!-- Input for search keyword -->
            <input v-model="keyword" type="text" class="form-control" placeholder="Type your keyword">
            <button type="submit" class="btn btn-primary" value="Search">Search</button>
        </form>
    </div><!-- banner-form -->
</template>

<script>
export default {
    data() {
        return {
            keyword: ''
        };
    },
    methods: {
        handleSearch() {
            // Emit only the search keyword
            this.$emit('search', {
                keyword: this.keyword
            });
        }
    }
};
</script>
