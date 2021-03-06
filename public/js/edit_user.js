$(document).ready(function () {
    var userId = 0;
    var userNameElement = null;
    var userEmailElement = null;
    var userRankElement = null;

    $('.edit').on('click', function (event) {
        event.preventDefault();

        // Get the values from view
        userNameElement = event.target.parentNode.parentNode.dataset['user-name'];
        userEmailElement = event.target.parentNode.parentNode.dataset['user-email'];
        userRankElement = event.target.parentNode.parentNode.dataset['user-rank'];


        // Set the values in var
        userId = event.target.parentNode.parentNode.dataset['userid'];
        $('#user-name').val(userNameElement);
        $('#user-email').val(userEmailElement);
        $('#user-rank').val(userRankElement);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {

        // Send it with POST method
        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {
                name: $('#user-name').val(),
                email: $('#user-email').val(),
                rank: $('#user-rank').val(),
                userId: userId
            }
        })
            .done(function () {
                $('#edit-modal').modal('hide');
            });
    });
});