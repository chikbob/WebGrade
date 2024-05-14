<template>
    <div :class="cnIndexScreen('')">
        <div :class="cnIndexScreen('')">
            <input type="text" v-model="searchQuery" placeholder="Введите запрос">
            <button @click="search">Искать</button>
            <ul>
                <li v-for="site in searchResults" :key="site.id">
                    {{ site.name }}
                </li>
            </ul>
        </div>
        <div v-if="modelSearch.search != undefined && modelSearch.search != 'none'">
            <div v-for="site in modelSearch.search">
                {{ site }}
            </div>
        </div>
        <div v-else-if="modelSearch.search == undefined || modelSearch.search != 'none'">
            <div v-for="site in modelSite.site">
                {{ site }}
            </div>
        </div>
        <div v-else>
            <div v-if="modelSearch.search == 'none'">
                Сайт не найден!
            </div>
            <div v-for="site in modelSite.site">
                {{ site }}
            </div>
        </div>
        <div v-for="review in lastReview">
            <div v-for="site in modelSite.site">
                <div v-if="site.id == review.site_id">
                    <br>{{ site.url }}<br>{{ review.text }}<br>
                </div>
            </div>
        </div>
        <iframe
            src="https://yandex.ru/map-widget/v1/?um=constructor%3A16bd8fa0916976e071d011d83d0b80f80b83e40b5a5f615ec3a302227ac08d1b&amp;source=constructor"
            width="500" height="340" frameborder="0"></iframe>
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
import {cnIndexScreen} from './index-screen.const'
import {siteModel, reviewModel} from "./index-screen.model"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from './user.model'
import {ref} from 'vue';
import {Inertia} from '@inertiajs/inertia'
import {usePage} from '@inertiajs/inertia-vue3';
import {Link} from '@inertiajs/inertia-vue3'

const modelSite = siteModel()
const modelSearch = searchModel()
const modelUser = userModel()
const modelReview = reviewModel()

let searchValue = false;
const lastReview = modelReview.review.slice(-2)
const amountReview = modelReview.review.slice(-1)
const amountSite = modelSite.site.slice(-1)
console.log(amountReview[0].id)
console.log(amountSite[0].id)

const searchQuery = ref('');

const search = async () => {
    if (searchQuery.value.length < 1) {
    } else {
        searchValue = true;
        await Inertia.get('/search', {search: searchQuery.value});
    }
};

</script>

<style lang="scss" scoped>

</style>
