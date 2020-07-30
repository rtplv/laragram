<template>
    <div class="dropdown"
         :class="{ 'is-active': isOpened }">
        <div class="dropdown-trigger" @click="handleDropdownOpened">
            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                <img class="avatar" src="assets/avatar.jpg"/>
                <span>Руслан Туполев</span>
            </button>
        </div>

        <div class="dropdown-menu"
             id="dropdownMenu"
             role="menu">
            <div class="dropdown-content">
                <a href="#"
                   class="dropdown-item">
                    Выйти
                </a>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "MainLayoutUserDropdown",
        data: () => ({
           isOpened: false,
        }),
        methods: {
            handleDropdownOpened() {
                this.isOpened = !this.isOpened;
            }
        }
    }
</script>

<style lang="scss" scoped>
    @import '../../../../sass/variables';

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
</style>
