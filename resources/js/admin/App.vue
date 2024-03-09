<script setup>
    import AdminLayout from './layouts/AdminLayout.vue';
    import AdminAuthLayout from './layouts/AdminAuthLayout.vue';
    import { useAuth } from '@/admin/stores';

    const auth = useAuth();
</script>

<template>
    <AdminLayout v-if="auth.getAuthStatus">
        <section class="content">
            <router-view></router-view>
        </section>
    </AdminLayout>

    <AdminAuthLayout v-if="!auth.getAuthStatus">
        <router-view></router-view>
    </AdminAuthLayout>

</template>
