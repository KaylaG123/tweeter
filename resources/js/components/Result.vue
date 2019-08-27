<template>
    <div class="list-group-item">
        <img :src="image" @click="chooseGIF" />
    </div>
</template>

<script>
    export default {
        props: ['image'],
        methods: {
            chooseGIF() {
                this.$emit('chooseGIFEvent')
            }
        }
    }
</script>

<style scoped>

.list-group-item {
    display: flex;
    justify-content: space-around;
    width: 300px;
    margin: 10px;
    position: relative;
}

</style>
