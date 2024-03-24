<script setup>
    import { useFileManager } from '@/admin/stores';
    import { onMounted } from 'vue';
    import FileItem from '@/common/components/FileItem.vue';
    import { Bootstrap4Pagination } from 'laravel-vue-pagination';
    import { FileSkeleton } from '@/common/components/skeleton';


    const fileManager = useFileManager();
   
    onMounted(() => {
        getFiles();
    });

    const getFiles = async(page = 1) => {
        try {
            await fileManager.getFiles(page);
        } catch (error) {
            
        }
    } 
</script>
<template>
   <div class="card">
        <div class="card-header align-items-center d-flex">
            <h3 class="card-title">All Files</h3>
            <router-link :to="{name: 'admin.manage.files.create'}" class="btn btn-primary ml-auto">Upload New Files</router-link>
        </div>
        <div class="card-body">
            <template v-if="!fileManager.files.data">
               <FileSkeleton :dataAmount="24"/>
            </template>
            <FileItem v-else v-for="(file, index) in fileManager.files.data" :key="index" :data="file"/>
            <Bootstrap4Pagination
                :data="fileManager.files"
                @pagination-change-page="getFiles"
            />

        </div>
    </div>
</template>

<style>
    .pagination {
        justify-content: center;
        margin-top: 20px;
    }
</style>
