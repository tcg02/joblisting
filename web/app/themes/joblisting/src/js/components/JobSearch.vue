<template>
    <div class="banner-form banner-form-full job-list-form">
        <form @submit.prevent="handleSearch">
            <!-- Dynamic Category -->
            <div class="dropdown category-dropdown">						
                <a data-toggle="dropdown" href="#"><span class="change-text">{{ selectedCategory || 'Job Category' }}</span> <i class="fa fa-angle-down"></i></a>
                <input type="hidden" name="selected_search_category" :value="selectedCategory">
                <ul class="dropdown-menu category-change">
                    <li v-for="category in categories" :key="category.id" @click="selectCategory(category)">
                        <a href="#">{{ category.name }}</a>
                    </li>
                </ul>								
            </div><!-- category-change -->
            
            <!-- Static Location -->
            <div class="dropdown category-dropdown language-dropdown">
                <a data-toggle="dropdown" href="#"><span class="change-text">{{ selectedLocation || 'Job Location' }}</span> <i class="fa fa-angle-down"></i></a>
                <ul class="dropdown-menu category-change language-change">
                    <li v-for="location in locations" :key="location" @click="selectLocation(location)">
                        <a href="#">{{ location }}</a>
                    </li>
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
            keyword: '',
            categories: [],
            selectedCategory: '',
            selectedLocation: '',
            locations : [
                'Los Angeles, CA',
                'United Kingdom',
                'United States',
                'British Columbia',
                'Australia',
                'Germany',
                'Belgium',
                'Brazil',
                'Denmark',
                'Indonesia'
            ]

        };
    },
    created() {
        this.fetchCategories();  // Fetch categories dynamically
    },
    methods: {
        fetchCategories() {
            // Fetch categories from the WordPress REST API
            $.ajax({
                url: localized.resturl + '../../../wp/v2/categories?per_page=100&orderby=count&order=desc',   
                method: 'GET',
                success: (result) => {
                    this.categories = this.organizeCategories(result);
                },
                error: function() {
                    alert('Error fetching categories');
                }
            });
        },
        organizeCategories(categories) {
            // Organize categories for parent-child relationships if needed
            return categories; // Simply return categories, can enhance if nested categories are used
        },
        selectCategory(category) {
            this.selectedCategory = category.name; // Set the selected category name
        },
        selectLocation(location) {
            this.selectedLocation = location; // Set the selected location
        },
        handleSearch() {
            // Emit the search keyword, selected category, and selected location

            console.log({
                keyword: this.keyword,
                category: this.selectedCategory,
                location: this.selectedLocation
            })
             
            this.$emit('filter-changed', {
                keyword: this.keyword,
                category: this.selectedCategory,
                location: this.selectedLocation
            });
        }
    }
};
</script>
