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

const props = defineProps({
    sites: Object,
    search: Object,
})

const modelSite = siteModel()
const modelSearch = searchModel()

modelSite.init(props.sites)
modelSearch.init(props.search)
</script>

<style scoped>

</style>
