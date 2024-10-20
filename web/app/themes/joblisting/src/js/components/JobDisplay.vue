<template>
    <div class="col-sm-8 col-md-9">				
        <div class="section job-list-item">
            <div class="featured-top">
                <h4>Showing  {{ startJobIndex }} to {{ endJobIndex }} of {{ totalJobs }} ads</h4>
                <div class="dropdown pull-right">
                    <div class="dropdown category-dropdown sortjob-dropdown">
                        <h5>Sort by:</h5>
                        <div class="select-container ">
                            <select v-model="selectedSort" @change="updateSort(selectedSort)">
                                <option value="Most Relevant">Most Relevant</option>
                                <option value="Most Popular">Most Popular</option>
                            </select>
                            <i class="fa fa-caret-square-o-down"></i>
                        </div>
                    </div>
<!-- category-change -->		
                </div>							
            </div><!-- featured-top -->	

            <div v-for="job in job_posts" :key="job.id" class="job-ad-item">
                <div class="item-info">
                    <div class="ad-info">
                        <span>
                            <a :href="job.permalink" class="title">{{ job.title }}</a>
                            <a v-if="job.company" href="#"> @ {{ job.company }}</a>
                        </span>
                        <div class="ad-meta">
                            <ul>
                                <li v-if="job.location"><a href="#"><i class="fa fa-map-marker" aria-hidden="true"></i>{{ job.location }}</a></li>
                                <li v-if="job.employment_type"><a href="#"><i class="fa fa-clock-o" aria-hidden="true"></i>{{ job.employment_type }}</a></li>
                                <li v-if="job.salary"><a href="#"><i class="fa fa-money" aria-hidden="true"></i> {{ formatSalary(job.salary) }}</a></li>
                                <li v-if="job.experience_level" ><a href="#"><i class="fa fa-briefcase" aria-hidden="true"></i>{{ job.experience_level }}</a></li>
                            </ul>
                        </div><!-- ad-meta -->									
                    </div><!-- ad-info -->
                </div><!-- item-info -->
            </div><!-- job-ad-item -->				

            <!-- Pagination -->
            <div class="text-center">
                <ul class="pagination">
                    <li :class="{ disabled: currentPage === 1 }">
                        <a @click.prevent="changePage(currentPage - 1)" href="#"><i class="fa fa-chevron-left"></i></a>
                    </li>
                    <li v-for="page in totalPages" :key="page" :class="{ active: currentPage === page }">
                        <a @click.prevent="changePage(page)" href="#">{{ page }}</a>
                    </li>
                    <li :class="{ disabled: currentPage === totalPages }">
                        <a @click.prevent="changePage(currentPage + 1)" href="#"><i class="fa fa-chevron-right"></i></a>
                    </li>
                </ul>
            </div><!-- pagination -->				
        </div>
    </div>
</template>

<script>
    export default {
        props: ['job_posts', 'total_pages', 'current_page', 'total_jobs', 'posts_per_page'],
        data(){
            return{
                selectedSort: 'Most Relevant',
            }
        },
        computed: {
            startJobIndex() {
                return (this.current_page - 1) * this.posts_per_page + 1;
            },
            endJobIndex() {
                return Math.min(this.current_page * this.posts_per_page, this.total_jobs);
            },
            totalPages() {
                return this.total_pages; 
            },
            currentPage() {
                return this.current_page;  
            },
            totalJobs() {
                return this.total_jobs;  
            } 
        },
        methods: {
            changePage(page) {
                if (page > 0 && page <= this.totalPages) {
                    this.$emit('page-changed', page); // Emit event to parent to change page
                }
            },
            updateSort(sortText){                
                this.selectedSort = sortText;
                let sortOption = (sortText == 'Most Relevant') ? 'relevant' : 'popular';      
                //console.log('Sort option selected:', sortOption);          
                this.$emit('sort-changed', sortOption);
            },
            formatSalary(salary) {
                const formattedSalary = new Intl.NumberFormat('en-US', {
                    style: 'currency',
                    currency: 'USD', // You can change this to any currency like 'EUR', 'GBP', etc.
                    minimumFractionDigits: 0
                }).format(salary);
                return formattedSalary;
            }
        }
    }
</script>