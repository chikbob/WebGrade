<template>
    <PageLayout>
        <RegisterScreen></RegisterScreen>
    </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "@/components/layouts/page-layout/page-layout.vue";
import RegisterScreen from "../screens/register-screen/register-screen.vue";
import {siteModel, reviewModel} from "@/screens/index-screen/index-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const props = defineProps({
    user: Object,
    sites: Object,
    review: Object
})

const modelSite = siteModel()
const modelUser = userModel()
const modelReview = reviewModel()

modelSite.init(props.sites)
modelUser.init(props.user)
modelReview.init(props.review)
</script>

<style scoped>

</style>
