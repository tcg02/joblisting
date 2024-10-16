<template>
    <section class="job-listing">
        <job-search @search="search"></job-search>

        <div class="category-info">    
            <div class="row">
                <job-filters></job-filters>

                <job-display :job_posts="jobPosts"></job-display>
            </div>    
        </div>
    </section>
</template>

<script>
    export default {
        props: ['job_posts'],
        data() {
            return {
                jobPosts: []
            }
        },
        created() {
            this.jobPosts = this.deepClone(this.job_posts); // so we arent mutating a prop directly
        },
        methods: {
            search(filters) {
                $.ajax({
                    url: localized.resturl + '/jobpost/job-posts',
                    method: 'GET',
                    beforeSend: function(xhr){
                        xhr.setRequestHeader('X-WP-Nonce', localized.restnonce);
                    },
                    dataType: 'json',
                    data: { search: filters },
                    success: (result) => {
                        if (result.success) {
                            this.jobPosts = result.data;
                        } else {
                            alert(result.message);
                        }
                    },
                    error: function(result) {
                        alert('error fetching job posts');
                    },
                });
            },
            deepClone(obj) {
                if (obj === null || typeof obj !== 'object') {
                    return obj;
                }

                if (obj instanceof Date) {
                    return new Date(obj.getTime());
                }

                if (Array.isArray(obj)) {
                    return obj.map(item => this.deepClone(item));
                }

                const clonedObj = {};
                for (let key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        clonedObj[key] = this.deepClone(obj[key]);
                    }
                }

                return clonedObj;
            }
        }
    }
</script>
