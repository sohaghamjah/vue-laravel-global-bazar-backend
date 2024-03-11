<script setup>
    const closeModal = () => {
        $('#modal_wrapper').modal('hide');
    }
</script>
<template>
        <!-- Modal -->
        <div class="modal fade" id="modal_wrapper">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" @click.prevent="closeModal" class="close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" @click.prevent="closeModal" class="btn btn-secondary">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
            </div>
        </div>
    </div>
</template>