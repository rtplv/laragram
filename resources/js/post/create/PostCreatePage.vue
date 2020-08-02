<template>
  <section class="post-create-page">
    <post-create-form />
  </section>
</template>

<script>
import PostCreateForm from './PostCreateForm';
export default {
  name: 'PostCreatePage',
  components: { PostCreateForm }
};
</script>

<style lang="scss" scoped>
  .post-create-page {
  }
</style>
