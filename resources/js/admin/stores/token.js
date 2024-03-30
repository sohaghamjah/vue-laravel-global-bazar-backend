import { defineStore } from 'pinia';

export const useToken = defineStore('adminToken', {
    state: () => ({
        token: null,
    }),
    persist: {
        paths: ['token'],
    },
    getters:{
        getToken: (state) => {
            return state.token;
        }
    },
    actions:{
        // Set Admin Auth Token
        setToken(token){
            this.token = token;
        },

        // Remove admin auth token
        removeToken(token){
            this.$reset();
        }
    }
});