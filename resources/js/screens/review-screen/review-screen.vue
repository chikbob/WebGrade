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
                        <br>
                    </div>
                </div>
            </div>
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
import {reviewModel} from "@/screens/review-screen/review-screen.model"
import {allUserModel} from "@/screens/review-screen/all_user.model"
import {Link} from "@inertiajs/inertia-vue3";
import {Inertia} from '@inertiajs/inertia'
import {ref} from 'vue';

const modelSearch = searchModel()
const modelUser = userModel()
const modelReview = reviewModel()
const modelAllUser = allUserModel()

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
</style>
