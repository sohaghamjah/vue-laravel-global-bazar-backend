<script setup>
    const props = defineProps({
        data: {
            type: Object,
        }
    })
</script>
<template>
<div class="dropzone__item dropzone--has-thumbnail dropzone--has-error dropzone__item--style">
    <div class="dropzone__item-thumbnail">
        <img :src="'/'+data.file_name">
    </div>
    <div class="dropzone__details dropzone__details--style">
        <div class="dropzone__file-size"><span><strong>{{ data.file_size }}</strong></span></div>
        <div class="dropzone__filename"><span>{{ data.file_original_name }}</span></div>
    </div>
</div>
</template>