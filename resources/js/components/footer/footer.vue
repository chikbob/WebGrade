<template>
    <footer :class="cnFooter()">
        <FooterTop></FooterTop>
        <FooterBot></FooterBot>
    </footer>
</template>

<script setup lang="ts">
import {cnFooter} from "./footer.const.js";
import FooterTop from "./footer__top.vue"
import FooterBot from "./footer__bot.vue"
</script>

<style lang="scss">
@import "../../../../public/sass/media_mixin.scss";

.footer {
    @include _1700 {

    }

    @include _1570 {

    }

    @include _1250 {

    }

    @include _1170 {
        padding: 21px 100px 0;
    }

    @include _979 {
        padding: 21px 50px 0;
    }

    @include _768 {
        padding: 21px 30px 0;
    }

    @include _600 {

    }

    @include _480 {

    }

    @include _350 {

    }

    height: 185px;
    padding: 21px 230px 0;

    background: rgb(249, 249, 249);
}
</style>
