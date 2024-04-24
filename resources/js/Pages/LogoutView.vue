<script setup>
import { onMounted } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter();

onMounted(() => {
    // Remove user ID from localStorage
    localStorage.removeItem('user_id');
    // Redirect to the home page
    router.push('/');
});
</script>
