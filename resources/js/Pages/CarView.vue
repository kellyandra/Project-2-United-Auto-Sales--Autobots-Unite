<script setup>
import { ref, onMounted } from "vue";
import { defineProps } from "vue";

const props = defineProps({
  car_id: {
    type: String,
    required: true,
  },
  user_id: {
    type: String,
    required:true,
  },
});

const car = ref(null);
const isFavorite = ref(false); // Tracks whether the car is a favorite

function fetchCarDetails() {
  fetch(`/api/v1/cars/${props.car_id}`, {

    method: 'GET',
    headers: {
      'Content-Type': 'application/json'
    }

    })
    .then(response => {
      if (!response.ok) {
        throw new Error(`HTTP error! status: ${response.status}`);
      }
      return response.json();
    })
    .then(data => {
        
        console.log(data);
        car.value = data.car;
    })
    .catch(error => {
      console.error("There was an error fetching the car details:", error);
    });
}

// Fetch if the car is in the user's favorites initially
function checkFavoriteStatus() {
  fetch(`/api/v1/users/${props.user_id}/favorites`, {
    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + localStorage.getItem('token'),
    }
  })
  .then(response => response.json())
  .then(data => {
    isFavorite.value = data.favorites.some(favCar => favCar.id === props.car_id);
  })
  .catch(error => console.error('Failed to check favorite status:', error));
}

// Toggle favorite status
function toggleFavorite() {
  // Define the API endpoint
  const url = isFavorite.value
    ? `/api/v1/users/${props.user_id}/cars/${props.car_id}/unfavorite`  // API endpoint to unfavorite
    : `/api/v1/users/${props.user_id}/cars/${props.car_id}/favorite`;  // API endpoint to favorite

  // Decide the HTTP method based on current favorite status
  const method = isFavorite.value ? 'DELETE' : 'POST';

  fetch(url, {
    method: method,
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + localStorage.getItem('token'),
    }
  })
  .then(response => {
    if (!response.ok) {
      throw new Error('Failed to update favorite status');
    }
    return response.json();
  })
  .then(() => {
    isFavorite.value = !isFavorite.value;  // Toggle the local favorite state
    console.log('Favourite status after toggle:', isFavorite.value);
  })
  .catch(error => {
    console.error('Error toggling favorite status:', error);
  });
}

onMounted(() => {
  fetchCarDetails();
  checkFavoriteStatus();
});


</script>

<template>
  <head>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
</head>

  <div v-if="car" class="card mb-3 w-75 h-100 mx-auto" >
    <div class="row g-0">
      <div class="col-md-6">
        <img :src="car.photo" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-6">
        <div class="card-body">
        <h5 class="card-title"> {{ car.year }} {{ car.make }}</h5> 
        <h6 class="card-subtitle mb-2 text-body-secondary">{{ car.model }}</h6> 
      </div>
      <div class="card-body">
        <p class="card-text"> {{ car.description }} </p>
      </div>
      <div class="card-body grid gap-0">
        <div class="row">
          <div class="col-6">
              <span class="me-4 text-body-secondary">Color</span>{{ car.colour }}
          </div>

          <div class="col-6">
              <span class="me-4 text-body-secondary">Body type</span>  {{ car.car_type }}
          </div>
          <div class="col-6">
              <span class="me-4 text-body-secondary">Price</span>   ${{ car.price }}
          </div>
  
          <div class="col-6">
              <span class="me-4 text-body-secondary">Transmission</span>    {{ car.transmission }}</div>
          </div>
        </div>
        
        <div class="card-body row">
          <div class="col-6">
            <button type="submit" class=" text-white btn " style="background:#15ad87; margin-top: 20px;" disabled>Email Owner</button> 
            <!--#2cab3c previous green used -->
          </div>
          <div class="col-6 text-end">
            <button @click="toggleFavorite" class="border rounded-circle d-inline-flex justify-content-center align-items-center" style="padding: 3px; width: 35px; height: 35px; margin-top: 30px;">
              <i :class="isFavorite ? 'fa fa-heart' : 'fa fa-heart-o' " style="font-size:20px;color:red; margin-top: 5px; margin-right: -1px;"></i> 
            </button>
          </div>
          
        </div>
        
      
    </div>
  </div>
  </div>

  <div v-else>
    Loading
  </div>


</template>

<style>
.reg-btn {
        background-color: #02bd88;
        color: white;
    }
</style>