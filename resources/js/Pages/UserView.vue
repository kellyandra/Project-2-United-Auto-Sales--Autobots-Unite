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
  <p>NOT BUCKLING</p>
  <!-- <div class="user-profile">
    <div class="profile-picture">
      <img :src="user.profilePictureUrl" alt="Profile Picture">
    </div>
    <div class="profile-details">
      <h1>{{ user.fullName }}</h1>
      <h2>@{{ user.username }}</h2>
      <p>{{ user.bio }}</p>
      <p>Email: {{ user.email }}</p>
      <p>Location: {{ user.location }}</p>
      <p>Date Joined: {{ user.dateJoined }}</p>
      <div class="favorited-cars">
        <h3>Favorited Cars</h3>
        <ul>
          <li v-for="car in user.favoritedCars" :key="car.id">
            {{ car.make }} - {{ car.model }}
          </li>
        </ul>
      </div>
    </div>
  </div> -->
</template>

<style scoped>
.user-profile {
  display: flex;
  align-items: flex-start;
}

.profile-picture {
  margin-right: 20px;
}

.profile-picture img {
  width: 100px;
  height: 100px;
  border-radius: 50%;
}

.profile-details {
  flex: 1;
}

.favorited-cars {
  margin-top: 20px;
}

.favorited-cars ul {
  list-style-type: none;
  padding: 0;
}

.favorited-cars li {
  margin-bottom: 5px;
}
</style>
