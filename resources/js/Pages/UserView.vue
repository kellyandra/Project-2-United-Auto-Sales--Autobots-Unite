<script setup>

import  { ref, onMounted, computed } from 'vue';

const props = defineProps({
  user_id: String,
});

const cars = ref([]);

function fetchCarDetails() {
  fetch(`/api/v1/users/${props.user_id}/favorites`, {

    method: 'GET',
    headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + localStorage.getItem('token')
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
        cars.value = data.favorites;
    })
    .catch(error => {
      console.error("There was an error fetching the car details:", error);
    });
}

const user = ref({});
//const token = localStorage.getItem('jwt_token'); //might belong in following scope

function fetchUserInfo () {
  fetch(
    `/api/v1/users/${props.user_id}`, 
    {
      method: 'GET',
      headers: {
      'Content-Type': 'application/json',
      'Authorization': 'Bearer ' + localStorage.getItem('token')
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
        user.value = data.user;
    })
    .catch(error => {
      console.error("There was an error fetching the user details:", error);
    });

    };

    const formattedCreatedAt = computed(() => {
  if (user.value.created_at) {
    const date = new Date(user.value.created_at);
    return date.toLocaleDateString(undefined, {
      year: 'numeric',
      month: 'long',
      day: 'numeric'
    });
  } else {
    return '';
  }
});

onMounted(() => { fetchUserInfo();
                  fetchCarDetails();
                });


</script>

<template style>
  <div>

      <div class = "container col-md-10">
      <div v-if="user" class="user-profile card" style ="margin:auto;">
        <div class="row g-0">
          <div class="col-md-2">
            <div class="profile-picture img-fluid">
              <img :src ="user.photo" alt="Please Work">
              <!-- <img src="..\..\images\McLaren.jpg" alt="Please Work"> -->
              <!-- <img :src="user.profilePictureUrl" alt="Profile Picture"> -->
            </div>
          </div>
          <div class="col-md-10">
            <div class="profile-details row">
              <h2>{{ user.name }}</h2>
              <div class = "username-and-bio">
             <!-- <h3>@TheOnlyOneSheWant</h3><br> -->
              <p>{{ user.biography }}</p>
              </div>
              <div class ="title-headings col-md-2">
              <p>Email: <br> Location:<br> Date Joined:</p>
              </div>
              <div class ="title-sub-headings col-md-7">
              <p> {{ user.email }} <br> {{ user.location }} <br> {{ formattedCreatedAt }} </p>
              <!-- <p> alright@gmail.com <br> Let's Say heaven<br> Yesterday's Tomorrow</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    
      <div v-else>
        User not found
      </div>
    
      <div class="favorited-cars">
        <h2>Favorited Cars</h2>
        <div class="container mt-5">
        <div class="row row-gap-4" id="cars-container">
          <div v-for="car in cars" :key="car.id" class="col-md-4">
            <div class="card">
              <img :src="car.photo" class="card-img-top" alt="Car Image">
              <div class="card-body">
                <div class="row">
                  <h5 class="card-title col-6">{{ car.year}} {{ car.make }}</h5>
                  <p class="card-text text-center rounded-3 w-50 text-white col-6 price-bg">
                  <i class="fas fa-tag"></i> {{ car.price }} </p>
                </div>
                
                
                <h5 class="text-secondary">{{ car.model }}</h5>
              </div>
              <div class="card-body text-center">
                <router-link :to="{ name: 'CarView', params: { car_id: car.id }}" class="btn btn-primary w-75">View more Details</router-link>
              </div>
            </div>
          </div>  
        </div>
      </div>


      </div>
    </div>

</div>
</template>


<style scoped>


.user-profile {
  display: flex;
  align-items: flex-start;
  padding: 50px;
}

.profile-picture {
  margin-right: 20px;
  max-width:175px;
}

.profile-picture img {
  width: 100%;
  height: auto;
  border-radius: 50%;
}

.profile-details {
  flex: 1;
}

.profile-details .username-and-bio{
  color:grey;
}
.profile-details .title-headings{
  color:grey;
  font-weight:bold;
}

.profile-details .title-sub-headings{
  font-weight:600;
}

.favorited-cars {
  margin-top: 20px;
}

.favorited-cars .car-holder ul {
  list-style-type: none;
  padding: 0;
}

.favorited-cars .car-holder li {
  margin-bottom: 5px;
}
.favorited-cars .car-holder li img {
  height:50px;
  width:50px;
}
.favorited-cars .car-holder li {
  margin-bottom: 5px;
}

.year-price 
{
  padding:5px;
}

.rounded-green {
    background-color: #34db55;
    border-radius: 5px;
    color:white;
}


</style>
