<script setup>
    import { 
        Table, 
        TableHead, 
        TableData, 
        TableRow 
    } from '@/common/components/table';
    import { useBrand } from '@/admin/stores';
    import { onMounted } from 'vue';
    import { BrandIndexSkeleton } from '@/common/components/skeleton';

    const brand = useBrand();

    onMounted(() => {
        brand.getBrands();
    });


</script>
<template>
   <div class="card">
       <div class="card-header">
           <h3 class="card-title">DataTable with minimal features & hover style</h3>
       </div>
       <!-- /.card-header -->
       <div class="card-body">
            <div class="d-flex justify-content-between">
                <div class="form-group">
                    <select name="" class="form-control">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="25">50</option>
                        <option value="50">50</option>
                        <option value="75">75</option>
                        <option value="100">100</option>
                    </select>
                </div>
                <div>
                    <input type="text" placeholder="Search Here..." class="form-control">
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
                        <img :src="$filters.makeImagePath(brand.image)" alt="Image">
                    </TableData>
                    <TableData><span class="right badge" :class="brand.stringStatus.class">{{ brand.stringStatus.value }}</span></TableData>
                </TableRow>
            </Table>
       </div>
       <!-- /.card-body -->
   </div>
</template>