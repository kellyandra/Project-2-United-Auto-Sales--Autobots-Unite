<template>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="container">
        <!-- Car icon and United Auto Car Sales -->
        <a class="navbar-brand d-flex align-items-center" href="#">
          <!-- Car Icon -->
          <i class="fas fa-car me-2"></i> United Auto Sales
        </a>
  
        <!-- Toggler button for mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
  
        <!-- Navigation links -->
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <!-- Register and Login links -->
            <li class="nav-item">
              <RouterLink class="nav-link" :class="{ active: $route.path === '/register'}" to="/register">Register</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink class="nav-link" :class="{ active: $route.path === '/login'}" to="/login">Login</RouterLink>
            </li>
  
            <!-- Add car, Explore, and My profile links (visible only when logged in) -->
            <li class="nav-item">
              <RouterLink class="nav-link" to="/cars/new">Add Car</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink class="nav-link" to="/explore">Explore</RouterLink>
            </li>
            <li class="nav-item">
              <RouterLink class="nav-link" to="/profile">My Profile</RouterLink>
            </li>
  
            <!-- Logout button (visible only when logged in) -->
            <li class="nav-item">
              <button class="btn btn-outline-light" @click="logout">Logout</button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </template>
  
  <script setup>
//   const isLoggedIn = false; // Set this to true when user is logged in
  
//   function logout() {
//     // Logic to logout the user
//   }
  </script>
  
  <style scoped>
  /* Add any custom styles here */
  </style>
  
  <!-- Include Font Awesome library -->
  <link href='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'>  