<script>
import axios from 'axios';

export default {
  data() {
    return { blogs: [] };
  },
  mounted() {
    axios.get('/api/blogs')
      .then(response => {
        // console.log("API Response:", response.data); //
        this.blogs = response.data;
      })
      .catch(error => {
        console.error("API Error:", error);
      });
  }
};
</script>
<template>
    <div class="container mx-auto">
      <h2 class="text-center mb-4 text-primary text-uppercase fw-semibold m-3">Latest Blogs</h2>
      <div v-if="blogs.length === 0" class="text-center">No blogs available</div>
      <div class="row">
        <div v-for="(blog, index) in blogs" :key="index" class="col-md-4">
          <div class="card shadow-lg border-0 mb-4">
            <div class="card-body">
              <h5 class="card-title text-primary">{{ blog.title }}</h5>
              <p class="card-text">{{ blog.content.substring(0, 100) }}...</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  