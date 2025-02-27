<script setup>

import { reactive } from 'vue';
import {usePostsStore} from '@/stores/post'

const { createPost} =usePostsStore()


const formData= reactive({
    title: '',
    brand:'',
})


</script>


<template>
  <main>
    <h1 class="text-center text-3xl font-bolder ">Add a new Clothing Item</h1>

    <div class="flex justify-center bg-gray-100 py-10 px-4">
    <form  @submit.prevent="createPost(formData)"
         class="w-3/4 max-w-lg bg-white p-6 rounded-2xl shadow-lg space-y-4">
       

        <div class="flex justify-center">
            <input type="text" placeholder="Clothing Title" 
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                v-model="formData.title"/>
                
            
        </div>

        <div class="flex justify-center">
            <input type="text" placeholder="Clothing Brand" 
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                v-model="formData.brand" />
                
        </div>

        <button 
            class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition">
            Submit
        </button>
    </form>
</div>


    


  </main>
</template>