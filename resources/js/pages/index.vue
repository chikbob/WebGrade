<template>
    <PageLayout>
        <IndexScreen></IndexScreen>
    </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "../components/layouts/page-layout/page-layout.vue";
import IndexScreen from "../screens/index-screen/index-screen.vue";
import {siteModel, reviewModel} from "@/screens/index-screen/index-screen.model"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const props = defineProps({
    sites: Object,
    search: Object,
    user: Object,
    review: Object
})

const modelSite = siteModel()
const modelSearch = searchModel()
const modelUser = userModel()
const modelReview = reviewModel()

modelSite.init(props.sites)
modelSearch.init(props.search)
modelUser.init(props.user)
modelReview.init(props.review)
</script>

<style scoped>

</style>
