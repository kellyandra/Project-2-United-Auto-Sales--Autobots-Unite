<script setup>
import McLaren from '../../images/McLaren.jpg';
</script>

<template>
  <div class="container py-5">
   
    
    <div class="row align-items-center">
      <div class="col-md-6 text-start">
        <h1 class="display-5 fw-bold">Buy and Sell Cars Online</h1>
        <p class="lead mb-4">United Auto Sales provides the fastest, easiest and most user-friendly way to buy or sell cars online. Find a Great Price on the Vehicle You Want.</p>
        <div class="d-grid gap-2 d-md-flex justify-content-md-start">
          <router-link to="/register" class="btn btn-primary btn-lg px-4 me-md-2">Register</router-link>
          <router-link to="/login" class="btn btn-outline-secondary btn-lg px-4">Login</router-link>
        </div>
      </div>
      <div class="col-md-6">
        <img class="img-fluid" :src="McLaren" alt="McLaren" />
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>
