$(document).ready(function () {
// refresh cart after add/update/delete product
    setInterval(function () {
        $('#offcanvas').load('/cart #myCart');
    }, 2000);
})





