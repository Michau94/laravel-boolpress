<template>
  <div class="container">
    <Loader v-if="isLoading" />
    <div v-else>
      <h3 class="text-secondary text-center">Lista post</h3>
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "./Loader.vue";
export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
  },
  data() {
    return {
      posts: [],
      isLoading: true,
    };
  },
  methods: {
    getPost() {
      axios
        .get("http://localhost:8000/api/posts/")
        .then((res) => {
          this.isLoading = true;
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.isLoading = false;
        })
        .catch((e) => {
          console.error(e);
        });
    },
  },

  created() {
    this.getPost();
  },
};
</script>

<style>
</style>