<script setup>
    import Header from './Header.vue';
    import Sidebar from './Sidebar.vue';
    import Breadcrumb from './Breadcrumb.vue';
</script>
<template>
    <Header />
    <Sidebar />

     <!-- Content Wrapper. Contains page content -->
     <div class="content-wrapper">
        <Breadcrumb />
        <!-- Main content -->
        <slot />
        <!-- /.content -->
    </div>

</template>
