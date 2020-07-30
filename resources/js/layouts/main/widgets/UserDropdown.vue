<template>
    <div class="dropdown"
         :class="{ 'is-active': isOpened }">
        <div class="dropdown-trigger" @click="handleDropdownOpened">
            <button class="button" aria-haspopup="true" aria-controls="dropdown-menu">
                <span>Руслан Туполев</span>

                <i class="button-icon fas fa-angle-down" aria-hidden="true" />
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
    .dropdown {
        .button {
            border: none;
            &.is-focused,
            &:focus {
                border: none;
                box-shadow: none;
            }
            .button-icon {
                margin-left: 10px;
                font-weight: 300;
            }
        }
    }
</style>
