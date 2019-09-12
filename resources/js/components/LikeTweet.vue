<template>
    <a href="" @click="doLike">
        <button class="btn btn-primary"><i class="fa fa-thumbs-up"></i>{{dataIsLiked ? 'Unlike' : 'Like'}} {{dataCount}}</button>
    </a>
</template>

<script>
    import axios from 'axios'
        export default {
            props: ['like', 'tweetId', 'isLiked', 'count'],
            name: "LikeTweet",

            data() {
                return {
                    dataCount: 0,
                    dataIsLiked: false,
                }
            },

            mounted() {
                this.dataIsLiked = this.isLiked;
                this.dataCount = this.count;

            },


            methods: {
                doLike(e){

                    e.preventDefault()
                    if(this.dataIsLiked) {
                        // alert(1);
                        var url = '/tweets/' + this.tweetId + '/unlike';
                    } else {
                        var url = '/tweets/' + this.tweetId + '/like';
                    }

                    // ajax request to the unlike route
                    axios.post(url)
                         .then( (response) => {
                             // alert(2);
                            if(response.data.status == 'success') {

                                if(this.dataIsLiked) {
                                    //did unlike
                                    // alert(3);
                                    this.dataCount--;
                                    this.dataIsLiked = false;
                                } else {
                                    // alert(4);
                                    //did like
                                    this.dataCount++;
                                    this.dataIsLiked = true;
                                }
                            } else {

                            }
                         })
                }
            }
        }
</script>

<style scoped>
    

</style>
