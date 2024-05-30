<template>
    <div :class="cnLoginScreen('')">
        <div :class="cnLoginScreen('login')">
            <div :class="cnLoginScreen('login-header')">
                Войти
            </div>
            <form :class="cnLoginScreen('login-form')" @submit.prevent="loginUser">
                <div :class="cnLoginScreen('login-form_error')" v-if="showErrorMessage">
                    {{ showMessage() }}
                </div>
                <div :class="cnLoginScreen('login-form_input')">
                    <input :class="cnLoginScreen('login-form_input_input')" type="email" id="email" v-model="form.email"
                           placeholder="Логин" required>
                </div>
                <div :class="cnLoginScreen('login-form_input')">
                    <input :class="cnLoginScreen('login-form_input_input')" type="password" id="password" placeholder="Пароль"
                           v-model="form.password"
                           required>
                </div>
                <button :class="cnLoginScreen('login-form_submit')" type="submit" @click="timeoutFunction"
                        :disabled="!isFormValid">Войти
                </button>
            </form>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnLoginScreen} from "./login-screen.const"
import {defineProps, ref, computed} from 'vue'
import {Inertia} from '@inertiajs/inertia'

const form = ref({
    email: '',
    password: ''
})

let errorMessage = ref('');
let showErrorMessage = ref(false);

const isFormValid = computed(() => {
    return form.value.email.length > 5 && form.value.password.length >= 6;
});

function loginUser() {
    if (isFormValid.value) {
        showErrorMessage.value = false
        Inertia.post('/login/success', form.value);
        let timerInterval;
        Swal.fire({
            title: "Подождите...",
            html: "Осталось <b></b> миллисекунд.",
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
}

function showMessage() {
    return errorMessage.value = 'Неверный логин или пароль'
}

function timeoutFunction() {
    return setTimeout(() => {
        showErrorMessage.value = true
    }, 2000);
}
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.login-screen {
    @include _1700 {

    }

    @include _1570 {

    }

    @include _1250 {
        &__login {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 150px 0 150px;
            margin: 70px 230px 150px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 32px;
                line-height: 44px;
            }

            &-form {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;

                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 350px;
                        height: 50px;

                        font-size: 16px;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 150px;
                    height: 50px;

                    margin: 46px 0 0;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _1170 {
        &__login {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 150px 0 150px;
            margin: 70px 100px 150px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 32px;
                line-height: 44px;
            }

            &-form {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;

                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 350px;
                        height: 50px;

                        font-size: 16px;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 150px;
                    height: 50px;

                    margin: 46px 0 0;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _979 {
        &__login {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 150px 0 150px;
            margin: 70px 50px 150px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 32px;
                line-height: 44px;
            }

            &-form {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;

                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 350px;
                        height: 50px;

                        font-size: 16px;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 150px;
                    height: 50px;

                    margin: 46px 0 0;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _768 {
        &__login {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 150px 0 150px;
            margin: 70px 30px 150px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 32px;
                line-height: 44px;
            }

            &-form {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;

                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 350px;
                        height: 50px;

                        font-size: 16px;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 150px;
                    height: 50px;

                    margin: 46px 0 0;

                    font-size: 16px;
                    line-height: 22px;
                }
            }
        }
    }

    @include _600 {
        &__login {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 100px 0 100px !important;
            margin: 70px 30px 150px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 2rem !important;
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
                    width: 125px !important;
                    height: 40px !important;

                    margin: 2rem 0 0 !important;

                    font-size: .9rem !important;
                    line-height: 22px;
                }
            }
        }
    }

    @include _480 {
        &__login {
            display: flex;
            flex-direction: column;
            align-items: center;

            padding: 60px 0 !important;
            margin: 70px 30px 80px !important;

            &-header {
                margin: 0 0 40px;

                font-size: 1.5rem !important;
                line-height: 44px;
            }

            &-form {
                display: flex;
                flex-direction: column;
                justify-content: space-between;
                align-items: center;

                &_input {
                    margin: 0 0 22px;

                    &_input {
                        width: 220px !important;
                        height: 40px !important;

                        font-size: .8rem !important;
                        line-height: 22px;

                        padding: 0 0 0 19px;
                    }
                }

                &_submit {
                    width: 125px !important;
                    height: 40px !important;

                    margin: 2rem 0 0 !important;

                    font-size: .9rem !important;
                    line-height: 22px;
                }
            }
        }
    }

    @include _350 {

    }

    &__login {
        display: flex;
        flex-direction: column;
        align-items: center;

        padding: 150px 0 150px;
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
                width: 150px;
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
