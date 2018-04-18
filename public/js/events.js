$(document).ready(function () {
    var eventId = 0;
    var eventElement, imageElement = null;

    $('.event').find('.interaction').find('.edit').on('click', function (event) {
        event.preventDefault();

        // Get the values from view
        eventId = event.target.parentNode.parentNode.dataset['postid'];
        eventElement = event.target.parentNode.parentNode.dataset['event'];
        imageElement = event.target.parentNode.parentNode.dataset['image'];

        $('#event').val(eventElement);
        $('#image').val(imageElement);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {

        // Send with POST method
        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {event: $('#event-body').val(),image: $('#image').val(), eventId: eventId, _token: token}
        })
            .done(function (msg) {
                $('#edit-modal').modal('hide');
            });
    });

    $('.subscribe').on('click', function (event) {
        event.preventDefault();
        eventId = event.target.parentNode.parentNode.dataset['postid'];
        var isLike = event.target.previousElementSibling == null;

        $.ajax({
            method: "POST",
            url: urlSubscribe,
            data: {isLike: isLike, eventId: eventId, _token: token}

        }).done(function () {
            event.target.innerText = isLike ? event.target.innerText == 'Subscribe' ? 'You subscribed this event' : 'Subscribe' : event.target.innerText == 'Unsubscribe' ? 'You unsuscribed this event' : 'Unsubscribe';
            if (isLike) {
                event.target.nextElementSibling.innerText = 'Unsubscribe';
            } else {
                event.target.previousElementSibling.innerText = 'Subscribe';
            }
        });
    });
});