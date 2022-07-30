<template>

    <div class="add-button">
        <button>+</button>
        <div class="add-button-animals">
            <div v-for="kind in animalKinds">
                <button v-on:click="addAnimal(kind.id)">
                    <img :src="'img/animals/Frame_' + kind.id + '.png'" alt="">
                </button>
            </div>
        </div>
    </div>

</template>

<script>
    export default {
        name: "AddAnimal",
        data() {
            return {
                animalKinds: []
            }
        },
        props: {
            renderNewAnimal: Function
        },
        methods: {
            getAnimalKinds() {
                axios.get('api/animal_kinds')
                .then((response) => {
                    this.animalKinds = response.data.data;
                })
            },
            addAnimal(kind) {
                axios.post('api/animals', {kind: kind})
                .then((response) => {
                    this.renderNewAnimal(response.data.data.animal, response.data.data.size);
                })
                .catch((error) => {
                    alert(error.response.data.error);
                })
            }
        },
        mounted() {
            this.getAnimalKinds();
        }
    }
</script>

<style scoped>

</style>
