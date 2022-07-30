<template>
    <img :src="'img/animals/Group_' + animal.animal_kind_id + '.svg'" alt="" :style="{width: size + 'px'}">
</template>

<script>
    export default {
        name: "Animal",
        props: {
            animal: Object,
            originSize: Number,
            aging: Boolean,
        },
        data() {
          return {
              size: this.originSize,
              agingInterval: ''
          }
        },
        methods: {
            ageAnimal(animal) {
                let self = this;

                self.agingInterval = setInterval(function () {

                    if (self.aging) {
                        axios.post('api/animals/age', {animal: animal.id})
                            .then((response) => {

                                if (response.data.error) {
                                    console.log(response.data.error);
                                    return false;
                                }


                                self.size = response.data.data.size;
                            })
                            .catch((error) => {
                                console.log(error.response.data.error);
                            })
                    }

                }, 3000);
            }
        },
        mounted() {
            this.ageAnimal(this.animal);
        },
        unmounted() {
            clearInterval(this.agingInterval);
        },

    }
</script>

<style scoped>
img {
    margin-left: 10px;
}
</style>
