// add to cart
$("#addToCart").click(function (ev) {
    // lay id
    let productId = window.location.pathname.split('/')[2];
    $.ajax({
        type: "GET",
        url: "addToCart2/" + productId,
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
