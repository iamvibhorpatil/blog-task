<template>
    <div>
      <h2>Edit Blog</h2>
      <form @submit.prevent="updateBlog">
        <input v-model="title" placeholder="Title" class="border p-2 mb-2 block">
        <textarea v-model="content" placeholder="Content" class="border p-2 mb-2 block"></textarea>
        <button type="submit" class="bg-green-500 text-white px-4 py-2">Update</button>
      </form>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  
  export default {
    props: ['postId'],
    data() {
      return {
        title: '',
        content: ''
      };
    },
    mounted() {
      this.fetchBlogData();
    },
    methods: {
      fetchBlogData() {
        if (!this.postId) return;
  
        axios.get(`/api/blogs/${this.postId}`)
          .then(response => {
            this.title = response.data.title;
            this.content = response.data.content;
          })
          .catch(error => console.error('Error fetching blog:', error));
      },
      updateBlog() {
        axios.put(`/api/blogs/${this.postId}`, {
          title: this.title,
          content: this.content
        })
        .then(() => this.$emit('changeView', 'BlogTable'))
        .catch(error => console.error('Error updating blog:', error));
      }
    }
  };
  </script>
  