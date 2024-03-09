<script setup>
  import VInput from '@/common/components/VInput.vue';
  import { reactive } from 'vue';
  import { Form } from 'vee-validate';
  import * as yup from "yup";
  import { useAuth, useNotification } from "@/admin/stores";
  import { useRouter } from 'vue-router';

  const schema = yup.object({
      email: yup.string().required().email(),
      password: yup.string().required().min(8),
  });

  const auth = useAuth();
  const router = useRouter();
  const notify = useNotification();

  const onSubmit = async (values, { setErrors, resetForm }) => {
      try {
        const res = await auth.login(values);
        if(res.user){
          notify.flashNotify('success', 'Congrats! You are logged In', "Success");
          router.push({name: 'admin.dashboard'});
        }
      } catch (error) {
        setErrors(error);
      }
  };
  
</script>
<template>
  <div class="card card-outline card-primary">
    <div class="card-header text-center">
      <a href="../../index2.html" class="h1">Admin Login</a>
    </div>
    <div class="card-body">
      <p class="login-box-msg">Sign in to start your session</p>

      <Form @submit="onSubmit" :validation-schema="schema" v-slot="{errors, isSubmitting}">
        <div class="input-group mb-3">
          <VInput placeholder="Email" type="email" name="email"></VInput>
        </div>
        <div class="input-group mb-3">
          <VInput placeholder="Password" type="password" name="password"></VInput>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="icheck-primary">
              <input type="checkbox" id="remember">
              <label for="remember" class="ml-2">
                Remember Me
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-12">
            <button type="submit" :disabled="isSubmitting" class="btn mt-2 btn-primary btn-block">
              Login In
              <span v-show="isSubmitting" class="spinner-border spinner-border-sm ms-1"></span>
            </button>
          </div>
          <!-- /.col -->
        </div>
      </Form>

    </div>
    <!-- /.card-body -->
  </div>
</template>

<style>
  .input-group>.custom-file, .input-group>.custom-select, .input-group>.form-control, .input-group>.form-control-plaintext {
      width: 100%;
  }
</style>