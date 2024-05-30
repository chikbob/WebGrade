<template>
    <div :class="cnHeader('bot')">
        <Link href="/">
            <img src="../../../../public/assets/logo.png" :class="cnHeader('bot-img')">
        </Link>
        <div :class="cnHeader('bot-list')">
            <div :class="cnHeader('bot-list_sites')">
                <div :class="cnHeader('bot-list_sites_number')">
                    {{ amountSite[0].id }}
                </div>
                <div :class="cnHeader('bot-list_sites_text')">
                    сайт(ов)
                </div>
            </div>
            <div :class="cnHeader('bot-list_sites')">
                <div :class="cnHeader('bot-list_sites_number')">
                    {{ amountReview[0].id }}
                </div>
                <div :class="cnHeader('bot-list_sites_text')">
                    отзыв(ов)
                </div>
            </div>
        </div>
        <Link href="/">
            <button :class="cnHeader('bot-button')">Найти сайт</button>
        </Link>
    </div>
</template>

<script setup lang="ts">
import {cnHeader} from "./header.const.js";
import {allSiteModel} from "@/screens/review-screen/review-screen.model"
import {allReviewModel} from "@/screens/review-screen/review-screen.model"
import {Link} from '@inertiajs/inertia-vue3'

const modelAllSite = allSiteModel()
const modelReview = allReviewModel()
const amountReview = modelReview.review.slice(-1)
const amountSite = modelAllSite.site.slice(-1)
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.header {
    @include _1700 {

    }

    @include _1570 {
        &__bot {
            height: 70px;

            &-list {
                display: flex;

                &_sites {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;

                    &:first-child {
                        margin: 0 60px 0 0 !important;
                    }

                    &_number {
                        display: flex;
                        align-items: center;

                        width: 100px;
                        height: 32px;

                        font-size: 32px;
                    }

                    &_text {
                        display: flex;
                        align-items: center;

                        width: 68px;
                        height: 15px;

                        font-size: 14px;
                    }

                }
            }

            &-img {
                width: 193px;
                height: 59px;
            }

            &-button {
                width: 130px;
                height: 40px;

                margin: 0 40px 0 0;

                font-size: 14px;
            }
        }
    }

    @include _1250 {

    }

    @include _1170 {
        &__bot {
            height: 70px;

            &-list {
                display: flex;

                &_sites {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;

                    &:first-child {
                        margin: 0 60px 0 0 !important;
                    }

                    &_number {
                        display: flex;
                        align-items: center;

                        width: 100px;
                        height: 32px;

                        font-size: 32px;
                    }

                    &_text {
                        display: flex;
                        align-items: center;

                        width: 68px;
                        height: 15px;

                        font-size: 14px;
                    }

                }
            }

            &-img {
                width: 193px;
                height: 59px;
            }

            &-button {
                width: 130px;
                height: 40px;

                margin: 0 40px 0 0;

                font-size: 14px;
            }
        }
    }

    @include _979 {
        &__bot {
            height: 70px;

            &-list {
                display: flex;

                &_sites {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;

                    &:first-child {
                        margin: 0 !important;
                    }

                    &_number {
                        display: flex;
                        align-items: center;

                        width: 100px;
                        height: 32px;

                        font-size: 32px;
                    }

                    &_text {
                        display: flex;
                        align-items: center;

                        width: 68px;
                        height: 15px;

                        font-size: 14px;
                    }

                }
            }

            &-img {
                width: 193px;
                height: 59px;
            }

            &-button {
                width: 130px;
                height: 40px;

                margin: 0 40px 0 0;

                font-size: 14px;
            }
        }
    }

    @include _768 {
        &__bot {
            display: flex;
            flex-direction: column;
            align-items: center;

            height: auto !important;

            &-list {
                display: flex;
                flex-direction: row;

                margin: 25px 0 !important;

                &_sites {
                    display: flex;
                    flex-direction: column;
                    justify-content: center;
                    align-items: center;

                    &:first-child {
                        margin: 0 !important;
                    }

                    &_number {
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        width: 100px;
                        height: 32px;

                        font-size: 32px;
                    }

                    &_text {
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        width: 68px;
                        height: 15px;

                        font-size: 14px;
                    }

                }
            }

            &-img {
                width: 193px;
                height: 59px;
            }

            &-button {
                width: 130px;
                height: 40px;

                margin: 0 !important;

                font-size: 14px;

                border-radius: 5px;
                border: 0;
            }
        }
    }

    @include _600 {

    }

    @include _480 {

    }

    @include _350 {

    }

    &__bot {
        display: flex;
        align-items: center;
        justify-content: space-between;

        height: 70px;

        &-list {
            display: flex;

            &_sites {
                display: flex;
                flex-direction: column;
                justify-content: center;

                &:first-child {
                    margin: 0 120px 0 0;
                }

                &_number {
                    display: flex;
                    align-items: center;

                    width: 100px;
                    height: 32px;

                    color: rgb(191, 114, 25);
                    font-size: 32px;
                    font-weight: 600;
                }

                &_text {
                    display: flex;
                    align-items: center;

                    width: 68px;
                    height: 15px;

                    color: rgb(74, 74, 74);
                    font-size: 14px;
                    font-weight: 600;
                }

            }
        }

        &-img {
            width: 193px;
            height: 59px;
        }

        &-button {
            width: 130px;
            height: 40px;

            margin: 0 40px 0 0;

            color: rgb(249, 249, 249);
            font-size: 14px;
            font-weight: 600;

            border-radius: 5px;
            border: 0;
            background: rgb(198, 141, 76);
        }
    }
}
</style>
