<script setup>
   const props = defineProps({
      dataAmount:{
         type: Number,
         required: true,
         default: 24,
      }
   })
</script>

<template>
   <div class="dropzone__item dropzone--has-thumbnail dropzone--has-error dropzone__item--style" v-for="(data, index) in dataAmount" :key="index">
      <div class="dropzone__item-thumbnail">
         <div class="ssc-square"></div>
      </div>
   </div>
</template>


<style scoped>
   .dropzone__item--style {
      border: unset;
   }
</style>