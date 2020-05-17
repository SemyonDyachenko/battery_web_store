$('.incart-add-button').click(function () {

    let productID = $(this).attr('productid');

    $.ajax({
       type: "POST",
       url: "/source/server/addcart.php",
       data:"id="+productID,
       dataType: "html",
        cache: false,
        success: function (data) {
            loadCart();
        }
    });
});

function loadCart()
{
    $.ajax({
        type: "POST",
        url: "/source/server/loadcart.php",
        dataType: "html",
        cache: false,
        success: function (data) {
            if(data === "0")
            {
                $('cart-value').html("Корзина пуста");
            }
            else {
                $('cart-value').html(data);
            }
        }
    });

}