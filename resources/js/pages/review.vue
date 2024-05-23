<template>
   <PageLayout>
       <ReviewScreen></ReviewScreen>
   </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "@/components/layouts/page-layout/page-layout.vue";
import ReviewScreen from "@/screens/review-screen/review-screen.vue";
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "@/screens/index-screen/user.model"
import {reviewModel, allSiteModel, allReviewModel} from "@/screens/review-screen/review-screen.model"
import {allUserModel} from "@/screens/review-screen/all_user.model"

const props = defineProps({
    search: Object,
    user: Object,
    review: Object,
    all_review: Object,
    all_users: Object,
    site: Object
})

const modelSearch = searchModel()
const modelUser = userModel()
const modelReview = reviewModel()
const modelAllUser = allUserModel()
const modelAllSite = allSiteModel()
const modelAllReview = allReviewModel()

modelSearch.init(props.search)
modelUser.init(props.user)
modelReview.init(props.review)
modelAllUser.init(props.all_users)
modelAllSite.init(props.site)
modelAllReview.init(props.all_review)
</script>

<style lang="scss" scoped>

</style>
