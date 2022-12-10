

$(function () {
    $('.add-to-cart').on('click', function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: '/assets/includes/cart-objects.php',
            type: 'GET',
            data: {cart: 'add', id: id},
            dataType: 'json',
            success: function (result) {
                if (result.code == 'ok') {
                    $('#cart-num').text(result.total_count);
                    $('#count-'+id).text(result.count);


                } else {
                    alert(result.answer);
                }

            },
            error: function () {
                console.log('Error!');
            }
        });
    });

    $('.del-from-cart').on('click', function (e) {
        e.preventDefault();

        let id = $(this).data('id');

        $.ajax({
            url: '/assets/includes/cart-objects.php',
            type: 'GET',
            data: {cart: 'delete', id: id},
            dataType: 'json',
            success: function (result) {
                if (result.code == 'ok') {
                    $('#cart-num').text(result.total_count);
                    $('#count-'+id).text(result.count);

                } else {
                    alert(result.answer);
                }

            },
            error: function () {
                console.log('Error!');
            }
        });
    });
});