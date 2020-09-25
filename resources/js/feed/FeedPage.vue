<template>
  <section class="feed-page container">
    <template v-if="posts">
      <div class="card"
           v-for="post in posts"
           :key="post.id"
      >
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
            <time :datetime="post.created_at">{{ getLocaleDate(post.created_at) }}</time>
          </div>
        </div>
      </div>
    </template>
  </section>
</template>

<script>
import axios from 'axios';
import moment from 'moment';

export default {
  name: 'FeedPage',
  props: {
    onlyUserPosts: {
      type: Boolean,
      default: false
    }
  },
  data: () => ({
    posts: null
  }),
  mounted() {
    this.getPosts();
  },
  methods: {
    async getPosts() {
      this.isLoading = true;

      let response = null;

      if (this.onlyUserPosts) {
        response = await axios.post(`/me/get`);
      } else {
        response = await axios.post(`/feed/get`);
      }

      this.posts = response.data.posts;

      this.isLoading = false;
    },
    getLocaleDate(date) {
      return moment(date).format('LLL');
    }
  }
};
</script>

<style lang="scss" scoped>
  .feed-page {
    .card {
      max-width: 50%;
      margin: 50px auto;
      .card-content {
        .media-content {
          align-self: center;
        }
      }
    }
  }
</style>
