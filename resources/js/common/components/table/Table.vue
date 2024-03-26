<script setup>

</script>
<template>
   <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead>
                <slot name="tableHead" />
            </thead>
            <tbody>
                <slot />
            </tbody>
        </table>
   </div>

    <!-- <Table>
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
    </Table> -->
</template>