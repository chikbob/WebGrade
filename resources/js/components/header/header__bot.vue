<template>
    <div :class="cnHeader('bot')">
        <a href="/">
            <img src="../../../../public/assets/logo.png" :class="cnHeader('bot-img')">
        </a>
        <div :class="cnHeader('bot-list')">
            <div :class="cnHeader('bot-list_sites')">
                <div :class="cnHeader('bot-list_sites_number')">
                    {{ amountSite[0].id }}
                </div>
                <div :class="cnHeader('bot-list_sites_text')">
                    сайтов
                </div>
            </div>
            <div :class="cnHeader('bot-list_sites')">
                <div :class="cnHeader('bot-list_sites_number')">
                    {{ amountReview[0].id }}
                </div>
                <div :class="cnHeader('bot-list_sites_text')">
                    отзывов
                </div>
            </div>
        </div>
        <button :class="cnHeader('bot-button')" href="">Найти сайт</button>
    </div>
</template>

<script setup lang="ts">
import {cnHeader} from "./header.const.js";
import {allSiteModel} from "@/screens/review-screen/review-screen.model"
import {reviewModel} from "../../screens/index-screen/index-screen.model"

const modelAllSite = allSiteModel()
const modelReview = reviewModel()
const amountReview = modelReview.review.slice(-1)
const amountSite = modelAllSite.site.slice(-1)
</script>

<style lang="scss" scoped>
.header {
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
