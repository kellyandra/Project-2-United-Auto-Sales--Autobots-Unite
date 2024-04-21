<script setup>
import { ref, onMounted } from "vue";

const props = defineProps({
  car_id: String
});

const car = ref(null);


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

onMounted(() => fetchCarDetails());

</script>

<template>
  <head>
    
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
            <button type="submit" class=" text-white reg-btn btn " style="background:#02bd88;" disabled>Email Owner</button>
          </div>
          <div class="col-6 text-end">
            <i class="fa-heartbeat "></i>
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