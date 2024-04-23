<script setup>
import { ref } from "vue";
import { useRouter } from "vue-router";

const router = useRouter();
function registerUser() {
    let registerForm = document.getElementById('registerForm');
    let form_data = new FormData(registerForm);

    fetch("/api/v1/auth/register", {
        method: 'POST',
        body: form_data,
        headers: {
            'Accept': 'application/json'
        }
    })
    .then(response =>{
        if (!response.ok) {
            return response.text().then(text => { throw new Error(text) });
        }
        return response.json();
    })
    .then(data => {
        registerForm.reset();
        router.push({path: '/login'});
    })
    .catch(error => {
        console.error(error);
    })
    
}

</script>

<template>
    <h1>Register New User</h1>
    <form class="row g-3" @submit.prevent="registerUser" id="registerForm" action="" enctype="multipart/form-data" method="post">

        <div class="mb-3 col-md-6">
            <label for="name" class="form-label fw-bold">Full Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="location" class="form-label fw-bold">Location</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>

        <div class="col-md-12 mb-3">
            <label for="biography" class="form-label fw-bold">Biography</label>
            <textarea name="biography" id="biography" cols="30" rows="5" class="form-control"></textarea>
        </div>

        <div class="col-md-12 mb-3">
            <label for="photo" class="form-label fw-bold d-block">Photo</label>
            <label for="photo" class="btn btn-outline-secondary">
                Browse
                <input class="form-control d-none" type="file" name="photo" id="photo">
            </label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn reg-btn">Register</button>
        </div>
    </form>
</template>

<style>
    .reg-btn {
        background-color: #02bd88;
        color: white;
    }
</style>