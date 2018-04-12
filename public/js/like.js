var postId = 0;

$('.like').on('click', function(event){
    postId = event.target.parentNode.parentNode.dataset['postId'];
    var isLike = event.target.previousElementSibling == null;

    $.ajax({
        method : 'POST',
        url : urlLike,
        data : {isLike: isLike, postId: postId,  _token: token}
    })

        .done(function(){
            event.target.innerText = isLike ? event.target.innerText == 'Like' ? 'You like this post' : 'Like' : event.target.innerText == 'Dislike' ? 'You dont like this post' : 'Dislike';

            if (isLike){
                event.target.nextElementSibling.innerText = 'Dislike';
            } else {
                event.target.previousElementSibling.innerText = 'Like';
            }
        });
});