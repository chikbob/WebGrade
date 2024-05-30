<template>
    <div :class="cnIndexScreen('review')">
        <div :class="cnIndexScreen('review-list')" v-for="review in lastReview">
            <div v-for="site in modelAllSite.site">
                <div :class="cnIndexScreen('review-list_card')" v-if="site.id == review.site_id">
                    <div :class="cnIndexScreen('review-list_card_header')">
                        <div :class="cnIndexScreen('review-list_card_header_url')">
                            {{ site.url }}
                        </div>
                        <div :class="cnIndexScreen('review-list_card_header_grade')">
                            <div v-for="i in review.grade"
                                 :class="cnIndexScreen('review-list_card_header_grade_outside')">
                                <div :class="cnIndexScreen('review-list_card_header_grade_icon')">★</div>
                            </div>
                        </div>
                    </div>
                    <div v-if="review.text.length >= 100" :class="cnIndexScreen('review-list_card_description')">
                        {{ review.text.substring(0, review.text.length - review.text.length + 100) + "..." }}
                    </div>
                    <div v-else :class="cnIndexScreen('review-list_card_description')">
                        {{ review.text }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnIndexScreen} from './index-screen.const'
import {allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"

const modelReview = allReviewModel()
const modelAllSite = allSiteModel()

const lastReview = modelReview.review.slice(-3)
const amountReview = modelReview.review.slice(-1)
const amountSite = modelAllSite.site.slice(-1)
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.index-screen {
    @include _1700 {
        &__review {
            display: flex;
            flex-direction: column-reverse !important;

            padding: 0 !important;
            margin: 0 0 35px !important;

            &-list {
                justify-content: center !important;

                &_card {
                    width: 450px;
                    height: 200px;
                    padding: 24px 60px 20px 55px;
                    margin: 0 0 30px;

                    &_header {
                        margin: 0 0 25px;

                        &_url {
                            font-size: 24px;
                            font-weight: 700;
                            line-height: 44px;
                        }

                        &_grade {
                            &_icon {
                                width: 25px;
                                height: 25px;
                                font-size: 24px;
                            }

                            &_outside {

                            }
                        }
                    }

                    &_description {
                        width: 100%;
                        height: 79.13px;

                        font-size: 16px;
                        font-weight: 700;
                        line-height: 22px;
                    }
                }
            }
        }
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
        &__review {
            display: flex;
            flex-direction: column-reverse !important;

            padding: 0 !important;
            margin: 0 0 35px !important;

            &-list {
                justify-content: center !important;

                &_card {
                    width: 300px !important;
                    height: 150px !important;
                    padding: 10px 30px 20px 30px !important;
                    margin: 0 0 30px;

                    &_header {
                        margin: 0 0 25px;

                        &_url {
                            font-size: 1.2rem !important;
                            font-weight: 700;
                            line-height: 44px;
                        }

                        &_grade {
                            &_icon {
                                width: auto !important;
                                height: auto !important;
                                font-size: 1.2rem !important;
                            }

                            &_outside {

                            }
                        }
                    }

                    &_description {
                        width: 100%;
                        height: auto !important;

                        font-size: .8rem !important;
                        font-weight: 700;
                        line-height: .8rem !important;
                    }
                }
            }
        }
    }

    @include _350 {

    }

    &__review {
        display: flex;
        justify-content: space-between;
        flex-direction: row-reverse;

        padding: 0 230px;
        margin: 0 0 65px;

        &-list {
            display: flex;
            justify-content: space-between;

            &_card {
                width: 450px;
                height: 200px;
                padding: 24px 60px 20px 55px;

                border-radius: 10px;
                background: rgb(255, 255, 255);

                &_header {
                    display: flex;
                    align-items: center;
                    justify-content: space-between;

                    margin: 0 0 25px;

                    &_url {
                        color: rgb(191, 114, 25);
                        font-size: 24px;
                        font-weight: 700;
                        line-height: 44px;
                    }

                    &_grade {
                        display: flex;

                        &_icon {
                            display: flex;
                            align-items: center;
                            justify-content: center;

                            width: 25px;
                            height: 25px;
                            font-size: 24px;

                            color: rgb(191, 114, 25);
                        }

                        &_outside {

                        }
                    }
                }

                &_description {
                    width: 100%;
                    height: 79.13px;

                    color: rgb(105, 105, 105);
                    font-size: 16px;
                    font-weight: 700;
                    line-height: 22px;

                    text-align: justify;
                }


            }
        }
    }
}
</style>
