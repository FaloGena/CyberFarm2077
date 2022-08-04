<template>
    <div class="animals-container">
        <div class="actions">
            <add-animal :render-new-animal="addAnimal"></add-animal>
            <remove-all v-on:animalsRemoved="removeAnimals"></remove-all>
            <stop-aging v-on:stopAging="stopAging"></stop-aging>
        </div>

        <div class="animals">
            <animal v-for="(animal, index) in animals" :animal="animal" :origin-size="sizes[index]" :aging="aging"></animal>
        </div>
    </div>
</template>

<script>
    import AddAnimal from "./AddAnimal";
    import Animal from "./Animal";
    import RemoveAll from "./RemoveAll";
    import StopAging from "./StopAging";

    export default {
        name: "AnimalFarming",
        components: {
            AddAnimal,
            Animal,
            RemoveAll,
            StopAging,
        },
        data() {
            return {
                animals: [],
                sizes: [],
                aging: true,
            }
        },
        methods: {
            getAnimals() {
                axios.get('api/animals')
                .then((response) => {
                    this.animals = response.data.data.animals
                    this.sizes = response.data.data.sizes
                })
            },
            addAnimal(animal, size) {
                this.animals.push(animal);
                this.sizes.push(size);
            },
            removeAnimals() {
                this.animals = [];
                this.sizes = [];
            },
            stopAging() {
                console.log('stopped');
                this.aging = false;
            }
        },
        mounted() {
            this.getAnimals();
        }
    }
</script>

<style scoped>

</style>
