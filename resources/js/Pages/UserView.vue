<script>
export default {
  props: {
    user: {
      type: Object,
      required: true
    }
  }
};
</script>

<template>
  <div class = "container">
  <div class="user-profile card">
    <div class="row g-0">
      <div class="col-md-3">
        <div class="profile-picture img-fluid">
          <img src="..\..\images\McLaren.jpg" alt="Please Work">
          <!-- <img :src="user.profilePictureUrl" alt="Profile Picture"> -->
        </div>
      </div>
      <div class="col-md-8">
        <div class="profile-details row">
          <h2>Not James Bond</h2>
          <div class = "username-and-bio">
          <h3>@TheOnlyOneSheWant</h3><br>
          <p>700</p>
          </div>
          <div class ="title-headings col-md-3">
          <p>Email: <br> Location:<br> Date Joined:</p>
          </div>
          <div class ="title-sub-hedings col-md-5">
          <p>alright@gmail.com <br> Let's Say heaven<br> Yesterday's Tomorrow</p>
          </div>
        </div>
      </div>
    </div>
  </div>

<div class="favorited-cars">
  <h2>Favorited Cars</h2>
  <div class = "car-holder col-md-12">
      <ul class = "row">
      <li class ="single-car-list card col-md-4">
        <!-- Had to use inline styling for the next part to overwrite conflicting styling, ID would not be optimal -->
        <img class = "row card-img-top" 
        style="width:100%; height:100%; padding:5px; object-fit:contain; justify-content:center; align-items:center;" 
        src="..\..\images\McLaren.jpg" alt="Please Work">
      <div class = "row col-md-12">
        <p class ="col year-price">2026 DC</p><p class = "col rounded-green">
          <img src = "https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRe52LuKTsxLrZz579799LdJ43ZSrXV2JhheHdBLUtF1D0ff-fcR9h8vdzyOC7nc73kmnk&usqp=CAU">
          Expensive As Hell</p>
        <p>The Batmobile</p>
        </div>
        <router-link v-if="!isAuthenticated" to="/explore" class="btn btn-primary mb-2 mt-2">View More Details</router-link>        
    </li>
  </ul>
    </div>
    <!-- <li v-for="car in user.favoritedCars" :key="car.id">
      {{ car.make }} - {{ car.model }}
    </li> -->
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
}

.profile-picture img {
  width: 175px;
  height: 175px;
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

.card-img-top 
{
  width:1000px;
  height:1000px;
}

</style>
