<template>
    <div :class="cnContactsScreen('')">
        <div :class="cnContactsScreen('card')">
            <div :class="cnContactsScreen('card-header')">
                Контакты
            </div>
            <div :class="cnContactsScreen('card-list')">
                <div :class="cnContactsScreen('card-list_item')">
                    <div :class="cnContactsScreen('card-list_item_label')">
                        Горячая линия
                    </div>
                    <div :class="cnContactsScreen('card-list_item_text')">
                        +7 949 777-23-52
                    </div>
                </div>
                <div :class="cnContactsScreen('card-list_item')">
                    <div :class="cnContactsScreen('card-list_item_label')">
                        Адрес офиса
                    </div>
                    <div :class="cnContactsScreen('card-list_item_text')">
                        г. Мариуполь, проспект Мира, 67
                    </div>
                </div>
                <div :class="cnContactsScreen('card-list_item')">
                    <div :class="cnContactsScreen('card-list_item_label')">
                        Карта
                    </div>
                    <iframe
                        :class="cnContactsScreen('card-list_item_map')"
                        src="https://yandex.ru/map-widget/v1/?um=constructor%3A16bd8fa0916976e071d011d83d0b80f80b83e40b5a5f615ec3a302227ac08d1b&amp;source=constructor"
                        width="500" height="340" frameborder="0">
                    </iframe>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnContactsScreen} from "./contacts-screen.const"
import {allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const modelAllSite = allSiteModel()
const modelUser = userModel()
const modelReview = allReviewModel()
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.contacts-screen {
    @include _1700 {

    }

    @include _1570 {

    }

    @include _1250 {
        &__card {
            margin: 74px 100px 64px !important;
            padding: 30px 52px 55px 60px;

            border-radius: 10px;
            background: rgb(255, 255, 255);

            &-header {
                color: rgb(191, 114, 25);
                font-size: 32px;
                font-weight: 700;
                line-height: 44px;

                margin: 0 0 44px;
            }

            &-list {

                &_item {
                    display: flex;
                    margin: 0 0 20px;

                    &:last-child {
                        margin: 0;
                    }

                    &_label {
                        width: 189px;

                        color: rgb(191, 114, 25);
                        font-size: 24px;
                        font-weight: 700;
                        line-height: 33px;

                        margin: 0 48px 0 0;
                    }

                    &_text {
                        color: rgb(51, 51, 51);
                        font-size: 24px;
                        font-weight: 700;
                        line-height: 33px;
                    }

                    &_map {
                        width: 400px !important;
                        height: 250px !important;
                    }
                }
            }
        }
    }

    @include _1170 {

    }

    @include _979 {
        &__card {
            margin: 74px 30px 64px !important;
            padding: 30px 52px 55px 60px;

            &-header {
                font-size: 32px;
                line-height: 44px;

                margin: 0 0 44px;
            }

            &-list {

                &_item {
                    display: flex;
                    flex-direction: column;

                    margin: 0 0 20px;

                    &:last-child {
                        margin: 0;
                    }

                    &_label {
                        width: 189px;

                        font-size: 24px;
                        line-height: 33px;

                        margin: 0 48px 0 0;
                    }

                    &_text {
                        font-size: 24px;
                        line-height: 33px;
                    }

                    &_map {
                        width: 100% !important;
                        height: 200px !important;
                    }
                }
            }
        }
    }

    @include _768 {

    }

    @include _600 {

    }

    @include _480 {
        &__card {
            margin: 74px 30px 64px !important;
            padding: 55px 52px 55px 60px !important;

            &-header {
                font-size: 1.8rem !important;
                line-height: 1.8rem !important;

                margin: 0 0 44px;
            }

            &-list {

                &_item {
                    display: flex;
                    flex-direction: column;

                    margin: 0 0 20px;

                    &:last-child {
                        margin: 0;
                    }

                    &_label {
                        width: 189px;

                        font-size: 1.4rem !important;
                        line-height: 2rem !important;

                        margin: 0 48px 0 0;
                    }

                    &_text {
                        font-size: 1.2rem !important;
                        line-height: 1.2rem !important;
                    }

                    &_map {
                        width: 100% !important;
                        height: 200px !important;
                    }
                }
            }
        }
    }

    @include _350 {

    }

    &__card {
        margin: 74px 230px 64px;
        padding: 30px 52px 55px 60px;

        border-radius: 10px;
        background: rgb(255, 255, 255);

        &-header {
            color: rgb(191, 114, 25);
            font-size: 32px;
            font-weight: 700;
            line-height: 44px;

            margin: 0 0 44px;
        }

        &-list {

            &_item {
                display: flex;
                margin: 0 0 20px;

                &:last-child {
                    margin: 0;
                }

                &_label {
                    width: 189px;

                    color: rgb(191, 114, 25);
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 33px;

                    margin: 0 48px 0 0;
                }

                &_text {
                    color: rgb(51, 51, 51);
                    font-size: 24px;
                    font-weight: 700;
                    line-height: 33px;
                }

                &_map {
                    width: 450px;
                    height: 250px;
                }
            }
        }
    }
}
</style>
