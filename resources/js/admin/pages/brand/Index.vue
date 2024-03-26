<script setup>
    import { 
        Table, 
        TableHead, 
        TableData, 
        TableRow 
    } from '@/common/components/table';
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
                        <TableHead>Browser</TableHead>
                        <TableHead>Browser</TableHead>
                        <TableHead>Browser</TableHead>
                    </TableRow>
                </template>
                <TableRow>
                    <TableData><input type="checkbox"></TableData>
                    <TableData>Explorer 4.0</TableData>
                    <TableData>Explorer 4.0</TableData>
                    <TableData>Explorer 4.0</TableData>
                </TableRow>
            </Table>
       </div>
       <!-- /.card-body -->
   </div>
</template>