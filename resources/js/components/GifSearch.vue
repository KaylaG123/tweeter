<template>
    <div class="container">
        <div>

            <div v-if="chosenGIF">
                <img :src="chosenGIF.images.fixed_height.url" />
                <input type="hidden" name="gif" :value="chosenGIF.images.fixed_height.url" />
            </div>

            <div>
                <form @submit.prevent="doSearch">
                    <input v-model="query" type="text" placeholder="GIF Search" class="form-control" />
                </form>
            </div>

            <div class="results" v-show="showResults">
                <result
                    @chooseGIFEvent="chooseGIFHandler(index)"
                    v-for="(result, index) in results"
                    :image="result.images.fixed_height.url"
                    :key="index">
                </result>
            </div>

        </div>
    </div>
</template>

<script>
import axios from 'axios'
import result from './result.vue'

export default {
    name: "GifSearch",
    components: { result },
    data() {
        return {
            apiKey: 'WH63Tg4St89UzA55FBLc5RO6aZVRrRFC',
            query: '',
            results: [],
            chosenGIF: null,
            showResults: false
        }
    },

    methods: {
        doSearch() {
            axios.get('https://api.giphy.com/v1/gifs/search?api_key=' + this.apiKey + '&q=' + this.query)
                .then( (response) => {
                    this.results = response.data.data;
                    this.showResults = true;
                })
        },
        chooseGIFHandler(target) {
            this.chosenGIF = this.results[target];
            this.showResults = false;
        }
    }
}

</script>

<style scoped>

.results  {
      position: absolute;
      top: auto;
      left: 0;
      width: 300px;
      height: 80%;
      z-index: 10;
      y-index: 20;
      background-color: rgba(0,0,0,0.5);
      overflow: scroll;
}

</style>
