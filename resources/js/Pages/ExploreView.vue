<template>
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">

</head>
    <div class="explore-view">
      <!-- Title -->
      <h1 class="title">Explore</h1>
  
      <!-- Search Bar -->
      <div class="search-bar">
        <div class="search-input">
          <label for="make">Make</label>
          <input type="text" id="make" placeholder="Enter make">
        </div>
        <div class="search-input">
          <label for="model">Model</label>
          <input type="text" id="model" placeholder="Enter model">
        </div>
        <button class="search-button">Search</button>
      </div>
  
      <!-- Car Listings -->
      <div class="car-listings">
        <!-- Car 1 -->
        <div class="car">
          <img src="car1.jpg" alt="Car 1">
          <div class="car-details">
            <div class="car-name">Car Name</div>
            <div class="car-brand">Car Brand</div>
            <div class="car-price">
              <i class="fas fa-tag"></i> $10000
            </div>
          </div>
          <button class="view-details-button">View Details</button>
        </div>
  
        <!-- Car 2 -->
        <div class="car">
          <img src="car2.jpg" alt="Car 2">
          <div class="car-details">
            <div class="car-name">Car Name</div>
            <div class="car-brand">Car Brand</div>
            <div class="car-price">
              <i class="fas fa-tag"></i> $15000
            </div>
          </div>
          <button class="view-details-button">View Details</button>
        </div>
  
        <!-- Car 3 -->
        <div class="car">
          <img src="car3.jpg" alt="Car 3">
          <div class="car-details">
            <div class="car-name">Car Name</div>
            <div class="car-brand">Car Brand</div>
            <div class="car-price">
              <i class="fas fa-tag"></i> $20000
            </div>
          </div>
          <button class="view-details-button">View Details</button>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    name: 'ExploreView'
  }
  </script>
  
  <style scoped>
  /* Title Style */
  .title {
    font-weight: bold;
  }
  
  /* Search Bar Styles */
  .search-bar {
    display: flex;
    align-items: center;
    margin-top: 20px;
  }
  
  .search-input {
    margin-right: 20px;
  }
  
  /* Car Listings Styles */
  .car-listings {
    display: flex;
    flex-wrap: wrap;
    margin-top: 20px;
  }
  
  .car {
    width: calc(33.33% - 20px); /* Adjust width for responsiveness */
    margin-right: 20px;
    margin-bottom: 20px;
    background-color: #f2f2f2;
    padding: 20px;
  }
  
  .car img {
    width: 100%;
  }
  
  .car-details {
    margin-top: 10px;
    display: flex;
    justify-content: space-between;
  }
  
  .car-name {
    font-weight: bold;
  }
  
  .car-price {
    background-color: #4caf50; /* Green */
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
  }
  
  .view-details-button {
    margin-top: 10px;
    background-color: #2196F3; /* Blue */
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
  }
  </style>  