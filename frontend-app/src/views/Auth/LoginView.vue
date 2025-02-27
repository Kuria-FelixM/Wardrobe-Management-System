<script setup>
import {reactive} from 'vue';
import { useAuthStore } from "@/stores/auth";
import {storeToRefs} from "pinia"; 

const { errors } = storeToRefs(useAuthStore());
const  { authenticate } = useAuthStore();


const formData = reactive({
    
    email: '',
    password:'',

})

</script>

<template>
  <main>
    <h1 class="text-center text-3xl font-bolder ">Login To your account </h1>

    <div class="flex justify-center bg-gray-100 py-10 px-4">
    <form @submit.prevent=" authenticate('login',formData)"
         class="w-3/4 max-w-lg bg-white p-6 rounded-2xl shadow-lg space-y-4">
       

       

        <div class="flex justify-center">
            <input type="email" placeholder="Email" 
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                v-model="formData.email"/>
                <P class="text-red-500" v-if="errors.email">{{errors.email[0]}}</P>
        </div>

        <div class="flex justify-center">
            <input type="password" placeholder="Password" 
                class="w-full p-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" 
                v-model="formData.password"/>
                <P class="text-red-500" v-if="errors.password">{{errors.password[0]}}</P>
        </div>

        

        <button 
            class="w-full bg-blue-500 text-white py-3 rounded-lg font-semibold hover:bg-blue-600 transition">
            Login
        </button>
    </form>
</div>


    


  </main>
</template>
