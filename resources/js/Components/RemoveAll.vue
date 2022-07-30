<template>
    <div class="remove-all">
        <button v-on:click="removeAll">
            Remove Animals
        </button>
    </div>
</template>

<script>
    export default {
        name: "RemoveAll",
        methods: {
            removeAll() {
                axios.delete('api/animals')
                .then((response) => {
                    this.$emit('animalsRemoved');
                })
                .catch((error) => {
                    alert(error.response.data.error);
                })
            }
        }
    }
</script>

<style scoped>
.remove-all {
    float: right;
    width: 100px;
    height: 50px;
}

.remove-all button {
    height: 100%;
    background: #3E2723;
    color: #ffffff;
    font-size: 17px;
}
</style>
