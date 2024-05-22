<template>
    <div :class="cnFooter('top')">
        <div :class="cnFooter('top-logo')">
            <a href="/">
                <img src="../../../../public/assets/logo.png" :class="cnFooter('top-logo_img')">
            </a>
            <div :class="cnFooter('top-logo_description')">
                Сайт отзывов, где миллионы людей обмениваются полезным опытом.
            </div>
        </div>
        <div :class="cnFooter('top-list')">
            <a href="/" :class="cnFooter('top-list_link')">
                Помощь
            </a>
            <a href="/" :class="cnFooter('top-list_link')">
                О нас
            </a>
            <a href="/" :class="cnFooter('top-list_link')">
                Контакты
            </a>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnFooter} from "./footer.const.js";
</script>

<style lang="scss" scoped>
.footer {
    &__top {
        display: flex;
        justify-content: space-between;
        padding: 0 0 32.5px;

        border-bottom: 1px solid rgb(200, 200, 200);

        &-logo {

            &_img {
                width: 147px;
                height: 45px;
            }

            &_description {
                width: 284px;
                height: 44px;

                margin: 10px 0 0;

                color: rgb(105, 105, 105);
                font-size: 14px;
                font-weight: 400;
                line-height: 19px;
            }
        }

        &-list {
            display: flex;
            flex-direction: column;

            &_link {
                width: 100px;
                height: 18px;

                color: rgb(105, 105, 105);
                font-size: 14px;
                font-weight: 700;
                line-height: 19px;
                text-align: right;
                text-decoration: none;

                margin: 10px 0;

                &:first-child {
                    margin: 0;
                }

                &:last-child {
                    margin: 0;
                }
            }
        }
    }
}
</style>
