import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import { store } from './store';

import './directives';

// Layouts components
// TODO: Вот это не очень красиво, требуется code-splitting при расширении layouts
import UserDropdown from "./layouts/main/UserDropdown";

// Pages components
import PostCreatePage from "./post/create/PostCreatePage";
import PostPage from "./post/PostPage";

const vm = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    components: {
        UserDropdown,
        // Pages
        PostCreatePage,
        PostPage
    }
})
