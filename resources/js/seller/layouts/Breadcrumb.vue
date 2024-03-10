<script setup>
    import { useRoute } from 'vue-router';
    const route = useRoute();
</script>
<template>
     <!-- Content Header (Page header) -->
     <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">
                        {{ route.meta.title ?? "Not Found" }}
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item active">{{ route.meta.title ?? "Not Found" }}</li>
                    </ol>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
</template>