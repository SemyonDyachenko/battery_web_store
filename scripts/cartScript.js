$('.incart-add-button').click(function () {

    let productID = $(this).attr('productid');

    $.ajax({
       type: "POST",
       url: "source/server/cart/addcart.php",
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
        url: "source/server/cart/loadcart.php",
        dataType: "html",
        cache: false,
        success: function (data) {
            if(data === "0")
            {
                $('.bag-link').html("Корзина пуста");
              
            }
            else {
                $('.bag-link').html(data);
           
            }
        }
    });

}


$('.delete-from-cart').click(function () {

    let productId= $(this).attr("productid");

    $.ajax({
        type: "POST",
        url: "source/server/cart/deletecart.php",
        data: "id=" + productId,
        dataType: "html",
        cache: false,
        success: function (data) {
            loadCart();

        }

    });



});