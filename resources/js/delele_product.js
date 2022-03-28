$(document).ready(function () {
    $(".btn_delete_product").click(function () {
        var id = $(this).attr('data-id');
        $(".confirm_delete_product").attr('action', `products/${id}`);
    });

    $(".btn_delete_customer").click(function () {
        var id = $(this).attr('data-id');
        $(".confirm_delete_customer").attr('action', `customer/${id}`);
    });
});