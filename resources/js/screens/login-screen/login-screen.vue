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
.login-screen {
    &__login {
        display: flex;
        flex-direction: column;
        align-items: center;

        padding: 150px 0 150px;
        margin: 0 230px 150px;

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
