<template>
  <div class="container">
    <h3 class="text-secondary text-center">Lista post</h3>
    <div>
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>
  </div>
</template>

<script>
import PostCard from "./PostCard.vue";
export default {
  name: "PostList",
  components: {
    PostCard,
  },
  data() {
    return {
      posts: [],
    };
  },
  methods: {
    getPost() {
      axios
        .get("http://localhost:8000/api/posts/")
        .then((res) => {
          this.posts = res.data;
        })
        .catch((e) => {
          console.error;
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