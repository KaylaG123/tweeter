

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('gif-search', require('./components/GifSearch.vue').default);
Vue.component('like-tweet', require('./components/LikeTweet.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
jQuery(document).ready(function() {
    jQuery('.follow').click(function(){
        //alert('Yolo');
        jQuery.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
            }
        });
        var id = $(this).data('id');
        console.log(id);
        var reference= $(this);
        jQuery.ajax({
            type:'POST',
            url:'/toggle',
            data:{user_id:id},
            success:function(data){
                if(jQuery.isEmptyObject(data.success.attached)){
                    reference.find("strong").text("Follow");
                }else{
                    reference.find("strong").text("UnFollow");
                }
            }
        });
    });
});
// $('[data-like]').on('click', function(e) {
//     jQuery.ajaxSetup({
//         headers: {
//             'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
//         }
//     });
//     var self = $(this),
//             tweetId = self.data('like');
//             self.prop('disabled', true);
//
//             $.ajax({
//                 type: "POST",
//                 url: '/like',
//                 data: {tweetId:tweetId},
//             }).done(function(data) {
//                 $('#count').html(data.current_count);
//                 if ($("#btn").html() == "like") {
//                 $("#btn").html('unlike');
//                 }
//                else {
//                $("#btn").html('like');
//                }
//             }).always(function() {
//                 self.prop('disabled', false);
//             });
//         });

// function LikeUnLikeButton() {
//             $(".like-Unlike").click(function (e) {
//                 if ($(this).html() == "Like") {
//                     $(this).html('Unlike');
//                 }
//                 else {
//                     $(this).html('Like');
//                 }
//             });
//         }
// LikeUnLikeButton();
