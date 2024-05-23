<template>
    <div :class="cnReviewScreen('')">
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
        <div :class="cnReviewScreen('add')">
            <div :class="cnReviewScreen('add-header')">
                Написать отзыв
            </div>
            <form :class="cnReviewScreen('add-review')" @submit.prevent="submit">
                <div :class="cnReviewScreen('add-review_grade')" class="rating-area">
                    <input v-model="grade" type="radio" id="star-5" name="rating" value="5">
                    <label for="star-5" title="Оценка «5»"></label>
                    <input v-model="grade" type="radio" id="star-4" name="rating" value="4">
                    <label for="star-4" title="Оценка «4»"></label>
                    <input v-model="grade" type="radio" id="star-3" name="rating" value="3">
                    <label for="star-3" title="Оценка «3»"></label>
                    <input v-model="grade" type="radio" id="star-2" name="rating" value="2">
                    <label for="star-2" title="Оценка «2»"></label>
                    <input v-model="grade" type="radio" id="star-1" name="rating" value="1">
                    <label for="star-1" title="Оценка «1»"></label>
                </div>
                <!--                <input v-model="grade" type="number" min="1" max="5" required>-->
                <textarea :class="cnReviewScreen('add-review_text')" id="text" v-model="text" type="text"
                          placeholder="Описание" required>
                </textarea>
                <button :class="cnReviewScreen('add-review_submit')" type="submit">Опубликовать</button>
            </form>
        </div>
        <div v-if="regUser" class="modal" @click="closeModal">
            <div class="modal-content" @click.stop>
                <h2>Модальное окно</h2>
                <p>Содержимое модального окна...</p>
                <div>
                    <Link href="/login">Войти</Link>
                    <br>
                    <Link href="/register">Зарегистрироваться</Link>
                </div>
                <br>
                <button @click="regUser = false" class="close-button">Закрыть</button>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "@/screens/index-screen/user.model"
import {reviewModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {allUserModel} from "@/screens/review-screen/all_user.model"
import {cnReviewScreen} from "./review-screen.const"
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from '@inertiajs/inertia'
import {ref} from 'vue';

const modelSearch = searchModel()
const modelUser = userModel()
const modelReview = reviewModel()
const modelAllUser = allUserModel()
const modelAllReview = allReviewModel()

let grade = ref()
let text = ref('')
let regUser = ref<boolean>(false);

function submit() {
    if (modelUser.user === null) {
        regUser.value = true;
    } else {
        const formData = {
            site_id: modelSearch.search.id,
            user_id: modelUser.user.id,
            grade: grade.value,
            text: text.value,
            url: modelSearch.search.url,
        }
        Inertia.post('review', formData)
        return formData
    }
}

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

    &__add {
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        padding: 36px 50px 29px;
        margin: 0 230px 60px;

        border-radius: 10px;
        background: rgb(255, 255, 255);

        &-header {
            color: rgb(191, 114, 25);
            font-size: 32px;
            font-weight: 700;
            line-height: 44px;
        }

        &-review {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: flex-start;

            &_grade {
                display: flex;
                flex-direction: row-reverse;
                justify-content: flex-end;

                margin: 37px 0;
            }

            &_text {
                width: 100%;
                height: 131px;

                color: rgb(149, 149, 149);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;
                resize: none;

                padding: 15px 15px 12px 12px;
                margin: 0 0 15px;

                border: 0;
                border-radius: 5px;
                background: rgb(245, 245, 247);
            }

            &_submit {
                width: 200px;
                height: 50px;

                color: rgb(249, 249, 249);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;
                margin: 30px auto 0;

                border: 0;
                border-radius: 5px;
                background: rgb(198, 141, 76);
            }
        }
    }
}


.modal {
    display: block;
    position: fixed;
    top: 0;
    left: 0;
    background-color: rgba(0, 0, 0, 0.5);
    z-index: 9999;
}

.modal-content {
    position: absolute;
    width: 50%;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
}

.close-button {
    background-color: #ccc;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

.rating-area {
    overflow: hidden;
    width: 265px;
}

.rating-area:not(:checked) > input {
    display: none;
}

.rating-area:not(:checked) > label {
    float: right;
    width: 42px;
    padding: 0;
    cursor: pointer;
    font-size: 46px;
    line-height: 46px;
    color: lightgrey;
}

.rating-area:not(:checked) > label:before {
    content: '★';
}

.rating-area > input:checked ~ label {
    color: rgb(191, 114, 25);
}

.rating-area:not(:checked) > label:hover,
.rating-area:not(:checked) > label:hover ~ label {
    color: rgb(191, 114, 25);
}

.rating-area > input:checked + label:hover,
.rating-area > input:checked + label:hover ~ label,
.rating-area > input:checked ~ label:hover,
.rating-area > input:checked ~ label:hover ~ label,
.rating-area > label:hover ~ input:checked ~ label {
    color: rgb(191, 114, 25);
}

.rate-area > label:active {
    position: relative;
}

.rating-result {
    width: 265px;
    margin: 0 auto;
}

.rating-result span {
    padding: 0;
    font-size: 32px;
    margin: 0 3px;
    line-height: 1;
}

.rating-result > span:before {
    content: '★';
}

.rating-result > span.active {
    color: rgb(191, 114, 25);
}
</style>
