<template>
    <PageLayout>
        <AboutScreen></AboutScreen>
    </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "@/components/layouts/page-layout/page-layout.vue";
import {allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {userModel} from "@/screens/index-screen/user.model"
import AboutScreen from "@/screens/about-screen/about-screen.vue";

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

<style lang="scss" scoped>

</style>
