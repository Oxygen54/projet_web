$(document).ready(function () {
    var eventId = 0;
    var eventBodyElement = null;
    var eventTitleElement = null;

    $('.event').find('.interaction').find('.edit').on('click', function (event) {
        event.preventDefault();

        eventTitleElement = event.target.parentNode.parentNode.childNodes[2];
        eventBodyElement = event.target.parentNode.parentNode.childNodes[1];

        var eventBody = eventBodyElement.textContent;
        var eventTitle = eventTitleElement.textContent;
        eventId = event.target.parentNode.parentNode.dataset['eventid'];
        $('#event-body').val(eventBody);
        $('#title_event').val(eventTitle);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {
        $.ajax({
            method: 'POST',
            url: urlEdit,
            data: {body: $('#event-body').val(), title_idea: $('#title_event').val(), eventId: eventId, _token: token}
        })
            .done(function (msg) {
                $(eventBodyElement).text(msg['new_body']);
                $('#edit-modal').modal('hide');
            });
    });

    $('.subscribe').on('click', function (event) {
        event.preventDefault();
        eventId = event.target.parentNode.parentNode.dataset['eventid'];
        var isSubscribed = event.target.previousElementSibling == null;

        $.ajax({
            method: "POST",
            url: urlSubscribe,
            data: {isSubscribed: isSubscribed, eventId: eventId, _token: token}

        }).done(function () {
            event.target.innerText = isSubscribed ? event.target.innerText == 'Subscribe' : event.target.innerText == 'UnSubscribe' ? 'You don\'t subscribe this event' : 'UnSubscribe';
            if (isSubscribed) {
                event.target.nextElementSibling.innerText = 'UnSubscribe';
            } else {
                event.target.previousElementSibling.innerText = 'Subscribe';
            }
        });
    });
});