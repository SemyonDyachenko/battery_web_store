<?php


/*

ProductController.php

Контроллер для страницы просмотра товора (/product/1)

*/

function GetProductById($itemId)
{
    $dbc = mysqli_connect('localhost','root','','akkums');


    $itemId = intval($itemId);

    $query = "SELECT * FROM `akb` WHERE id = '{$itemId}'";

    $res = mysqli_query($dbc,$query);

    return mysqli_fetch_assoc($res);

}


function indexAction()
{
    $productId = $_GET['id'];

    $productResource = getProductById($productId);



    

}


?>