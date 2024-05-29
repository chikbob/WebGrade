<template>
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
            <textarea :class="cnReviewScreen('add-review_text')" id="text" v-model="text" type="text"
                      placeholder="Описание" required>
                </textarea>
            <button :class="cnReviewScreen('add-review_submit')" type="submit">Опубликовать</button>
        </form>
    </div>
</template>

<script setup lang="ts">
import {cnReviewScreen} from "./review-screen.const"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "../../screens/index-screen/user.model"
import {ref} from "vue";
import {Link} from '@inertiajs/inertia-vue3'
import {Inertia} from "@inertiajs/inertia";

const modelSearch = searchModel()
const modelUser = userModel();

let grade = ref()
let text = ref('')
let regUser = ref<boolean>(false);

function submit() {
    if (modelUser.user === null) {
        regUser.value = true;
        Swal.fire({
            icon: "error",
            title: "Упс...",
            text: "Войдите или зарегистрируйтесь"
        });
    } else {
        const formData = {
            site_id: modelSearch.search.id,
            user_id: modelUser.user.id,
            grade: grade.value,
            text: text.value,
            url: modelSearch.search.url,
        }
        Inertia.post('review', formData)
        Swal.fire({
            position: "top-end",
            icon: "success",
            title: "Ваш отзыв был добавлен!",
            html: "Перезагрузите страницу",
            showConfirmButton: false,
            timer: 3000
        });
        return formData
    }
}
</script>

<style lang="scss" scoped>
.review-screen {
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
