import { defineStore } from 'pinia';
import axiosInstance from '@/admin/services/axiosService';
import { useToken } from './token';

export const useBrand = defineStore('brand', {
    state: () => ({
        brands: [],
    }),
    actions:{
        async getBrands(){
            try {
                let response = await axiosInstance.get(`/admin/brand/index`);
                if(response.status == 200){
                    this.brands = response.data;
                }
            } catch (error) {
                
            }
        },
    }
});