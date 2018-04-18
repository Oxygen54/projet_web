$(document).ready(function () {
    var titleElement, priceElement, descriptionElement, imageElement, categorieElement = null;

    $('.add_product').on('click', function (event) {
        event.preventDefault();

        // Get the values from view
        titleElement = event.target.parentNode.parentNode.dataset['title'];
        priceElement = event.target.parentNode.parentNode.dataset['price'];
        descriptionElement = event.target.parentNode.parentNode.dataset['description'];
        imageElement = event.target.parentNode.parentNode.dataset['imagePath'];
        categorieElement = event.target.parentNode.parentNode.dataset['catproducts_id'];

        // Set the values in var
        $('#title').val(titleElement);
        $('#price').val(priceElement);
        $('#description').val(descriptionElement);
        $('#imagePath').val(imageElement);
        $('#catproducts_id').val(categorieElement);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {

        // Send it to POST method
        $.ajax({
            method: 'POST',
            url: urlAdd,
            data: {
                title: $('#title').val(),
                price: $('#price').val(),
                description: $('#description').val(),
                imagePath: $('#imagePath').val(),
                catproducts_id: $('#catproducts_id').val()
            }
        })

            // Hide modal when done
            .done(function () {
                $('#edit-modal').modal('hide');
            });
    });
});