<script setup>
   import { 
        TableData, 
        TableRow 
    } from '@/common/components/table';
   const props = defineProps({
      dataAmount:{
         type: Number,
         required: true,
         default: 10,
      }
   })
</script>

<template>
   <TableRow v-for="(data, index) in dataAmount" :key="index">
      <TableData colspan="6">
            <div class="d-flex"> 
               <div class="ssc-square m-2 tag"></div>
               <div class="ssc-square m-2 tag"></div>
               <div class="ssc-square m-2 tag"></div>
               <div class="ssc-square m-2 tag"></div>
               <div class="ssc-square m-2 tag"></div>
            </div>
      </TableData>
   </TableRow>
</template>


<style scoped>
    .ssc-square.tag {
        height: 30px;
        margin-right: 12px;
        border-radius: 12px;
    }
</style>