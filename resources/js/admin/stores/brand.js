import { defineStore } from 'pinia';
import axiosInstance from '@/admin/services/axiosService';
import { useToken } from './token';

export const useBrand = defineStore('brand', {
    state: () => ({
        brands: [],
    }),
    actions:{
        async getBrands(page, perPage, searchData){
            try {
                let response = await axiosInstance.get('/admin/brand/index', {
                    params:{
                        page,
                        perPage,
                        searchData
                    }
                });
                if(response.status == 200){
                    this.brands = response.data;
                }
            } catch (error) {
                
            }
        },
    }
});