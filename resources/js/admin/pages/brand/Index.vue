<script setup>
    import { 
        Table, 
        TableHead, 
        TableData, 
        TableRow 
    } from '@/common/components/table';
    import { useBrand } from '@/admin/stores';
    import { computed, onMounted, ref, watch } from 'vue';
    import { BrandIndexSkeleton } from '@/common/components/skeleton';
    import { Bootstrap4Pagination } from 'laravel-vue-pagination';
    import { debounce } from 'lodash';

    // Per page brand get

    const perPage = ref(25);

    // Search Brand
    const searchData = ref('');
    const debounceSearch = computed(() => debounce(getBrands, 500));

    // Get Brands

    const brand = useBrand();

    onMounted(() => {
        getBrands();
    });

    const getBrands = async(page = 1) => {
        try {
            await brand.getBrands(page, perPage.value, searchData.value);
        } catch (error) {
            
        }
    } 


</script>
<template>
   <div class="card">
       <div class="card-header">
           <h3 class="card-title">Brand List</h3>
       </div>
       <!-- /.card-header -->
       <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <select class="form-control" v-model="perPage" @change="getBrands">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    <input type="text" placeholder="Search Here..." v-model="searchData" @input="debounceSearch" lass="form-control">
                </div>
            </div>
            <Table> 
                <template #tableHead>
                    <TableRow>
                        <TableHead><input type="checkbox"></TableHead>
                        <TableHead>Name</TableHead>
                        <TableHead>Image</TableHead>
                        <TableHead>Status</TableHead>
                        <TableHead>Action</TableHead>
                    </TableRow>
                </template>

                <BrandIndexSkeleton v-if="!brand.brands?.data" :dataAmount="5"></BrandIndexSkeleton>
                
                <TableRow v-else v-for="(brand,index) in brand.brands?.data" :key="index">
                    <TableData><input type="checkbox"></TableData>
                    <TableData>{{ brand.name }}</TableData>
                    <TableData>
                        <img width="100" :src="$filters.makeImagePath(brand.image)" alt="Image">
                    </TableData>
                    <TableData><span class="right badge" :class="brand.stringStatus.class">{{ brand.stringStatus.value }}</span></TableData>
                    <TableData>
                        <button class="btn btn-sm btn-primary">Edit</button>
                        <button class="btn btn-sm ml-1 btn-danger">Delete</button>
                    </TableData>
                </TableRow>
            </Table>
            <Bootstrap4Pagination
                :data="brand.brands"
                @pagination-change-page="getBrands"
            />
       </div>
       <!-- /.card-body -->
   </div>
</template>