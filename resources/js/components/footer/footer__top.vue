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
            <a href="/help" :class="cnFooter('top-list_link')">
                Помощь
            </a>
            <a href="/about" :class="cnFooter('top-list_link')">
                О нас
            </a>
            <a href="/contacts" :class="cnFooter('top-list_link')">
                Контакты
            </a>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnFooter} from "./footer.const.js";
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.footer {
    @include _1700 {

    }

    @include _1570 {

    }

    @include _1250 {

    }

    @include _1170 {

    }

    @include _979 {

    }

    @include _768 {

    }

    @include _600 {

    }

    @include _480 {
        &__top {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            padding: 0 0 32.5px;

            &-logo {
                display: flex;
                flex-direction: column;
                align-items: center;

                &_img {
                    width: 200px !important;
                    height: 60px !important;
                }

                &_description {
                    width: 250px !important;
                    height: 44px;
                    text-align: justify;

                    margin: 20px 0 20px !important;

                    font-size: 14px;
                    line-height: 19px;
                }
            }

            &-list {
                display: flex;
                flex-direction: row !important;
                justify-content: space-around;

                &_link {
                    width: 70px !important;
                    height: 18px;

                    font-size: 14px;
                    line-height: 19px;

                    margin: 0 !important;
                    text-align: center !important;

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

    @include _350 {
        &__top {
            display: flex;
            justify-content: space-between;
            flex-direction: column;
            padding: 0 0 32.5px;

            &-logo {
                display: flex;
                flex-direction: column;
                align-items: center;

                margin: 0 0 10px;

                &_img {
                    width: 200px !important;
                    height: 60px !important;
                }

                &_description {
                    width: 100% !important;
                    height: 44px;
                    text-align: justify;

                    margin: 20px 0 20px !important;

                    font-size: 14px;
                    line-height: 19px;
                }
            }

            &-list {
                display: flex;
                flex-direction: column !important;
                align-items: center;
                justify-content: space-around;

                &_link {
                    width: 70px !important;
                    height: 18px;

                    font-size: 14px;
                    line-height: 19px;

                    margin: 0 0 20px !important;
                    text-align: center !important;

                    &:first-child {
                        margin: 0 0 20px !important;
                    }

                    &:last-child {
                        margin: 0 !important;
                    }
                }
            }
        }
    }

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
