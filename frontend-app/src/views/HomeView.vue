<script setup>

import { onMounted } from 'vue';
import {usePostsStore} from '@/stores/post'
import { ref } from 'vue';

const postStore = usePostsStore(); // Get the whole store
const posts = ref([]);

onMounted(async () => {
  console.log("onMounted is running...");
  try {
    posts.value = await postStore.getAllPosts();
    console.log("Fetched posts:", posts.value);
  } catch (error) {
    console.error("Error fetching posts:", error);
  }
});

</script>

<template>
  <main class="flex justify-center items-start h-screen bg-gray-100">
    <div class="w-full max-w-4xl p-5 bg-white shadow-lg rounded-lg mt-5">
      <h1 class="text-center text-2xl font-bold mb-5">Clothing Items</h1>

      <table v-if="posts.length > 0" class="w-full border-collapse border border-gray-300">
        <thead>
          <tr class="bg-gray-200">
            <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Title</th>
            <th class="border border-gray-300 px-4 py-2 text-left">Brand</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-100">
            <td class="border border-gray-300 px-4 py-2">{{ post.id }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ post.title }}</td>
            <td class="border border-gray-300 px-4 py-2">{{ post.brand }}</td>
          </tr>
        </tbody>
      </table>

      <p v-else class="text-center text-gray-500">No clothing items available.</p>
    </div>
  </main>
</template>
