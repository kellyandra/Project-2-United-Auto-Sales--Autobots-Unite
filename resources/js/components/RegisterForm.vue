<script setup>
</script>

<template>
    <h1>Register New User</h1>
    <form class="row g-3" action="/properties/create" enctype="multipart/form-data" method="post">

        <div class="col-md-6 mb-3">
            <label for="username" class="form-label fw-bold ">Username</label>
            <input type="text" name="username" id="username" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="password" class="form-label fw-bold">Password</label>
            <input type="password" name="password" id="password" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
            <label for="name" class="form-label fw-bold">Full Name</label>
            <input type="text" name="name" id="name" class="form-control">
        </div>

        <div class="mb-3 col-md-6">
            <label for="email" class="form-label fw-bold">Email</label>
            <input type="email" name="email" id="email" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="location" class="form-label fw-bold">location</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>

        <div class="col-md-12 mb-3">
            <label for="property" class="form-label fw-bold">Biography</label>
            <textarea name="biography" id="biography" cols="30" rows="10"></textarea>
        </div>

        <div class="col-md-12 mb-3">
            <label for="photo" class="form-label fw-bold d-block">Photo</label>
            <label for="photo" class="btn btn-outline-secondary">
                Browse
                <input class="form-control d-none" type="file" name="photo" id="photo">
            </label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Register</button>
        </div>
    </form>
</template>

<style>
</style>