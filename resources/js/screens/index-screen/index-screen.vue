<template>
    <div :class="cnIndexScreen('')">
        <a href="/search">search</a>
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
                {{site}}
            </div>
        </div>
        <div v-else-if="modelSearch.search == undefined || modelSearch.search != 'none'">
            <div v-for="site in modelSite.site">
                {{site}}
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
    </div>
</template>

<script setup lang="ts">
import {cnIndexScreen} from './index-screen.const'
import {siteModel} from "../index-screen/index-screen.model"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {ref} from 'vue';
import {Inertia} from '@inertiajs/inertia'
import {usePage} from '@inertiajs/inertia-vue3';
import {Link} from '@inertiajs/inertia-vue3'

const modelSite = siteModel()
const modelSearch = searchModel()
let searchValue = false;

const searchQuery = ref('');

const search = async () => {
    if(searchQuery.value.length < 1) {

    }
    else {
        searchValue = true;
        await Inertia.get('/search', {search: searchQuery.value});
    }
};

</script>

<style lang="scss" scoped>

</style>
