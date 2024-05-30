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
    if (searchQuery.value.length < 1) {
    } else {
        searchValue = true;
        await Inertia.get('/search', {search: searchQuery.value});
        let timerInterval;
        Swal.fire({
            title: "Поиск",
            html: "Подождите...",
            timer: 2000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading();
                const timer = Swal.getPopup().querySelector("b");
                timerInterval = setInterval(() => {
                    timer.textContent = `${Swal.getTimerLeft()}`;
                }, 100);
            },
            willClose: () => {
                clearInterval(timerInterval);
            }
        }).then((result) => {
        });
    }
};
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.index-screen {
    @include _1700 {

    }

    @include _1570 {
        &__search {
            margin: 65px 230px;
            padding: 48px 0 137px !important;
            height: 373px;

            &-header {
                width: 208px;
                height: 44px;

                font-size: 32px;
                font-weight: 700;
            }

            &-site {

                &_input {
                    width: 350px;
                    height: 50px;

                    padding: 0 0 0 13px;
                    margin: 0 34px 0 0;

                    font-size: 16px;
                    line-height: 22px;
                }

                &_button {
                    width: 150px;
                    height: 50px;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _1250 {

    }

    @include _1170 {
        &__search {
            justify-content: space-around !important;

            margin: 65px auto !important;
            padding: 48px 0 100px !important;
            width: 650px !important;
            height: 450px !important;

            &-header {
                width: 208px;
                height: 44px;

                font-size: 32px;
                font-weight: 700;
            }

            &-site {
                display: flex;
                align-items: center !important;
                flex-direction: column !important;

                &_input {
                    width: 350px;
                    height: 50px;

                    padding: 0 0 0 13px;
                    margin: 0 0 15px !important;

                    font-size: 16px;
                    line-height: 22px;
                }

                &_button {
                    width: 150px;
                    height: 50px;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _979 {
        &__search {
            justify-content: space-around !important;

            margin: 65px auto !important;
            padding: 20px 0 60px !important;
            width: 450px !important;
            height: 350px !important;

            &-header {
                width: 208px;
                height: 44px;

                font-size: 32px;
                font-weight: 700;
            }

            &-site {
                display: flex;
                align-items: center !important;
                flex-direction: column !important;

                &_input {
                    width: 300px !important;
                    height: 50px;

                    padding: 0 0 0 13px;
                    margin: 0 0 25px !important;

                    font-size: 16px;
                    line-height: 22px;
                }

                &_button {
                    width: 150px;
                    height: 50px;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _768 {

    }

    @include _600 {

    }

    @include _480 {
        &__search {
            justify-content: space-around !important;

            margin: 65px auto !important;
            padding: 20px 0 20px !important;
            width: 300px !important;
            height: 225px !important;

            &-header {
                width: 208px;
                height: 44px;

                font-size: 1.4rem !important;
                font-weight: 700;
            }

            &-site {
                display: flex;
                align-items: center !important;
                flex-direction: column !important;

                &_input {
                    width: 200px !important;
                    height: 30px !important;

                    padding: 0 0 0 13px;
                    margin: 0 0 25px !important;

                    font-size: .7rem !important;
                    line-height: 22px;
                }

                &_button {
                    width: 100px !important;
                    height: 40px !important;

                    font-size: .9rem !important;
                    line-height: 22px;
                }
            }
        }
    }

    @include _350 {

    }

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
            text-align: center;

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
