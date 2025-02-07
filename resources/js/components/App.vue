<style>
.nav-link{
  cursor: pointer!important;
}
</style>
<template>
  <div>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" @click="changeView('Home')">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" @click="changeView('CreateBlog')">Create Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" @click="changeView('BlogList')">Blog List</a>
        </li>
      </ul>
    </nav>

    <component :is="currentView"></component>
  </div>
</template>

<script>
import Home from "./Home.vue";
import CreateBlog from "./CreateBlog.vue";
import BlogList from "./BlogList.vue";

export default {
  data() {
    return { currentView: "Home" };
  },
  components: { Home, CreateBlog, BlogList },
  methods: {
    changeView(view) {
      this.currentView = view;
    },
  },
};
</script>
