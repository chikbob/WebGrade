<template>
    <div :class="cnFooter('bot')">
        <div :class="cnFooter('bot-name')">
            ВебГрейд© 2024
        </div>
        <div :class="cnFooter('bot-description')">
            Все права защищены!
        </div>
    </div>
</template>

<script setup lang="ts">
import {cnFooter} from "./footer.const.js";
</script>

<style lang="scss" scoped>
.footer {
    &__bot {
        display: flex;
        justify-content: space-between;

        color: rgb(105, 105, 105);
        font-size: 10px;
        font-weight: 400;
        line-height: 14px;

        &-name {
            display: flex;
            align-items: center;

            width: 284px;
            height: 32px;
        }

        &-description {
            display: flex;
            align-items: center;
            justify-content: flex-end;

            width: 284px;
            height: 32px;
        }
    }
}
</style>
