<template>
    <div :class="cnAboutScreen('')">
        <div :class="cnAboutScreen('card')">
            <div :class="cnAboutScreen('card-header')">
                Про нас
            </div>
            <div :class="cnAboutScreen('card-text')">
                Компания webgrade специализируется на предоставлении услуг по поиску отзывов о других веб-сайтах и
                интернет-ресурсах. Мы предлагаюем удобный и надежный способ для пользователей найти и изучить отзывы о
                различных веб-ресурсах, прежде чем сделать покупку или принять решение.
                Webgrade использует свой собственный сайт, на котором пользователи могут вводить URL веб-сайта, о
                котором они хотят найти отзывы. Затем система webgrade проводит поиск по личной базе данных отзывов.
                Пользователи могут просмотреть собранные отзывы и оценки, чтобы получить более полное представление о
                репутации и качестве данного веб-сайта.
                Webgrade стремится предоставить максимально объективную и надежную информацию о веб-сайтах, чтобы помочь
                пользователям принимать информированные решения. Они также придерживаются политики конфиденциальности и
                не публикуют личные данные пользователей или информацию, которую они вводят на сайте.
                Важно отметить, что webgrade не использует социальные сети для предоставления своих услуг. Они
                полагаются на собственный сайт и поиск по различным интернет-ресурсам, чтобы найти и агрегировать
                отзывы.
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnAboutScreen} from "./about-screen.const"
import {allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const modelAllSite = allSiteModel()
const modelUser = userModel()
const modelReview = allReviewModel()
</script>

<style lang="scss" scoped>
@import "../../../../public/sass/media_mixin.scss";

.about-screen {
    @include _1700 {

    }

    @include _1570 {

    }

    @include _1250 {

    }

    @include _1170 {
        &__card {
            margin: 74px 100px 64px !important;
            padding: 30px 52px 55px 60px;

            &-header {
                font-size: 32px;
                line-height: 44px;

                margin: 0 0 44px;
            }

            &-text {
                font-size: 20px;
                line-height: 27px;
            }
        }
    }

    @include _979 {
        &__card {
            margin: 74px 50px 64px !important;
            padding: 30px 52px 55px 60px;

            &-header {
                font-size: 32px;
                line-height: 44px;

                margin: 0 0 44px;
            }

            &-text {
                font-size: 20px;
                line-height: 27px;
            }
        }
    }

    @include _768 {
        &__card {
            margin: 74px 30px 64px !important;
            padding: 30px 52px 55px 60px;

            &-header {
                font-size: 32px;
                line-height: 44px;

                margin: 0 0 44px;
            }

            &-text {
                font-size: 20px;
                line-height: 27px;
            }
        }
    }

    @include _600 {

    }

    @include _480 {
        &__card {
            margin: 74px 30px 64px !important;
            padding: 55px 40px 55px 45px !important;

            &-header {
                font-size: 1.8rem !important;
                line-height: 1.8rem !important;

                margin: 0 0 44px;
            }

            &-text {
                font-size: 1rem !important;
                line-height: 1.4rem !important;
            }
        }
    }

    @include _350 {

    }

    &__card {
        margin: 74px 230px 64px;
        padding: 30px 52px 55px 60px;

        border-radius: 10px;
        background: rgb(255, 255, 255);

        &-header {
            color: rgb(191, 114, 25);
            font-size: 32px;
            font-weight: 700;
            line-height: 44px;

            margin: 0 0 44px;
        }

        &-text {
            color: rgb(22, 22, 22);
            font-size: 20px;
            font-weight: 400;
            line-height: 27px;

            text-align: justify;
        }
    }
}
</style>
