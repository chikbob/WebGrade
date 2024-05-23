<template>
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
</template>

<script setup lang="ts">
import {cnIndexScreen} from './index-screen.const'
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

let searchValue = false;
const modelSearch = searchModel()
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
}
</style>
