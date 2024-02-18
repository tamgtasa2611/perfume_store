// add to cart
$("#addToCartAjax").click(function (ev) {
    // lay id
    let productId = window.location.pathname.split('/')[2];
    // lay size
    let sizeId = 1;
    $.ajax({
        type: "GET",
        url: "addToCartAjax/" + productId,
        data: {},
        success: function (data) {

            // Ajax call completed successfully
            alert("Add item to cart successfully");
        },
        error: function (data) {

            // Some error in ajax call
            alert("Error");
        }
    });
});
