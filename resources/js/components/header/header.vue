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
@import "../../../../public/sass/media_mixin.scss";

.header {
    @include _1700 {

    }

    @include _1570 {

    }

    @include _1250 {

    }

    @include _1170 {
        padding: 0 100px 0;
    }

    @include _979 {
        padding: 0 50px 0;
    }

    @include _768 {
        padding: 0 30px 0;
    }

    @include _600 {

    }

    @include _480 {

    }

    @include _350 {

    }

    padding: 0 230px 0;
}
</style>
