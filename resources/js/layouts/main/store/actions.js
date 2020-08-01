import * as axios from 'axios';

export const getUser = async ({ commit }) => {
    const { data } = await axios.get('/auth/getUser');

    commit('setUser', data);

    return data;
}

export const logout = async () => {
    const { data } = await axios.get('/auth/logout');

    return data;
}
