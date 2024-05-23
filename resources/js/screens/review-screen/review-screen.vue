<template>
    <div :class="cnReviewScreen('')">
        <ReviewScreenReview></ReviewScreenReview>
        <ReviewScreenAdd></ReviewScreenAdd>
    </div>
</template>

<script setup lang="ts">
import ReviewScreenReview from "./review-screen__review.vue"
import ReviewScreenAdd from "./review-screen__add.vue"
import {userModel} from "@/screens/index-screen/user.model"
import {allReviewModel} from "@/screens/review-screen/review-screen.model"
import {cnReviewScreen} from "./review-screen.const"


const modelUser = userModel()
const modelAllReview = allReviewModel()
</script>

<style lang="scss" scoped>
</style>
