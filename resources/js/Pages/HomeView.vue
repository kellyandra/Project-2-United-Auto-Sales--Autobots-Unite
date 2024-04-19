


<template>
    <div class="home">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
          <router-link class="navbar-brand" to="/">United Auto Sales</router-link>
          <div class="collapse navbar-collapse">
            <div class="navbar-nav ms-auto">
              <router-link to="/register" class="nav-link">Register</router-link>
              <router-link to="/login" class="nav-link">Login</router-link>
            </div>
          </div>
        </div>
      </nav>
      <header class="hero vh-100 d-flex align-items-center justify-content-center text-center text-white" style="background-image: url('path-to-your-car-image.jpg'); background-size: cover; background-position: center;">
        <div class="container">
          <h1 class="display-3 fw-bold">Buy and Sell Cars Online</h1>
          <p class="lead px-3">United Auto Sales provides the fastest, easiest and most user-friendly way to buy or sell cars online. Find a Great Price on the Vehicle You Want.</p>
          <div class="mt-4">
            <router-link to="/register" class="btn btn-primary btn-lg me-3">Register</router-link>
            <router-link to="/login" class="btn btn-secondary btn-lg">Login</router-link>
          </div>
        </div>
      </header>
    </div>
  </template>
  
  <script>
  export default {
    name: 'HomePage',
    // Component logic...
  };
  </script>
  
  <style scoped>
  /* Additional custom styles if needed */
  </style>
  