<template>
  <nav aria-label="..." class="d-flex justify-content-center">
    <ul class="pagination">
      <li
        class="page-item"
        @click="$emit('pageChange', currentPage - 1)"
        :class="{ 'd-none': currentPage == 1 }"
      >
        <a class="page-link">Previous</a>
      </li>
      <li
        v-for="n in lastPage"
        :key="n"
        class="page-item"
        :class="{ active: currentPage == n }"
        @click="$emit('pageChange', n)"
      >
        <a class="page-link"> {{ n }}</a>
      </li>
      <li
        class="page-item"
        :class="{ 'd-none': currentPage == lastPage }"
        @click="$emit('pageChange', currentPage + 1)"
      >
        <a class="page-link">Next</a>
      </li>
    </ul>
  </nav>
</template>

<script>
export default {
  Name: "Navigation",
  props: ["currentPage", "lastPage"],
};
</script>

<style lang="scss" scoped>
li {
  a {
    cursor: pointer;
  }
}
</style>