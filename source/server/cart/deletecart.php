<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{

    $dbc = mysqli_connect('localhost','root','','akkums');

    $id = $_POST['id'];

    $query = mysqli_query($dbc,"DELETE FROM `cart` WHERE cart_ip='{$_SERVER['REMOTE_ADDR']}' AND cart_product_id='$id'");

}

?>