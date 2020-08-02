import axios from 'axios';

export const checkAuth = async ({ commit }) => {
    const { data } = await axios.get('/auth/check');

    commit('setUserLoggedIn', data.loggedIn);

    return data;
}

export const getUser = async ({ commit }) => {
    const { data } = await axios.get('/auth/getUser');

    commit('setUser', data.user);

    return data;
}

export const logout = async () => {
    const { data } = await axios.get('/auth/logout');

    return data;
}
