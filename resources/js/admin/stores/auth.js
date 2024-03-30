import { defineStore } from 'pinia';
import axiosInstance from '@/admin/services/axiosService';
import { useToken } from './token';

export const useAuth = defineStore('adminAuth', {
    state: () => ({
        user: {},
        loading: false,
        userLoggedIn: false,
    }),
    persist: {
        paths: ['user','userLoggedIn'],
    },
    getters:{
        getUser: (state) => {
            return state.user;
        },
        getAuthStatus: (state) => {
            return state.userLoggedIn;
        }
    },
    actions:{
        async login(formData){
            const token = useToken();
            try {
                let response = await axiosInstance.post('/admin/login', formData);
                if (response.status === 200) {
                    let data = response.data?.data;
                    this.user = data?.user;
                    token.setToken(data?.token);
                    this.userLoggedIn = true;

                    return data;
                }
            } catch (error) {
                if(error.response.data){
                    throw error.response.data.errors;
                }
            }
        },
        async logout(){
            this.loading = true;
             try {
                let response = await axiosInstance.post("/admin/logout");
                if (response.status === 200) {
                    this.removeToken();
                    return response;
                }
            } catch (error) {
                if(error.response){
                    throw error.response
                }
            }finally{
                this.loading = false;
            }
        },

        removeToken(){
            const token = useToken();
            token.removeToken();
            this.$reset();
        }
    }
});