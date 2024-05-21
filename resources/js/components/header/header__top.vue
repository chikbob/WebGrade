<template>
    <div :class="cnHeader('top')">
        <div :class="cnHeader('top-list')">
            <Link href="" :class="cnHeader('top-list_link')">
                Помощь
            </Link>
            <Link href="" :class="cnHeader('top-list_link')">
                О нас
            </Link>
            <Link href="" :class="cnHeader('top-list_link')">
                Контакты
            </Link>
        </div>
        <div v-if="modelUser.user == null || logout == true" :class="cnHeader('top-logout')">
            <Link href="/login" :class="cnHeader('top-logout_log')">
                Войти
            </Link>
            или
            <Link href="/register" :class="cnHeader('top-logout_reg')">
                зарегистрироваться
            </Link>
        </div>
        <div v-else :class="cnHeader('top-user')">
            <div :class="cnHeader('top-user_text')">
                Приветсвтую, {{ modelUser.user.name }}
            </div>
            <Link @click="exit()" href="/logout" method="post" :class="cnHeader('top-user_exit')">
                Выйти
            </Link>
        </div>

    </div>
</template>

<script setup lang="ts">
import {cnHeader} from "./header.const.js";
import {userModel} from "../../screens/index-screen/user.model"
import {Link} from '@inertiajs/inertia-vue3'
import {ref} from "vue"

const modelUser = userModel();

let logout = ref(false)

function exit() {
    let timerInterval;
    Swal.fire({
        title: "Выходим из аккаунта",
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
    });

    return logout = true
}
</script>

<style lang="scss" scoped>
.header {
    &__top {
        display: flex;
        justify-content: space-between;
        align-items: center;

        height: 40px;

        &-list {
            display: flex;
            align-items: center;

            &_link {
                display: flex;

                color: rgb(147, 147, 147);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;
                text-decoration: none;

                margin: 0 26px 0;

                &:first-child {
                    margin: 0;
                }

                &:last-child {
                    margin: 0;
                }
            }
        }

        &-user {
            display: flex;
            align-items: center;

            &_text {
                color: rgb(147, 147, 147);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;

                margin: 0 10px 0 0;
            }

            &_exit {
                color: rgb(30, 30, 30);
                font-size: 16px;

                text-decoration: none;
            }
        }

        &-logout {
            color: rgb(147, 147, 147);
            font-size: 16px;
            font-weight: 600;
            line-height: 22px;

            &_log {
                color: rgb(147, 147, 147);
                text-decoration: none;
            }

            &_reg {
                color: rgb(147, 147, 147);
                text-decoration: none;
            }
        }
    }
}
</style>
