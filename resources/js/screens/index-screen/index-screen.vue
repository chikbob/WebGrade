<template>
    <div :class="cnIndexScreen('')">
        <IndexScreenSearch></IndexScreenSearch>
        <IndexScreenReview></IndexScreenReview>
        <!--        <iframe-->
        <!--            src="https://yandex.ru/map-widget/v1/?um=constructor%3A16bd8fa0916976e071d011d83d0b80f80b83e40b5a5f615ec3a302227ac08d1b&amp;source=constructor"-->
        <!--            width="500" height="340" frameborder="0">-->
        <!--        </iframe>-->
    </div>
</template>

<script setup lang="ts">
import {cnIndexScreen} from './index-screen.const'
import IndexScreenSearch from "./index-screen__search.vue"
import IndexScreenReview from "./index-screen__review.vue"
</script>

<style lang="scss" scoped>
</style>
