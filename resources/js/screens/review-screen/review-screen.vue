<template>
    <div>
        <div>
            Отзывы на сайт {{ modelSearch.search.url }}
        </div>
        <br>
        <div>
            <div v-for="review in modelReview.review" :key="review.id">
                <div v-for="user in modelAllUser.user" :key="user.id">
                    <div v-if="review.user_id === user.id">
                        <div>
                            {{ user.name }}
                        </div>
                        <div>
                            {{ review.text }}
                        </div>
                        <div>
                            {{ review.grade }}
                        </div>
                        <div>
                            {{ formatDateTime(review.created_at) }}
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="rating-area">
            <input type="radio" id="star-5" name="rating" value="5">
            <label for="star-5" title="Оценка «5»"></label>
            <input type="radio" id="star-4" name="rating" value="4">
            <label for="star-4" title="Оценка «4»"></label>
            <input type="radio" id="star-3" name="rating" value="3">
            <label for="star-3" title="Оценка «3»"></label>
            <input type="radio" id="star-2" name="rating" value="2">
            <label for="star-2" title="Оценка «2»"></label>
            <input type="radio" id="star-1" name="rating" value="1">
            <label for="star-1" title="Оценка «1»"></label>
        </div>
        <br>
        <div class="rating-result">
            <span class="active"></span>
            <span class="active"></span>
            <span class="active"></span>
            <span></span>
            <span></span>
        </div>
        <form @submit.prevent="submit">
            <label for="grade">Grade:</label>
            <input id="grade" v-model="grade" type="number" min="1" max="5" required>
            <br>
            <label for="text">Text:</label>
            <input id="text" v-model="text" type="text" required>

            <button type="submit">Post</button>
        </form>
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
        <div>
            <div v-if="modelUser.user == null">
                <Link href="/login">Логин</Link>
                <br>
                <Link href="/register">Регистрация</Link>
            </div>
            <div v-else>
                <div>Приветствую, {{ modelUser.user.name }}</div>
                <Link href="/logout">Выйти</Link>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "@/screens/index-screen/user.model"
import {reviewModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {allUserModel} from "@/screens/review-screen/all_user.model"
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
    margin: 0 auto;
}
.rating-area:not(:checked) > input {
    display: none;
}
.rating-area:not(:checked) > label {
    float: right;
    width: 42px;
    padding: 0;
    cursor: pointer;
    font-size: 32px;
    line-height: 32px;
    color: lightgrey;
    text-shadow: 1px 1px #bbb;
}
.rating-area:not(:checked) > label:before {
    content: '★';
}
.rating-area > input:checked ~ label {
    color: gold;
    text-shadow: 1px 1px #c60;
}
.rating-area:not(:checked) > label:hover,
.rating-area:not(:checked) > label:hover ~ label {
    color: gold;
}
.rating-area > input:checked + label:hover,
.rating-area > input:checked + label:hover ~ label,
.rating-area > input:checked ~ label:hover,
.rating-area > input:checked ~ label:hover ~ label,
.rating-area > label:hover ~ input:checked ~ label {
    color: gold;
    text-shadow: 1px 1px goldenrod;
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
    color: lightgrey;
    text-shadow: 1px 1px #bbb;
}
.rating-result > span:before {
    content: '★';
}
.rating-result > span.active {
    color: gold;
    text-shadow: 1px 1px #c60;
}
</style>
