<template>
    <div :class="cnReviewScreen('review')">
        <div :class="cnReviewScreen('review-header')">
            Отзывы на сайт <a :href='`https://${modelSearch.search.url}`'>{{ modelSearch.search.url }}</a>
        </div>
        <div v-if="modelReview.review.length == 0" :class="cnReviewScreen('review-list')">
            <div :class="cnReviewScreen('review-list_item')">
                Отзывов нет. Станьте первым!
            </div>
        </div>
        <div :class="cnReviewScreen('review-list')">
            <div v-for="review in modelReview.review" :key="review.id">
                <div v-for="user in modelAllUser.user" :key="user.id">
                    <div :class="cnReviewScreen('review-list_item')" v-if="review.user_id === user.id">
                        <div :class="cnReviewScreen('review-list_item_top')">
                            <div :class="cnReviewScreen('review-list_item_top_name')">
                                {{ user.name }}
                            </div>
                            <div :class="cnReviewScreen('review-list_item_top_grade')">
                                <div v-for="i in review.grade"
                                     :class="cnReviewScreen('review-list_item_top_grade_item')">
                                    ★
                                </div>
                            </div>

                            <div :class="cnReviewScreen('review-list_item_top_date')">
                                {{ formatDateTime(review.created_at) }}
                            </div>
                        </div>
                        <div :class="cnReviewScreen('review-list_item_top_description')">
                            {{ review.text }}
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnReviewScreen} from "./review-screen.const"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {reviewModel} from "@/screens/review-screen/review-screen.model"
import {allUserModel} from "@/screens/review-screen/all_user.model"

const modelAllUser = allUserModel()
const modelReview = reviewModel()
const modelSearch = searchModel()

function formatDateTime(dateTimeString) {
    const date = new Date(dateTimeString);
    const day = date.getDate();
    const month = date.getMonth() + 1;
    const year = date.getFullYear();
    const hours = date.getHours();
    const minutes = date.getMinutes();

    const formattedDate = `${day < 10 ? '0' + day : day}.${month < 10 ? '0' + month : month}.${`${year}`.slice(2, 4)}`;
    const formattedTime = `${hours < 10 ? '0' + hours : hours}:${minutes < 10 ? '0' + minutes : minutes}`;

    return `${formattedDate} ${formattedTime}`;
}
</script>

<style lang="scss" scoped>
.review-screen {
    &__review {
        padding: 35px 40px 35px 50px;
        margin: 70px 230px 60px;

        border-radius: 10px;
        background: rgb(255, 255, 255);

        &-header {
            color: rgb(191, 114, 25);
            font-size: 32px;
            font-weight: 700;
            line-height: 44px;

            margin: 0 0 60px;

            & a {
                color: rgb(191, 114, 25);
                font-size: 32px;
                font-weight: 700;
                line-height: 44px;
            }
        }

        &-list {

            &_item {
                margin: 30px 0;

                &:first-child {
                    margin: 0 0 30px;
                }

                &:last-child {
                    margin: 30px 0 0;
                }

                &_top {
                    display: flex;
                    align-items: center;

                    margin: 0 0 20px;

                    &_name {
                        color: rgb(95, 95, 95);
                        font-size: 26px;
                        font-weight: 700;
                        line-height: 44px;
                    }

                    &_grade {
                        display: flex;
                        align-items: center;
                        justify-content: center;

                        color: rgb(191, 114, 25);

                        margin: 0 0 0 50px;

                        font-size: 46px;
                        line-height: 46px;

                        &_item {
                            margin: 0 2px;

                            &:first-child {
                                margin: 0 2px 0 0;
                            }

                            &:last-child {
                                margin: 0 0 0 2px;
                            }
                        }
                    }

                    &_date {
                        color: rgb(95, 95, 95);
                        font-size: 24px;
                        font-weight: 400;
                        line-height: 27px;

                        margin: 0 0 0 auto;
                    }

                    &_description {
                        color: rgb(95, 95, 95);
                        font-size: 20px;
                        font-weight: 400;
                        line-height: 27px;
                    }
                }
            }
        }
    }
}
</style>
