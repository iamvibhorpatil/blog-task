<template>
    <div class="card container my-5 p-4 shadow-sm">
      <h2 class="text-center mb-4 text-primary text-uppercase fw-semibold m-3">Create New Blog</h2>
      
      <form @submit.prevent="submitBlog">
        <div class="mb-3">
          <label class="form-label">Title</label>
          <input type="text" class="form-control" v-model="blog.title" required>
        </div>
        
        <div class="mb-3">
          <label class="form-label">Content</label>
          <textarea class="form-control" v-model="blog.content" required></textarea>
        </div>
        
        <button type="submit" class="btn btn-primary w-100">Create Blog</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  
  export default {
    data() {
      return { 
        blog: { title: '', content: '' } 
      };
    },
    methods: {
      submitBlog() {
        axios.post('/api/blogs', this.blog)
          .then(() => {
            this.blog = { title: '', content: '' };
            Swal.fire({
              title: "Success!",
              text: "Blog Created Successfully!",
              icon: "success",
              confirmButtonColor: "#3085d6",
              confirmButtonText: "OK"
            });
          })
          .catch(error => console.error(error));
      }
    }
  };
  </script>
  