<script setup>
    import { useFileManager } from '@/admin/stores';

    const fileManager = useFileManager();

    const sendToUpload = async (files, xhr, formData) => {
        try {
            const response = await fileManager.fileUpload(formData);
        } catch (error) {
            
        }
    }

</script>

<template>
     <div class="card">
        <div class="card-header align-items-center d-flex">
            <h3 class="card-title">Upload Files</h3>
            <router-link :to="{name: 'admin.manage.files'}" class="btn btn-primary ml-auto">All Files</router-link>
        </div>
        <div class="card-body">
            <DropZone 
                :maxFiles="10000000000"
                :uploadOnDrop="true"
                :multipleUpload="true"
                :parallelUpload="1"
                :acceptedFiles="['jpg','jpeg','png','webp','gif']"
                @sending="sendToUpload"
            />
        </div>
    </div>
</template>

<style>
    .dropzone__item--style {
        margin: 10px 5px !important;
        padding: 5px;
        border: 1px solid #a6a6a6;
        border-radius: 10px;
    }
    .dropzone__box {
        min-height: 150px !important;
        align-items: center !important;
    }
</style>
