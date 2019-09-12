// function likeIt(tweet_id, elem){
//     var csrfToken='{{csrf_token()}}';
//     $.post('{{route('likeIt')}}', {tweet_id:tweet_id,_token:csrfToken}, function(data) {
//         $(elem).text(' ');
//     });
// }





// var tweetId = 0;
//
// $('.like').on('click', function(event){
//
//     event.preventDefault();
//     tweetId = event.target.parentNode.parentNode.dataset['tweetid'];
//     var isLike = event.target.previousElementSibling == null;
//
//     $.ajax({
//         method : 'POST',
//         url : urlLike,
//         data : {isLike: isLike, tweet_id: tweet_id, _token: token }
//     })
//
//     .done(function(){
//         event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this tweet' : 'like' : event.target.innerText == 'Dislike' ?  'You dislike this tweet' : 'Dislike';
//         if (isLike){
//             event.target.nextElementSibling.innerText = 'Dislike';
//         } else {
//             event.target.previousElementSibling.innerText = 'Like';
//         }
//     });
// });
