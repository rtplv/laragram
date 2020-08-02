<template>
  <div class="user-block">
    <button class="loader-placeholder button is-loading"
            v-if="isLoading"/>

    <template v-else>
      <div class="dropdown"
           v-if="user"
           :class="{ 'is-active': isOpened }">
        <div class="dropdown-trigger"
             @click.stop="handleDropdownToggled">
          <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
            <img class="avatar" src="/assets/avatar.jpg"/>
            <span>{{ user.name }}</span>
          </button>
        </div>

        <div class="dropdown-menu"
             id="dropdownMenu"
             v-click-outside="handleDropdownClosed"
             role="menu">
          <div class="dropdown-content">
            <a href="#"
               class="dropdown-item"
               @click.prevent="logout">
              Выйти
            </a>
          </div>
        </div>
      </div>

      <div class="guest-block"
           v-if="!userLoggedIn">
        <a href="/login"
           class="login-link ui-link">
          Вход
        </a>

        <button class="register-button button is-primary"
                @click="navToRegister">
          Регистрация
        </button>
      </div>
    </template>
  </div>
</template>

<script>
  import { mapState } from 'vuex';

  export default {
    name: "MainLayoutUserDropdown",
    data: () => ({
      isOpened: false,
      isLoading: false
    }),
    props: {
      userLoggedIn: {
        type: Boolean,
        default: false
      }
    },
    mounted() {
      if (this.userLoggedIn) {
        this.getUser();
      }
    },
    computed: {
      ...mapState({
        user: state => state.user,
      })
    },
    methods: {
      handleDropdownToggled() {
        this.isOpened = !this.isOpened;
      },
      handleDropdownClosed() {
        this.isOpened = false;
      },
      async getUser() {
        this.isLoading = true;

        await this.$store.dispatch('getUser');

        this.isLoading = false;
      },
      async logout() {
        const res = await this.$store.dispatch('logout');

        if (res.success) {
          location.href = '/login';
        }
      },
      navToRegister() {
        location.href = '/register';
      }
    }
  }
</script>

<style lang="scss" scoped>
  @import '../../../sass/variables';

  .loader-placeholder {
    width: 100px;
    border: none;
  }

  .dropdown {
    .button {
      border: none;

      .button-icon {
        margin-left: 10px;
        font-weight: 300;
      }

      .avatar {
        vertical-align: middle;
        width: 32px;
        height: 32px;
        border-radius: 50%;
        margin-right: 15px;
      }

      &.is-focused,
      &:focus {
        border: none;
        box-shadow: none;
      }
    }
  }

  .guest-block {
    display: flex;
    align-items: center;

    .login-link {
      font-size: 16px;
      font-weight: 300;
      margin-right: 15px;
    }

    .register-button {
      margin-left: 10px;

      &.is-primary {
        background-color: $primary-color;
      }
    }
  }
</style>
