<template>
  <div class="container">
    <!-- HEADER -->
    <header class="text-center">
      <h1>Boolpress</h1>
    </header>

    <main>
      <div class="row justify-content-center">
        <div class="col-md-8" v-for="post in posts" :key="post.id">
          <div class="card m-3">
            <div class="card-header">{{ post.title }}</div>
            <div class="card-body">{{ post.content }}</div>
          </div>
        </div>
      </div>
    </main>
  </div>
</template>

<script>
export default {
  name: "App",
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
