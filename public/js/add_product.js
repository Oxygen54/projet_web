$(document).ready(function () {
    var titleElement, priceElement, descriptionElement, imageElement, categorieElement = null;

    $('.add_product').on('click', function (event) {
        event.preventDefault();

        titleElement = event.target.parentNode.parentNode.dataset['title'];
        priceElement = event.target.parentNode.parentNode.dataset['price'];
        descriptionElement = event.target.parentNode.parentNode.dataset['description'];
        imageElement = event.target.parentNode.parentNode.dataset['imagePath'];
        categorieElement = event.target.parentNode.parentNode.dataset['catproducts_id'];

        $('#title').val(titleElement);
        $('#price').val(priceElement);
        $('#description').val(descriptionElement);
        $('#imagePath').val(imageElement);
        $('#catproducts_id').val(categorieElement);
        $('#edit-modal').modal();
    });

    $('#modal-save').on('click', function () {
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
            .done(function () {
                $('#edit-modal').modal('hide');
            });
    });
});