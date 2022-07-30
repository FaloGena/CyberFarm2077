<template>
    <div class="stop-aging">
        <button v-on:click="stopAging">
            Stop Aging
        </button>
    </div>
</template>

<script>
    export default {
        name: "StopAging",
        methods: {
            stopAging() {
                this.$emit('stopAging');
            }
        }
    }
</script>

<style scoped>
    .stop-aging {
        float: right;
        width: 100px;
        height: 50px;
    }

    .stop-aging button {
        height: 100%;
        background: #3E2723;
        color: #ffffff;
        font-size: 17px;
    }
</style>
