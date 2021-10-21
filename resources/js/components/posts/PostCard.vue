<template>
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card m-3">
        <div class="card-header">{{ post.title }}</div>
        <div class="card-body">{{ post.content }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "PostCard",
  props: ["post"],
};
</script>

<style>
</style>