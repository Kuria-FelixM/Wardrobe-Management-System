<script setup>
import { RouterLink } from 'vue-router';
import { useAuthStore } from "@/stores/auth";
import { onMounted } from "vue";

const authStore = useAuthStore()

onMounted(() => {
  authStore.getUser();
  });
</script>

<template>
  <div>
    <nav class="bg-blue-900 text-white p-10 flex items-center justify-center space-x-10">
  <div>
    <RouterLink :to="{ name: 'home' }" class="text-white text-lg hover:text-gray-300">Home</RouterLink>
  </div>

  <div class="flex items-center space-x-6">
    <p v-if="authStore.user" class="text-lg font-semibold">Welcome Back {{ authStore.user.name }}</p>

    <div v-if="authStore.user" class="flex space-x-6">
      <RouterLink :to="{ name: 'create' }" class="text-white text-lg hover:text-gray-300">Add Clothing</RouterLink>
    </div>

    <div v-if="authStore.user">
      <form @submit.prevent="authStore.logout">
        <button class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</button>
      </form>

  
    </div>

    <div v-else class="flex space-x-6">
      <RouterLink :to="{ name: 'register' }" class="text-white text-lg hover:text-gray-300">Register</RouterLink>
      <RouterLink :to="{ name: 'login' }" class="text-white text-lg hover:text-gray-300">Login</RouterLink>
    </div>
    
  </div>
</nav>


    <main class="p-4">
      <RouterView />
    </main>
  </div>
</template>

