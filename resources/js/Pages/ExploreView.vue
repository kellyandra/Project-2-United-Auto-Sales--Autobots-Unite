<script setup>
  import { ref, onMounted } from "vue";
  let cars = ref([]);

  function fetchMovies() {
    fetch("/api/v1/cars", {
            method: 'GET',
            headers: {
                // 'Authorization': 'Bearer ' + localStorage.getItem('token'),
                'Content-Type': 'application/json'
            }
        })
        .then((response) => response.json())
        .then((data) => {
            // display a success message
            console.log(data);
            cars.value = data.cars;
        })
        .catch(function (error) {
            console.log(error);
        });
  }

  onMounted(() => fetchMovies())
</script>

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
  
      <div class="container mt-5">
        <div class="row" id="cars-container">
          <div v-for="car in cars" :key="car.id" class="col-md-6">
            <div class="col-md-4 mb-4">  
            <div class="card">
              <img :src="car.photo" class="card-img-top" alt="Car Image">
              <div class="card-body">
                <h5 class="card-title">{{ car.year}} {{ car.make }}</h5>
                <p class="card-text card-price">
                  <i class="fas fa-tag"></i> {{ car.price }} </p>
                <h5>{{ car.model }}</h5>
                </div>
              </div>
              <div class="card-footer">
                <a href="#" class="btn btn-primary">View more details</a>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div> 


  </template>
  
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