<script setup>

    import ModalBasic from '@/common/components/modal/basic.vue'

    const openModal = () => {
        $('#modal_wrapper').modal('show');
    }

</script>
<template>
    <div>
        <!-- Button trigger modal -->
        <button type="button" @click.prevent="openModal" class="btn btn-primary">
            Launch demo modal
        </button>

        <ModalBasic />
    </div>
</template>