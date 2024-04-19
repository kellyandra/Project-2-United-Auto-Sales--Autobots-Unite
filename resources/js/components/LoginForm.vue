<script setup>
</script>

<template>
        <div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <form @submit.prevent="Login" id="loginForm" action="" method="post">
                
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" name="email" id="email" class="form-control" placeholder="johndoe@example.com" required>
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password" id="password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>
</template>

<style scoped>
</style>