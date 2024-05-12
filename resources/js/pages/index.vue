<template>
    <PageLayout>
        <IndexScreen></IndexScreen>
    </PageLayout>
</template>

<script setup lang="ts">
import PageLayout from "../components/layouts/page-layout/page-layout.vue";
import IndexScreen from "../screens/index-screen/index-screen.vue";
import {siteModel} from "@/screens/index-screen/index-screen.model"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "@/screens/index-screen/user.model"

const props = defineProps({
    sites: Object,
    search: Object,
    user: Object
})

const modelSite = siteModel()
const modelSearch = searchModel()
const modelUser = userModel()

modelSite.init(props.sites)
modelSearch.init(props.search)
modelUser.init(props.user)
</script>

<style scoped>

</style>
