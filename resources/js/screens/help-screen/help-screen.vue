<template>
    <div :class="cnHelpScreen('')">
        <div :class="cnHelpScreen('card')">
            <div :class="cnHelpScreen('card-header')">
                Ответы на частые вопросы
            </div>
            <div :class="cnHelpScreen('card-list')">
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        Здесь платят за отзывы?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        Нет, в данный момент монетизация не присутствует на сайте
                    </div>
                </div>
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        Как часто обновляется статистика?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        Статистика обновляется раз в сутки
                    </div>
                </div>
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        У вас есть реферальная программа?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        Нет, но она планируется в ближайшем будущем
                    </div>
                </div>
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        Где я могу оставлять ссылки на свои отзывы?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        Вы можете публиковать ссылки на свои отзывы на ваших страницах в соцсетях и в любых обсуждениях
                        по теме отзыва. Распространять ссылки посредством спама категорически запрещено.
                    </div>
                </div>
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        Что будет, если я скопирую текст с другого сайта? А если перепишу чужой текст своими словами?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        Вы можете публиковать ссылки на свои отзывы на ваших страницах в соцсетях и в любых обсуждениях
                        по теме отзыва. Распространять ссылки посредством спама категорически запрещено.
                    </div>
                </div>
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        Как отредактировать свой отзыв?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        В данный момент - это невозможно
                    </div>
                </div>
                <div :class="cnHelpScreen('card-list_item')">
                    <div :class="cnHelpScreen('card-list_item_label')">
                        Остались вопросы?
                    </div>
                    <div :class="cnHelpScreen('card-list_item_description')">
                        Задавайте их на нашу горячую линию
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnHelpScreen} from "./help-screen.const"
import {allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const modelAllSite = allSiteModel()
const modelUser = userModel()
const modelReview = allReviewModel()
</script>

<style lang="scss" scoped>
.help-screen {
    &__card {
        margin: 74px 230px 64px;
        padding: 30px 52px 48px 60px;

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

                &_label {
                    color: rgb(51, 51, 51);
                    font-size: 28px;
                    font-weight: 600;
                    line-height: 38px;
                }

                &_description {
                    color: rgb(105, 105, 105);
                    font-size: 24px;
                    font-weight: 600;
                    line-height: 33px;

                    margin: 20px 0 44px;
                }
            }
        }
    }
}
</style>
