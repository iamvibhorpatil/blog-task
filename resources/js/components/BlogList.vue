<template>
    <div class="container mx-auto">
      <h2 class="text-center mb-4 text-primary text-uppercase fw-semibold m-3">Blog List</h2>
      
      <input type="text" class="form-control mb-3" placeholder="Search..." v-model="searchQuery">
      
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>Sr No</th>
            <th>Title</th>
            <th>Content</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="(blog, index) in filteredBlogs" :key="blog.id">
            <td>{{ index + 1 }}</td>
            <td>{{ blog.title }}</td>
            <td>{{ blog.content.substring(0, 50) }}...</td>
            <td>
              <button class="btn btn-sm btn-primary me-2" @click="openEditModal(blog)">Edit</button>
              <button class="btn btn-sm btn-danger" @click="confirmDelete(blog.id)">Delete</button>
            </td>
          </tr>
        </tbody>
      </table>
  
      <!-- Edit Blog Modal -->
      <div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Edit Blog</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control mb-2" v-model="editForm.title" placeholder="Title">
              <textarea class="form-control mb-2" v-model="editForm.content" placeholder="Content"></textarea>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
              <button type="button" class="btn btn-success" @click="updateBlog">Update</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from 'axios';
  import Swal from 'sweetalert2';
  import { Modal } from 'bootstrap';
  
  export default {
    data() {
      return {
        blogs: [],
        searchQuery: '',
        editForm: {
          id: null,
          title: '',
          content: ''
        },
        editModal: null
      };
    },
    computed: {
      filteredBlogs() {
        return this.blogs.filter(blog => blog.title.toLowerCase().includes(this.searchQuery.toLowerCase()));
      }
    },
    mounted() {
      this.fetchBlogs();
    },
    methods: {
      fetchBlogs() {
        axios.get('/api/blogs')
          .then(response => { this.blogs = response.data; })
          .catch(error => console.error(error));
      },
      openEditModal(blog) {
        this.editForm = { id: blog.id, title: blog.title, content: blog.content };
  
        if (!this.editModal) {
          this.editModal = new Modal(document.getElementById('editModal'));
        }
        this.editModal.show();
      },
      updateBlog() {
        axios.put(`/api/blogs/${this.editForm.id}`, {
          title: this.editForm.title,
          content: this.editForm.content
        })
        .then(() => {
          this.fetchBlogs(); 
          this.editModal.hide();
          Swal.fire('Success!', 'Blog updated successfully!', 'success');
        })
        .catch(error => console.error(error));
      },
      confirmDelete(id) {
        Swal.fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          icon: "warning",
          showCancelButton: true,
          confirmButtonColor: "#d33",
          cancelButtonColor: "#3085d6",
          confirmButtonText: "Yes, delete it!"
        }).then((result) => {
          if (result.isConfirmed) {
            this.deleteBlog(id);
          }
        });
      },
      deleteBlog(id) {
        axios.delete(`/api/blogs/${id}`)
          .then(() => {
            this.blogs = this.blogs.filter(blog => blog.id !== id);
            Swal.fire("Deleted!", "Blog has been deleted.", "success");
          })
          .catch(error => console.error(error));
      }
    }
  };
  </script>
  