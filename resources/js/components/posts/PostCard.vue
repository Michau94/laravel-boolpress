<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card m-3">
        <div class="card-header">
          <h2>{{ post.title }}</h2>
          <div v-if="post.tags.length > 0">
            Tags:
            <span
              v-for="tag in post.tags"
              :key="tag.id"
              class="badge badge-pill"
              :style="'background-color:' + tag.color"
            >
              {{ tag.name }}</span
            >
          </div>
          <div v-else>No tags</div>
        </div>
        <div class="card-body">
          {{ post.content }}
          <img
            class="img-fluid"
            v-if="post.upload_image"
            :src="'storage/' + post.upload_image"
            alt="foto"
          />
        </div>
        <div class="card-footer d-flex justify-content-evenly">
          <div class="p-2">
            Pubblication date: {{ formatDate(post.created_at) }}
          </div>
          <div class="category p-2">
            <div v-if="post.category">
              Category:
              <span
                class="badge badge-pill"
                :class="'badge-' + post.category.color"
              >
                {{ post.category.name }}</span
              >
            </div>
            <div v-else>Category: Nessuna Categoria</div>
          </div>
          <div class="author p-2">
            <div v-if="post.user">Autore: {{ post.user.name }}</div>
            <div v-else>Autore: Anonimo</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import dayjs from "dayjs";
export default {
  name: "PostCard",
  props: ["post"],
  methods: {
    formatDate(date) {
      return dayjs(date).format("DD/MM/YYYY HH:mm");
    },
  },
};
</script>

<style>
</style>