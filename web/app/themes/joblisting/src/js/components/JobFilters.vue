<template>
    <div class="col-md-3 col-sm-4">
        <div class="accordion">
            <!-- panel-group -->
            <div class="panel-group" id="accordion">
                
                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div  class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-one">
                                <h4>Categories<span class="pull-right"><i class="fa fa-minus"></i></span></h4>
                            </a>
                        </div>
                    </div><!-- panel-heading -->

                    <div id="accordion-one" class="panel-collapse collapse in">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <h5><a href="categories-main.html"><i class="fa fa-caret-down"></i> All Categories</a></h5>
                            <a href="#"><i class="icofont icofont-man-in-glasses"></i>Engineer/Architects</a>
                            <ul> 
                                <li v-for="(category, index) in categories.slice(0, 10)" :key="category.id" @click="applyFilter('category', category.slug)">
                                    <a href="#">{{ category.name }} <span>({{ category.count }})</span></a>
                                </li>
                            </ul>
                            <div class="see-more">
                                <button type="button" class="show-more one"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
                                <ul  class="more-category one"> 
                                    <li v-for="(category, index) in categories.slice(10)" :key="category.id" @click="applyFilter('category', category.slug)">
                                        <a href="#">{{ category.name }} <span>({{ category.count }})</span></a>
                                    </li>
                                </ul>
                            </div>

                        </div><!-- panel-body -->
                    </div>
                </div><!-- panel -->

                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div  class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-two">
                                <h4>Date Posted <span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                            </a>
                        </div>
                    </div><!-- panel-heading -->

                    <div id="accordion-two" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <ul>
                                <li @click="applyFilter('date_posted', 'today')">
                                    <input name="dateposted" type="radio" value="Today"> Today
                                </li>
                                <li @click="applyFilter('date_posted', '7days')">
                                    <input name="dateposted" type="radio" value="7 days"> 7 days
                                </li>
                                <li @click="applyFilter('date_posted', '30days')">
                                    <input name="dateposted" type="radio" value="30 days"> 30 days
                                </li>
                            </ul>
                        </div><!-- panel-body -->
                    </div>
                </div><!-- panel -->

                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-three">
                                <h4>
                                Salary Range
                                <span class="pull-right"><i class="fa fa-plus"></i></span>
                                </h4>
                            </a>
                        </div>
                    </div><!-- panel-heading -->

                    <div id="accordion-three" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <div class="price-range"><!--price-range-->
                                <div class="price">
                                    <span>$100 - <strong>$700</strong></span>
                                    <div class="dropdown category-dropdown pull-right">	
                                        <a data-toggle="dropdown" href="#"><span class="change-text">USD</span><i class="fa fa-caret-square-o-down"></i></a>
                                        <ul class="dropdown-menu category-change">
                                            <li><a href="#">USD</a></li>
                                            <li><a href="#">AUD</a></li>
                                            <li><a href="#">EUR</a></li>
                                            <li><a href="#">GBP</a></li>
                                            <li><a href="#">JPY</a></li>
                                        </ul>								
                                    </div><!-- category-change -->													
                                        <input type="text" id="price" ><br />
                                </div>
                            </div><!--/price-range-->
                        </div><!-- panel-body -->
                    </div>
                </div><!-- panel -->

                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-four">
                                <h4>Employment Type<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                            </a>
                        </div>
                    </div><!-- panel-heading -->

                    <div id="accordion-four" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <ul>
                                <li v-for="type in employmentTypes" :key="type" @click="toggleEmploymentType(type)">
                                    <input type="checkbox" :value="type" :checked="isCheckedEmployment(type)"> {{ type }}
                                </li>
                            </ul>
                        </div><!-- panel-body -->
                    </div>
                </div><!-- panel -->

                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-five">
                                <h4>Experience Level<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                            </a>
                        </div>
                    </div><!-- panel-heading -->

                    <div id="accordion-five" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <ul>
                                <li v-for="level in experienceLevels" :key="level" @click="toggleExperienceLevel(level)" >
                                    <label>
                                        <input type="checkbox" :value="level" :checked="isCheckedExperience(level)">{{ level }}
                                    </label>
                                </li>
                            </ul>
                        </div><!-- panel-body -->
                    </div>
                </div> <!-- panel -->

                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-title"></div>
                        <a data-toggle="collapse" data-parent="#accordion" href="#accordion-six">
                            <h4>Company<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                        </a>
                    </div><!-- panel-heading -->

                    <div id="accordion-six" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <input type="text" placeholder="Search Company" class="form-control">
                            <label for="apple"><input type="checkbox" name="apple" id="apple"> Apple</label>
                            <label for="dropbox"><input type="checkbox" name="dropbox" id="dropbox"> Dropbox</label>
                            <label for="micromax"><input type="checkbox" name="micromax" id="micromax"> Micromax</label>
                            <label for="nokia"><input type="checkbox" name="nokia" id="nokia"> Nokia</label>
                            <label for="microsoft"><input type="checkbox" name="microsoft" id="microsoft"> Microsoft</label>
                            <label for="samsung"><input type="checkbox" name="samsung" id="samsung"> Samsung</label>
                            <div class="see-more">
                                <button type="button" class="show-more two"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
                                <div class="more-category two">
                                    <label for="blackBerry"><input type="checkbox" name="blackBerry" id="blackBerry">BlackBerry</label>
                                    <label for="motorola"><input type="checkbox" name="motorola" id="motorola">Motorola</label>
                                    <label for="lenovo"><input type="checkbox" name="lenovo" id="lenovo">Lenovo</label>
                                </div>
                            </div>											
                        </div><!-- panel-body -->
                    </div>
                </div> <!-- panel -->

                <!-- panel -->
                <div class="panel panel-default panel-faq">
                    <!-- panel-heading -->
                    <div class="panel-heading">
                        <div class="panel-title">
                            <a data-toggle="collapse" data-parent="#accordion" href="#accordion-seven">
                                <h4>Location<span class="pull-right"><i class="fa fa-plus"></i></span></h4>
                            </a>
                        </div>
                    </div><!-- panel-heading -->

                    <div id="accordion-seven" class="panel-collapse collapse">
                        <!-- panel-body -->
                        <div class="panel-body">
                            <input type="text" placeholder="Search Location" class="form-control">
                            <label for="angeles"><input type="checkbox" name="angeles" id="angeles"> Los Angeles, CA</label>
                            <label for="kingdom"><input type="checkbox" name="kingdom" id="kingdom"> United Kingdom</label>
                            <label for="states"><input type="checkbox" name="states" id="states"> United States</label>
                            <label for="columbia"><input type="checkbox" name="columbia" id="columbia"> British Columbia</label>
                            <label for="australia"><input type="checkbox" name="australia" id="australia"> Australia</label>
                            <label for="germany"><input type="checkbox" name="germany" id="germany"> Germany</label>
                            <div class="see-more">
                                <button type="button" class="show-more three"><i class="fa fa-plus-square-o" aria-hidden="true"></i>See More</button>
                                <div class="more-category three">
                                    <label for="belgium"><input type="checkbox" name="belgium" id="belgium">Belgium</label>
                                    <label for="brazil"><input type="checkbox" name="brazil" id="brazil">Brazil</label>
                                    <label for="denmark"><input type="checkbox" name="denmark" id="denmark">Denmark</label>
                                    <label for="indonesia"><input type="checkbox" name="indonesia" id="indonesia">Indonesia</label>
                                </div>
                            </div>											
                        </div><!-- panel-body -->
                    </div>
                </div> <!-- panel -->

                </div><!-- panel-group -->
        </div>
    </div><!-- accordion-->
</template>

<script>
export default {
    data() {
        return {
            selectedFilters: {
                category: '',
                date_posted: '',
                employment_type: [],
                experience_level: [],
            },
            employmentTypes: ['Full Time', 'Part Time', 'Contractor', 'Intern', 'Seasonal / Temp'],
            experienceLevels: ['Training', 'Entry Level', 'Mid-Senior Level', 'Top Level'], 
            categories: [],
        };
    },
    created() {
        this.fetchCategories();
    },
    methods: {      
        fetchCategories() {
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
            const categoryMap = {};
            const organizedCategories = [];

            categories.forEach(category => {
                if (category.parent === 0) {
                    categoryMap[category.id] = { ...category, children: [] };
                    organizedCategories.push(categoryMap[category.id]);
                } else {
                    if (categoryMap[category.parent]) {
                        categoryMap[category.parent].children.push(category);
                    }
                }
            });

            return organizedCategories;
        },

        isCheckedEmployment(type) {
            return this.selectedFilters.employment_type.includes(type);
        },
        isCheckedExperience(level) {
            return this.selectedFilters.experience_level.includes(level);
        },

        toggleEmploymentType(type) {
            const index = this.selectedFilters.employment_type.indexOf(type);
            if (index === -1) {
               
                this.selectedFilters.employment_type.push(type);
            } else {
                
                this.selectedFilters.employment_type.splice(index, 1);
            }
             
            this.$emit('filter-changed', this.selectedFilters);
        },

        toggleExperienceLevel(level) {
            const index = this.selectedFilters.experience_level.indexOf(level);
            if (index === -1) {
               
                this.selectedFilters.experience_level.push(level);
            } else {
                 
                this.selectedFilters.experience_level.splice(index, 1);
            }
             
            this.$emit('filter-changed', this.selectedFilters);
        },

        
        applyFilter(filterType, filterValue) {            
            this.selectedFilters[filterType] = filterValue;            
            this.$emit('filter-changed', this.selectedFilters); 
        }
    }
};
</script>

