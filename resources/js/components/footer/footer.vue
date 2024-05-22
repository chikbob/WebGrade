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
.footer {
    height: 185px;
    padding: 21px 230px 0;

    background: rgb(249, 249, 249);
}
</style>
