import { defineStore } from 'pinia';
import axiosInstance from '@/admin/services/axiosService';
import { useToken } from './token';

export const useFileManager = defineStore('file-manager', {
    state: () => ({
        files: {},
    }),
    actions:{
        async fileUpload(formData){
            const token = useToken();
            try {
                let response = await axiosInstance.post('/admin/file-manager/upload', formData);
                console.log(response);
                if (response.status === 200) {
                        
                }   
            } catch (error) {
                if(error.response.data){
                    throw error.response.data.errors;
                }
            }
        },
    }
});