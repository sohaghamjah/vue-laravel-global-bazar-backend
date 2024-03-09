<script setup>
    import VInput from '@/common/components/VInput.vue';
    import { reactive } from 'vue';
    import { Form } from 'vee-validate';
    import * as yup from "yup";

  const schema = yup.object({
      email: yup.string().required().email(),
      password: yup.string().required().min(8),
  });

  const onSubmit = async (values, { setErrors, resetForm }) => {
    console.log(values);
  };
  
</script>
<template>
    <!-- /.login-logo -->
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">Admin Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <Form @submit="onSubmit" :validation-schema="schema" v-slot="{errors, isSubmitting}">
        <div class="input-group mb-3">
          <VInput placeholder="Email" type="email" name="email"></VInput>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <VInput placeholder="Password" type="password" name="password"></VInput>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Sign In</button>
          </div>
          <!-- /.col -->
        </div>
      </Form>

    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</template>