<template>
  <section class="post-create-form container is-centered">
    <h1 class="title">
      Добавление поста
    </h1>

    <form class="form"
          @submit.prevent="handleFormSubmit">
      <div class="photo-field field">
        <figure v-if="previewPhotoUrl"
                class="image preview-image">
          <img :src="previewPhotoUrl"
               alt="превью">
        </figure>

        <div class="file is-fullwidth"
             :class="{ 'has-name': form.photoFile }" >
          <label class="file-label">
            <input class="file-input"
                   type="file"
                   name="resume"
                   @change="handlePhotoFileInputChange"
            >

            <span class="file-cta">
              <span class="file-icon">
                <i class="fas fa-upload"></i>
              </span>
              <span class="file-label">
                {{ form.photoFile ? 'Выбрать другое…' : 'Выберите фото…' }}
              </span>
            </span>

            <span class="file-name"
                  v-if="form.photoFile">
              {{ form.photoFile.name }}
            </span>
          </label>
        </div>
      </div>

      <div class="field description-field">
        <div class="control">
          <textarea class="textarea"
                    placeholder="Добавьте описание"
                    v-model="form.description"></textarea>
        </div>
      </div>

      <div class="field">
        <div class="control">
          <button class="button is-success"
                  :class="{ 'is-loading': isLoading }"
                  type="submit">Добавить</button>
        </div>
      </div>
    </form>
  </section>
</template>

<script>
  import axios from 'axios';

  export default {
    name: 'PostCreateForm',
    data: () => ({
      isLoading: false,
      form: {
        photoFile: null,
        description: '',
      },
      previewPhotoUrl: null
    }),
    methods: {
      handlePhotoFileInputChange(event) {
        if (!event.target.files) {
          return;
        }

        this.form.photoFile = event.target.files[0];

        this.readFileURL(this.form.photoFile);
      },
      readFileURL(file) {
        const reader = new FileReader();

        reader.onload = e => {
          // TODO: Уязвимое место, здесь base64 может очень большим
          this.previewPhotoUrl = e.target.result;
        }

        reader.readAsDataURL(file);
      },
      async handleFormSubmit() {
        const reqData = new FormData();

        this.isLoading = true;

        reqData.append('photo', this.form.photoFile);
        reqData.append('description', this.form.description);

        const { data } = await axios.post('/post/create', reqData)

        document.location.href = `/post/${data.post.id}`;

        this.isLoading = false;
      }
    }
  };
</script>

<style lang="scss" scoped>
  .post-create-form {
    justify-content: center;
    width: 50%;
    margin: 0 auto;
    .title {
      margin: 50px 0;
    }
    .form {
      .photo-field {
        .preview-image {
          width: 400px;
          height: 400px;
          border-radius: 3px;
          margin: 0 auto 50px auto;
        }
      }
    }
  }
</style>
