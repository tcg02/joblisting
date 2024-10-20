<template>
    <section class="job-listing">
        <job-search @filter-changed="applyFilters" ></job-search>

        <div class="category-info">    
            <div class="row">
                <job-filters @filter-changed="applyFilters" ></job-filters>
                <job-display 
                    :job_posts="paginatedJobs" 
                    :total_pages="totalPages" 
                    :current_page="currentPage" 
                    :total_jobs="jobPosts.length" 
                    :posts_per_page="postsPerPage" 
                    :sort_by="filters.sort_by" 
                    @sort-changed="handleSortChanged"
                    @page-changed="changePage"                    
                    
                ></job-display>
            </div>    
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            jobPosts: [],
            currentPage: 1,
            postsPerPage: 10,
            sort_by: 'relevant',
            filters:{
                category: '',
                location: '',
                date_posted:'',                
                employment_type: [],                
            }
        };
    },
    created() {
        this.fetchJobPosts();  
    },
    computed: {
        totalPages(){
            return Math.ceil(this.jobPosts.length / this.postsPerPage);
        },
        paginatedJobs(){
            const start = (this.currentPage - 1) * this.postsPerPage;
            const end   = start + this.postsPerPage;
            return this.jobPosts.slice(start, end);
        }
    },
    methods: {
        fetchJobPosts() {
            console.log('Fetching job posts with filters:', this.filters);
            $.ajax({
                url: localized.resturl + '/jobpost/job-posts',   
                method: 'GET',
                data:{filters: this.filters},
                beforeSend: function(xhr){
                    xhr.setRequestHeader('X-WP-Nonce', localized.restnonce);   
                },
                dataType: 'json',
                success: (result) => {
                    if (result.success) {
                        this.jobPosts = result.data;   
                        this.current_page = 1;
                    } else {
                        alert(result.message);
                    }
                },
                error: function() {
                    alert('Error fetching job posts');
                }
            });
        },
        applyFilters(newFilters){
            this.filters =  newFilters;
            this.fetchJobPosts();
        },
        changePage(page){
            this.currentPage = page;
        },
        handleSortChanged(sortOption) { 
            this.filters.sort_by = sortOption;            
            if (sortOption === 'popular') {
                this.jobPosts.sort((a, b) => (b.views || 0) - (a.views || 0));
            } else {                 
                this.jobPosts.sort((a, b) => (b.published_date || 0) - (a.published_date || 0));
            }
        }
         
    }
};
</script>
