<template>
  <section class="post-page container">
    <div class="card"
         v-if="post">
      <div class="card-image">
        <figure class="image is-4by3">
          <img :src="post.photo.storage_path" alt="Placeholder image">
        </figure>
      </div>
      <div class="card-content">
        <div class="media">
          <div class="media-left">
            <figure class="image is-48x48">
              <!-- TODO: Заменить на настоящий аватар -->
              <img src="/assets/avatar.jpg" alt="Placeholder image">
            </figure>
          </div>
          <div class="media-content">
            <p class="title is-4">{{ post.user.name }}</p>
          </div>
        </div>

        <div class="content">
          {{ post.description }}
          <br>
          <time :datetime="post.created_at">{{ postLocaleDate }}</time>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from 'axios';
import moment from 'moment';

export default {
  name: 'PostPage',
  props: {
    postId: {
      type: Number,
      required: true
    }
  },
  data: () => ({
    post: null
  }),
  mounted() {
    moment.locale('ru');

    this.getPost();
  },
  computed: {
    postLocaleDate() {
      if (!this.post) {
        return null;
      }

      return moment(this.post.created_at).format('LLL');
    }
  },
  methods: {
    async getPost() {
      this.isLoading = true;

      const { data } = await axios.get(`/post/get/${this.postId}`);

      this.post = data.post;

      this.isLoading = false;
    }
  }
};
</script>

<style lang="scss" scoped>
  .post-page {
    .card {
      .card-content {
        .media-content {
          align-self: center;
        }
      }
    }
  }
</style>
