<template>
    <div :class="cnRegisterScreen('')">
        <div :class="cnRegisterScreen('register')">
            <div :class="cnRegisterScreen('register-header')">
                Регистрация
            </div>
            <form :class="cnRegisterScreen('register-form')" @submit.prevent="registerUser">
                <div :class="cnRegisterScreen('register-form_error')" v-if="showErrorMessage">
                    {{ showMessage() }}
                </div>
                <div :class="cnRegisterScreen('register-form_input')">
                    <input :class="cnRegisterScreen('register-form_input_input')" type="text" id="name"
                           v-model="form.name" placeholder="Имя" required>
                </div>
                <div :class="cnRegisterScreen('register-form_input')">
                    <input :class="cnRegisterScreen('register-form_input_input')" type="email" id="email"
                           v-model="form.email" placeholder="Почта" required>
                </div>
                <div :class="cnRegisterScreen('register-form_input')">
                    <input :class="cnRegisterScreen('register-form_input_input')" type="password" id="password"
                           v-model="form.password" placeholder="Пароль" required>
                </div>
                <button :class="cnRegisterScreen('register-form_submit')" type="submit" @click="timeoutFunction"
                        :disabled="!isFormValid">
                    Зарегистрироваться
                </button>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnRegisterScreen} from "./register-screen.const"
import {computed, defineProps, ref} from 'vue'
import {useStore} from 'pinia'
import {Inertia} from '@inertiajs/inertia'

const form = ref({
    name: '',
    email: '',
    password: ''
})

const isFormValid = computed(() => {
    return form.value.email.length > 5 && form.value.password.length >= 6;
});

let errorMessage = ref('');
let showErrorMessage = ref(false);

function registerUser() {
    try {
        showErrorMessage.value = false
        Inertia.post('/register/success', form.value)
        let timerInterval;
        Swal.fire({
            title: "Создаем аккаунт",
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
    } catch (err) {
    }
}

function showMessage() {
    return errorMessage.value = 'Такой пользователь уже существует!'
}

function timeoutFunction() {
    return setTimeout(() => {
        showErrorMessage.value = true
    }, 2000);
}
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.register-screen {
    @include _1170 {
        &__register {
            margin: 70px 100px 150px !important;
        }
    }

    @include _979 {
        &__register {
            margin: 70px 50px 150px !important;
        }
    }

    @include _768 {
        &__register {
            margin: 70px 30px 150px !important;
        }
    }

    @include _600 {
        &__register {
            padding: 100px 0;
            margin: 70px 30px 150px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 32px;
                line-height: 44px;
            }

            &-form {
                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 300px !important;
                        height: 50px;

                        font-size: .9rem !important;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 180px !important;
                    height: 40px !important;

                    margin: 2rem 0 0 !important;

                    font-size: .9rem !important;
                    line-height: 22px;
                }
            }
        }
    }

    @include _480 {
        &__register {
            padding: 60px 0 !important;
            margin: 70px 30px 80px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 1.5rem !important;
                line-height: 44px;
            }

            &-form {
                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 220px !important;
                        height: 50px;

                        font-size: .8rem !important;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 180px !important;
                    height: 40px !important;

                    margin: 1.2rem 0 0 !important;

                    font-size: .9rem !important;
                    line-height: 22px;
                }
            }
        }
    }

    &__register {
        display: flex;
        flex-direction: column;
        align-items: center;

        padding: 100px 0;
        margin: 70px 230px 150px;

        border-radius: 10px;
        background: rgb(255, 255, 255);

        &-header {
            margin: 0 0 40px;

            color: rgb(191, 114, 25);
            font-size: 32px;
            font-weight: 700;
            line-height: 44px;
        }

        &-form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            align-items: center;

            &_error {
                margin: 0 0 20px;
                color: rgb(208, 55, 55);
            }

            &_input {
                margin: 0 0 22px;

                &_input {
                    width: 350px;
                    height: 50px;

                    color: rgb(149, 149, 149);
                    font-size: 16px;
                    font-weight: 600;
                    line-height: 22px;

                    padding: 0 0 0 19px;
                    border: 0;
                    border-radius: 5px;
                    background: rgb(245, 245, 247);
                }
            }

            &_submit {
                width: 200px;
                height: 50px;

                margin: 46px 0 0;

                color: rgb(249, 249, 249);
                font-size: 16px;
                font-weight: 600;
                line-height: 22px;

                border-radius: 5px;
                border: 0;

                background: rgb(198, 141, 76);
            }
        }
    }
}
</style>
