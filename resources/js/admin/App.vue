<script setup>
    import AdminLayout from './layouts/AdminLayout.vue';
    import AdminAuthLayout from './layouts/AdminAuthLayout.vue';

    const userLoggedIn = false;
</script>

<template>
    <AdminLayout v-if="userLoggedIn">
        <section class="content">
            <router-view></router-view>
        </section>
    </AdminLayout>

    <AdminAuthLayout v-if="!userLoggedIn">
        <router-view></router-view>
    </AdminAuthLayout>

</template>
