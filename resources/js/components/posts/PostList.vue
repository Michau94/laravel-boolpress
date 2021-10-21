<template>
  <div class="container">
    <Loader v-if="isLoading" />
    <div v-else>
      <h3 class="text-secondary text-center">Lista post</h3>
      <Navigation
        :currentPage="pagination.currentPage"
        :lastPage="pagination.lastPage"
        @pageChange="getPost"
      />
      <PostCard v-for="post in posts" :key="post.id" :post="post" />
    </div>

    <Navigation
      :currentPage="pagination.currentPage"
      :lastPage="pagination.lastPage"
      @pageChange="getPost"
    />

    <!-- <nav aria-label="..." class="d-flex justify-content-center">
      <ul class="pagination">
        <li
          class="page-item"
          @click="getPost(pagination.currentPage - 1)"
          :class="{ disabled: pagination.currentPage == 1 }"
        >
          <a class="page-link">Previous</a>
        </li>
        <li
          v-for="n in pagination.lastPage"
          :key="n"
          class="page-item"
          :class="{ active: pagination.currentPage == n }"
          @click="getPost(n)"
        >
          <a class="page-link"> {{ n }}</a>
        </li>
        <li
          class="page-item"
          @click="getPost(pagination.currentPage + 1)"
          :class="{ disabled: pagination.currentPage == pagination.lastPage }"
        >
          <a class="page-link">Next</a>
        </li>
      </ul>
    </nav> -->
  </div>
</template>

<script>
import PostCard from "./PostCard.vue";
import Loader from "../Loader.vue";
import Navigation from "../Navigation.vue";
export default {
  name: "PostList",
  components: {
    PostCard,
    Loader,
    Navigation,
  },
  data() {
    return {
      posts: [],
      isLoading: true,
      pagination: {},
    };
  },
  methods: {
    getPost(n) {
      axios
        .get(`http://localhost:8000/api/posts/?page=${n}`)
        .then((res) => {
          this.isLoading = true;
          const { data, current_page, last_page } = res.data;
          this.posts = data;
          this.isLoading = false;
          this.pagination = { currentPage: current_page, lastPage: last_page };
        })
        .catch((e) => {
          console.error(e);
        });
    },

    getPage(n) {
      this.getPost(n);
    },
  },

  created() {
    this.getPost();
  },
};
</script>

<style>
</style>