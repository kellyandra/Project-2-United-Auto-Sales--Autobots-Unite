<script setup>




</script>

<template>
 <div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-6">
      <img src="{{ url('storage/' . $property->propertyphoto) }}" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-6">
      <div class="card-body">
        <h5 class="card-title">{{ $property->title }}</h5> 

        
        <p class="card-text badge rounded-pill bg-primary"> ${{$property->price}} </p>


        <p class="card-text badge rounded-pill bg-warning"> {{$property->type}} </p>
        <p class="card-text"> {{$property->description}} </p>

        <p class="card-text"> </p>
                    
                  

        <p class="card-text">
                    {{$property->numBathrooms}} Bathrooms </p>

        <p class="card-text"> 
                         {{$property->location}} </p>
        <button type="submit" class=" text-white btn " style="background:#2cab3b;" disabled>Email Owner</button>
        
</div>
    </div>
  </div>
</div>


</template>

<style>

</style>