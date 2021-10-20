<template>
  <div class="container">
    <!-- HEADER -->
    <header class="text-center">
      <h1>Boolpress</h1>
    </header>
    <Loader />
    <main>
      <PostList />
    </main>
  </div>
</template>

<script>
import PostList from "../components/PostList.vue";
import Loader from "../components/Loader.vue";
export default {
  name: "App",
  components: {
    PostList,
    Loader,
  },
};
</script>
