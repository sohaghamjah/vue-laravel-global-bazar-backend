<script setup>
    import SellerLayout from './layouts/SellerLayout.vue';
    import SellerAuthLayout from './layouts/SellerAuthLayout.vue';
    import { useAuth } from '@/seller/stores';

    const auth = useAuth();
</script>

<template>
    <SellerLayout v-if="auth.getAuthStatus">
        <section class="content">
            <router-view></router-view>
        </section>
    </SellerLayout>

    <SellerAuthLayout v-if="!auth.getAuthStatus">
        <router-view></router-view>
    </SellerAuthLayout>

</template>
