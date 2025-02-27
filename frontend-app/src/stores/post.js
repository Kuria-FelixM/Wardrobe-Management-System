import {defineStore} from "pinia";


export const usePostsStore = defineStore('postsStore',{
    state:()=> {
        return {
            
            errors: {},
        };
    },



    actions: {

        async getAllPosts() {
            try {
              const res = await fetch('http://localhost:8000/api/clothingItem'); // ✅ Full API URL
              if (!res.ok) throw new Error("Failed to fetch posts"); // ✅ Handle fetch errors
          
              const data = await res.json(); // ✅ Correctly calling and awaiting `.json()`
              console.log("Fetched posts:", data); // ✅ Logs actual data, not a function
          
              return data;
            } catch (error) {
              console.error("Error fetching posts:", error);
              return []; // ✅ Return an empty array if there's an error
            }
          },
          

        async createPost(formData){
                const res = await fetch('/api/clothingItem',{
                    method: 'post',
                    headers:{
                        Authorization: `Bearer ${localStorage.getItem("token")}`,
                    },
                    body: JSON.stringify(formData),
                });
                const data = await res.json();

                if(data.errors){
                    this.errors = data.errors
                }else{
                    console.log(data);
                }
                
                
            

        },
    },

});