<script setup>
     import { Field } from 'vee-validate';
      defineProps(['modelValue', 'name']);
      defineEmits(['update:modelValue']);
</script>
<template>
      <Field :name="name" v-slot="{field ,meta}">
            <input class="form-control" 
            :value="modelValue"
            :class="{
                  'is-valid' : meta.valid && meta.touched,
                  'is-invalid': !meta.valid && meta.touched
                  }"
            @input="$emit('update:modelValue', $event.target.value)"
            v-bind="{ ...$attrs, ...field }"
            >    
      </Field>
</template>