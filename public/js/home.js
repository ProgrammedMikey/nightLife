/**
 * Created by Michael on 12/11/2016.
 */

$('.like').on('click', function(event) {
    event.preventDefault();
    postId = event.target.parentNode.parentNode.parentNode.parentNode.dataset['postid'];
    var isLike = event.target.previousElementSibling == null;
    $.ajax({
        method: 'POST',
        url: urlLike,
        data: {isLike: isLike, postId: postId, _token: token }
    })
        .done(function() {
            event.target.innerText = isLike ? event.target.innerText == 'Not Going' ? 'Going!' : 'Not Going' : '';
        });
});