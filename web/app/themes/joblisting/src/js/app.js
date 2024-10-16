import { createApp } from 'vue';

window.jQuery = window.$ = require('jquery');
require('bootstrap');

require('./main.js');
require('./price-range.js');

// Vue components
import JobListing from './components/JobListing.vue';
import JobSearch from './components/JobSearch.vue';
import JobFilters from './components/JobFilters.vue';
import JobDisplay from './components/JobDisplay.vue';

// register & mount components
const app = createApp({});
app.component('job-listing', JobListing);

app.component('job-search', JobSearch);
app.component('job-filters', JobFilters);
app.component('job-display', JobDisplay);

// mount
if( $('#app').length )
    app.mount("#app");