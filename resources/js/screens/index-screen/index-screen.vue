<template>
    <div :class="cnIndexScreen('')">
        <div :class="cnIndexScreen('search')">
            <div :class="cnIndexScreen('search-header')">
                Поиск сайта
            </div>
            <div :class="cnIndexScreen('search-header_error')" v-if="modelSearch.search == 'none'">
                Сайт не найден!
            </div>
            <div :class="cnIndexScreen('search-site')">
                <input :class="cnIndexScreen('search-site_input')" type="text" v-model="searchQuery"
                       placeholder="Введите запрос">
                <button :class="cnIndexScreen('search-site_button')"
                        v-if="searchQuery.length == 0 || searchQuery == 'none'">Искать
                </button>
                <button :class="cnIndexScreen('search-site_button')" v-else @click="search">Найти сайт</button>
            </div>
        </div>
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
        <!--        <iframe-->
        <!--            src="https://yandex.ru/map-widget/v1/?um=constructor%3A16bd8fa0916976e071d011d83d0b80f80b83e40b5a5f615ec3a302227ac08d1b&amp;source=constructor"-->
        <!--            width="500" height="340" frameborder="0">-->
        <!--        </iframe>-->
    </div>
</template>

<script setup lang="ts">
import {cnIndexScreen} from './index-screen.const'
import {reviewModel} from "./index-screen.model"
import {allSiteModel} from "@/screens/review-screen/review-screen.model"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from './user.model'
import {ref} from 'vue';
import {Inertia} from '@inertiajs/inertia'
import {usePage} from '@inertiajs/inertia-vue3';
import {Link} from '@inertiajs/inertia-vue3'
import PageLayout from "@/components/layouts/page-layout/page-layout.vue";

const modelAllSite = allSiteModel()
const modelSearch = searchModel()
const modelUser = userModel()
const modelReview = reviewModel()

let searchValue = false;
const lastReview = modelReview.review.slice(-2)
const amountReview = modelReview.review.slice(-1)
const amountSite = modelAllSite.site.slice(-1)

const searchQuery = ref('');

const search = async () => {
    console.log(searchQuery.value)
    if (searchQuery.value.length < 1) {
    } else {
        searchValue = true;
        await Inertia.get('/search', {search: searchQuery.value});
    }
};

</script>

<style lang="scss" scoped>
.index-screen {
    &__search {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        align-items: center;

        margin: 65px 230px;
        padding: 48px 235px 137px 211px;
        height: 373px;

        border-radius: 10px;

        background: rgb(255, 255, 255);

        &-header {
            width: 208px;
            height: 44px;

            color: rgb(191, 114, 25);
            font-size: 32px;
            font-weight: 700;

            &_error {
                color: rgb(213, 51, 51);
            }
        }

        &-site {

            &_input {
                width: 350px;
                height: 50px;

                border-radius: 5px;
                background: rgb(245, 245, 247);

                padding: 0 0 0 13px;
                margin: 0 34px 0 0;

                border: 0;
                color: rgb(149, 149, 149);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;
            }

            &_button {
                width: 150px;
                height: 50px;

                color: rgb(249, 249, 249);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;

                border-radius: 5px;
                background: rgb(198, 141, 76);
                border: 0;
            }
        }
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
                    width: 337.33px;
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
