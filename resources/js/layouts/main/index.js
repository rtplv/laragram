// Header
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import { store } from './store';

import './directives';

import UserDropdown from "./widgets/UserDropdown";

const vm = new Vue({
    el: '#mainLayoutVueApp',
    store: new Vuex.Store(store),
    components: {
        UserDropdown
    }
})
