import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);
moment.locale('ru');


import { store } from './store';

import './directives';

// Layouts components
// TODO: Вот это не очень красиво, требуется code-splitting при расширении layouts
import UserDropdown from "./layouts/main/UserDropdown";

// Pages components
import PostCreatePage from "./post/create/PostCreatePage";
import PostPage from "./post/PostPage";
import FeedPage from "./feed/FeedPage";

import moment from "moment";

const vm = new Vue({
    el: '#app',
    store: new Vuex.Store(store),
    components: {
        UserDropdown,
        // Pages
        PostCreatePage,
        PostPage,
        FeedPage,
    }
})
