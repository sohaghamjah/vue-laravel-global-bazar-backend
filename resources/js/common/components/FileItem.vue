<script setup>

    import { useFileManager, useNotification } from '@/admin/stores';

    const props = defineProps({
        data: {
            type: Object,
        }
    });


    // Bytes to human readable unit

    const bytesForHuman = (bytes, decimals = 2) => {
        let units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB']
        let i = 0;

        for (i; bytes > 1024; i++) {
            bytes /= 1024;
        }

        return parseFloat(bytes.toFixed(decimals)) + ' ' + units[i]
    }

    // File Remove 
    const fileManager = useFileManager();
    const notify = useNotification();

    const fileRemove = async (id) => {
        try {
            let response = await fileManager.fileRemove(id);
            if(response.status){
                notify.flashNotify('success', 'File Deleted Successful!', "Success");
            }
        } catch (error) {
            
        }
    }
    
</script>
<template>
<div class="dropzone__item dropzone--has-thumbnail dropzone--has-error dropzone__item--style">
    <div class="dropzone__item-thumbnail">
        <img :src="'/'+data.file_name">
    </div>
    <div class="dropzone__item-controls">
        <div class="dropzone__item-control" @click="fileRemove(data?.id)">
            <i class="fas fa-trash-alt text-danger"></i>
        </div>
    </div>
    <div class="dropzone__details dropzone__details--style">
        <div class="dropzone__file-size"><span><strong>{{ bytesForHuman(data.file_size) }}</strong></span></div>
        <div class="dropzone__filename"><span>{{ data.file_original_name }}</span></div>
    </div>
</div>
</template>