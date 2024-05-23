<template>
    <div :class="cnIndexScreen('')">
        <IndexScreenSearch></IndexScreenSearch>
        <IndexScreenReview></IndexScreenReview>
    </div>
</template>

<script setup lang="ts">
import {cnIndexScreen} from './index-screen.const'
import IndexScreenSearch from "./index-screen__search.vue"
import IndexScreenReview from "./index-screen__review.vue"
</script>

<style lang="scss" scoped>
</style>
