<script setup>
</script>

<template>
    <h1>Add New Car</h1>
    <form class="row g-3" @submit.prevent="AddNewCar" id="NewCarForm" action="" enctype="multipart/form-data" method="post">

        <div class="mb-3 col-md-6">
            <label for="make" class="form-label fw-bold">Make</label>
            <input type="text" name="make" id="make" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="model" class="form-label fw-bold">Model</label>
            <input type="text" name="model" id="model" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="colour" class="form-label fw-bold">Colour</label>
            <input type="text" name="colour" id="colour" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="year" class="form-label fw-bold">Year</label>
            <input type="text" name="year" id="year" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="year" class="form-label fw-bold">Year</label>
            <input type="text" name="year" id="year" class="form-control">
        </div>

        <div class="col-md-6 mb-3">
            <label for="price" class="form-label fw-bold">Price</label>
            <input type="text" name="price" id="price" class="form-control">
        </div>



        <div class="col-md-12 mb-3">
            <label for="photo" class="form-label fw-bold d-block">Photo</label>
            <label for="photo" class="btn btn-outline-secondary">
                Browse
                <input class="form-control d-none" type="file" name="photo" id="photo">
            </label>
        </div>

        <div class="mb-3">
            <button type="submit" class="btn btn-primary">Save</button>
        </div>
    </form>
</template>

<style>
</style>