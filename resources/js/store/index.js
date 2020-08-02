import Vuex from 'vuex'
import { state } from './state';
import * as mutations from './mutations';
import * as actions from './actions';

export const store = {
    state,
    actions,
    mutations,
}
