<template>
  <div class="container">
    <!-- HEADER -->
    <header class="text-center">
      <h1>Boolpress</h1>
    </header>
    <main>
      <PostList />
    </main>
  </div>
</template>

<script>
import PostList from "../components/posts/PostList.vue";
export default {
  name: "App",
  components: {
    PostList,
  },
};
</script>
