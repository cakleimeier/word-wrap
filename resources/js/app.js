require('./bootstrap');

import Vue from 'vue';
import Form from './components/WordWrapForm.vue';
import Output from './components/FormOutput.vue';

Vue.component(
	'word-wrap-form-component',
	require('./components/WordWrapForm.vue').default
);
Vue.component(
	'form-output-component',
	require('./components/FormOutput.vue').default
);

var app = new Vue({
	el: '#app'
});