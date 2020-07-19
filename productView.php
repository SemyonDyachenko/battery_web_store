<?php

// *  pt  - product
// * ptv - product view

?>


<?php
include "source/server/QueryBuilder.php";
include "source/server/db_connect.php";

$db = new QueryBuilder($pdo);

$id = $_GET['id'];

$row = $db->GetAllData('akb','id',$id);

$headline = $row[0]['modelname'];
$productimage = $row[0]['imgpath'];
$currentprice= $row[0]['price'];
$country= $row[0]['country'];
$capacity = $row[0]['capacity'];
$amperage = $row[0]['amperage'];
$availablevalue = $row[0]['available'];


if($availablevalue == 1)
{
    $available = "Есть в наличие.";
}
else {
    $available = "Товара нет в наличие.";
}

?>


<!doctype html>
<html lang="en">
<?php require 'source/static/head.php';?>
<body>
<div id="wrapper">
    <?php require 'source/static/header.php'; ?>

    <div class="productview-container container">
        <div class="productview-container-child">
            <div class="productview-headline pt-headline">
                <h2 class="product-name"><?php echo $headline; ?></h2>
            </div>

        <div class="pt-content container">
            <div class="product-image">

                <img src="<?php echo $productimage; ?>" alt="productimg.jpg">
            </div>

            <div class="product-info">
                <div class="product-price">
                    <div class="current-price">
                        <span><?php echo $currentprice; ?> РУБ</span>
                    </div>

                </div>

                <hr>

                <div class="product-description">
                    <div class="description-box">
                        <h4>Назначение: авто</h4>
                        <h4>Страна: <?php echo $country; ?> </h4>
                        <h4>Емкость: <?php echo $capacity; ?> Ач</h4>
                        <h4>Пусковой ток: <?php echo $amperage; ?> Ач</h4>
                        <h4>Доступность: <?php echo $available; ?></h4>
                    </div>

                </div>

                <div class="cart-adding">
                <?php if($availablevalue == 1) { 
                         $dbc = mysqli_connect('localhost','root','','akkums');

                         $query = mysqli_query($dbc,"SELECT * FROM `cart` WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}' AND cart_product_id = '$id'");

                         $num_rows = mysqli_num_rows($query);

                         if($num_rows == 0)
                         {

                     ?>
                    <button class="incart-add-button"  productid="<?php echo $id; ?>">Добавить в корзину</button>
                    <?php } else { ?>

                        <button class="incart-add-button" disabled>Добавлен в корзину</button>
                    
                       <?php  } } else { ?>
                    <button class="incart-add-button"  disabled>Нет в наличие</button>
                    <?php } ?>

                </div>

            </div>
        </div>


        </div>
    </div>

    <?php require 'source/widgets/mailing.php'; ?>




    <?php require 'source/static/footer.php'; ?>

</div>

<script src="scripts/cartScript.js"></script>

</body>
</html>