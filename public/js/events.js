$(document).ready(function () {
    var eventId = 0;
    var eventBodyElement = null;

    $('.event').find('.interaction').find('.edit').on('click', function (event) {
        event.preventDefault();
        eventBodyElement = event.target.parentNode.parentNode.childNodes[0];

        var eventBody = eventBodyElement.textContent;
        eventId = event.target.parentNode.parentNode.dataset['postid'];
        $('#event-body').val(eventBody);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {
        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {body: $('#event-body').val(), eventId: eventId, _token: token}
        })
            .done(function (msg) {
                $(eventBodyElement).text(msg['new_body']);
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