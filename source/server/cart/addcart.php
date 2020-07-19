<?php



if($_SERVER["REQUEST_METHOD"] == "POST")
{
    date_default_timezone_set('UTC');

    $dbc = mysqli_connect('localhost','root','','akkums');


    $id = $_POST['id'];

    $query = mysqli_query($dbc,"SELECT * FROM `cart` WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND cart_product_id = '$id'");

    if(mysqli_num_rows($query) > 0)
    {
        $row = mysqli_fetch_array($query);
        $new_count = $row['cart_count'] + 1;
        $update_query = mysqli_query($dbc,"UPDATE `cart` SET cart_count = '$new_count' WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}' and cart_product_id = '$id'");
    }
    else {
        $query = mysqli_query($dbc,"SELECT * FROM `akb` WHERE id = '$id'");

        $row = mysqli_fetch_array($query);

        $price = $row['price'];
        $datetime = date("Y-m-d H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];

        mysqli_query($dbc,"INSERT INTO `cart` (cart_product_id,cart_price,cart_datetime,cart_ip) VALUES ('$id','$price','$datetime','$ip')");

    }
}

?>