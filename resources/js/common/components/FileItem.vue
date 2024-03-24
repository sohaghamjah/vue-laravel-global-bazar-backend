<script setup>
    const props = defineProps({
        data: {
            type: Object,
        }
    });

    const bytesForHuman = (bytes, decimals = 2) => {
        let units = ['B', 'KB', 'MB', 'GB', 'TB', 'PB']
        let i = 0;

        for (i; bytes > 1024; i++) {
            bytes /= 1024;
        }

        return parseFloat(bytes.toFixed(decimals)) + ' ' + units[i]
    }
    
</script>
<template>
<div class="dropzone__item dropzone--has-thumbnail dropzone--has-error dropzone__item--style">
    <div class="dropzone__item-thumbnail">
        <img :src="'/'+data.file_name">
    </div>
    <div class="dropzone__details dropzone__details--style">
        <div class="dropzone__file-size"><span><strong>{{ bytesForHuman(data.file_size) }}</strong></span></div>
        <div class="dropzone__filename"><span>{{ data.file_original_name }}</span></div>
    </div>
</div>
</template>