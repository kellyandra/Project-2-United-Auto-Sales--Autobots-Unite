<script setup>
import UWIWordmark from '../../images/UWI-Wordmark.webp';
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
    
    <header class="text-center">
      <img class="img-fluid" :src="UWIWordmark" alt="UWI Wordmark" width="300" />
      <h1 class="display-5 fw-bold">Buy and Sell Cars Online</h1>
      <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">United Auto Sales provides the fastest, easiest and most user-friendly way to buy or sell cars online. Find a Great Price on the Vehicle You Want.</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
          <router-link to="/register" class="btn btn-primary btn-lg px-4 gap-3">Register</router-link>
          <router-link to="/login" class="btn btn-outline-secondary btn-lg px-4">Login</router-link>
        </div>
      </div>
    </header>
  </div>
</template>

<style scoped>
/* Additional custom styles if needed */
</style>
