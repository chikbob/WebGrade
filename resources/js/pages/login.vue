<template>
    <PageLayout>
        <LoginScreen></LoginScreen>
    </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "@/components/layouts/page-layout/page-layout.vue";
import LoginScreen from "@/screens/login-screen/login-screen.vue";
import {allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const props = defineProps({
    user: Object,
    sites: Object,
    review: Object
})

const modelAllSite = allSiteModel()
const modelUser = userModel()
const modelReview = allReviewModel()

modelAllSite.init(props.sites)
modelUser.init(props.user)
modelReview.init(props.review)
</script>

<style scoped>

</style>
