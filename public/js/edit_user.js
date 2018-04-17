$(document).ready(function () {
    var postId = 0;
    var postBodyElement = null;

    $('.edit').on('click', function (event) {
        event.preventDefault();

        postBodyElement = event.target.parentNode.parentNode.childNodes[0];
        var postBody = postBodyElement.textContent;
        postId = event.target.parentNode.parentNode.dataset['postid'];
        $('#user-name').val(postBody);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {
        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {body: $('#user-name').val(), postId: postId, _token: token}
        })
            .done(function (msg) {
                $(postBodyElement).text(msg['new_body']);
                $('#edit-modal').modal('hide');
            });
    });
});