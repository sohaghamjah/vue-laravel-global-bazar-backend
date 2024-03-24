import { defineStore } from 'pinia';
import axiosInstance from '@/admin/services/axiosService';
import { useToken } from './token';

export const useFileManager = defineStore('file-manager', {
    state: () => ({
        files: [],
    }),
    getters:{
        getItems: (state) => {
            return state.files;
        }
    },
    actions:{
        async fileUpload(formData){
            try {
                await axiosInstance.post('/admin/file-manager/upload', formData);
            } catch (error) {
                if(error.response.data){
                    throw error.response.data.errors;
                }
            }
        },

        async getFiles(page){
            try {
                let response = await axiosInstance.get(`/admin/file-manager/index?page=${page}`);
                if(response.status == 200){
                    this.files = response.data;
                }
            } catch (error) {
                
            }
        },

        async fileRemove(id){
            try{
                let response = await axiosInstance.delete(`/admin/file-manager/delete/${id}`);
                if(response.status == 200){
                    this.getFiles(1);
                    return response.data;
                }
            }catch(error){
                throw error.response.data.errors;
            }
        }
    }
});