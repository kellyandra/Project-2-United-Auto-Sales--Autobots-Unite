<script setup>
import McLaren from '../../images/McLaren.jpg';
</script>

<template>
  <div class="container py-5">
    <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
      <div class="container">
        <router-link class="navbar-brand" to="/">United Auto Sales</router-link>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ms-auto">
            <router-link to="/register" class="nav-link">Register</router-link>
            <router-link to="/login" class="nav-link">Login</router-link>
          </div>
        </div>
      </div>
    </nav>
    
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
/* Custom styles, if needed */
</style>
