<template>
    <header :class="cnHeader()">
        <HeaderTop></HeaderTop>
        <HeaderBot></HeaderBot>
    </header>
</template>

<script lang="ts" setup>
import {cnHeader} from "./header.const.js";
import HeaderTop from "./header__top.vue"
import HeaderBot from "./header__bot.vue"
import {siteModel, reviewModel} from "@/screens/index-screen/index-screen.model"
import {searchModel} from "@/screens/search-screen/search-screen.model"
import {userModel} from "@/screens/index-screen/user.model"
</script>

<style lang="scss">
.header {
    padding: 0 230px 0;
    margin: 0 0 70px;
}
</style>
