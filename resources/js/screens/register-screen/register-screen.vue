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
    } catch (err) {
    }
}

function showMessage() {
    return errorMessage.value = 'Такой пользователь уже существует!'
}

function timeoutFunction() {
    return setTimeout(() => {
        showErrorMessage.value = true
    }, 1000);
}
</script>

<style lang="scss" scoped>
.register-screen {
    &__register {
        display: flex;
        flex-direction: column;
        align-items: center;

        padding: 100px 0;
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
