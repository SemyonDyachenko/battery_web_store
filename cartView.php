<?php


?>

<!doctype html>
<html lang="en">
<?php
require 'source/static/head.php'; ?>

<body>
<div id="wrapper">

    <?php require 'source/static/header.php'?>

    <div class="cart-container container">
    <?php

        include "source/server/db_connect.php";
        include "source/server/QueryBuilder.php";

        $db = new QueryBuilder($pdo);

        $user_ip = $_SERVER['REMOTE_ADDR'];

        $row = $db->GetAllData('cart', "cart_ip", $user_ip);


        $product_ids = array();

        for ($i = 0; $i < count($row); $i++) {
            $product_ids[$i] = $row[$i]['cart_product_id'];
        }

    ?>

        <div class="cart-child">
            <div class="cart-headline">
                <?php if(count($product_ids) == 0) { ?>
                    <h1>Ваша корзина пуста</h1>
            <?php } else { ?>
                    <h1>Корзина товаров</h1>
                <?php } ?>
            </div>

            <div class="cart-content">

                <div class="cart-products-row">
                 <?php



                    for ($i = 0; $i < count($product_ids);$i++)
                    {
                        $row = $db->GetAllData('akb','id',$product_ids[$i]);

                        if($row[0]['available'] == 1) {

                        $imgpath = $row[0]["imgpath"];
                        $headline = $row[0]["modelname"];
                        $capacity = $row[0]['capacity'];
                        $amperage = $row[0]['amperage'];
                        $price = $row[0]['price'];



                    ?>
                        <div class="cart-element">

                            <div class="child-cart-element">

                                <div class="cart-element-image-box">
                                    <img src="<?php echo $imgpath;?> "alt="akb.jpg">

                                </div>

                                <div class="cart-element-content">
                                    <div class="cart-element-headline">
                                        <h3>Аккумулятор <?php echo $headline; ?> </h3>
                                    </div>
                                    <div class="cart-element-feature">
                                        <h4>Емкость: <?php echo $capacity; ?> Ач</h4>
                                        <h4>Пусковой ток: <?php echo $amperage; ?> Ач</h4>
                                        <h4>Цена: <?php echo $price; ?> RUB </h4>
                                    </div>

                                </div>
                                <div class="cart-element-close">
                                    <li onclick='window.location.reload()' class="fas fa-times delete-from-cart" productid="<?php echo $row[0]['id']; ?>"></li>
                                </div>
                            </div>

                        </div>


                    <?php
                        }
                    }
                    ?>


                </div>

        <div class="sign-container sign-container-second">
            <div class="login-form-headline-second login-form-headline">
                <h1>Еще нет аккаунта?</h1>
            </div>


                <div class="sign-row">
                    <h3><i class="fas fa-angle-down"></i> Быстрое оформление заказа.</h3>

                    <h3><i class="fas fa-angle-down"></i> Просмотр истории заказов.</h3>

                        <h3><i class="fas fa-angle-down"></i> Добавление в избранное.</h3>

                        <h3><i class="fas fa-angle-down"></i> Корзина товаров.</h3>

                    <?php if(empty($_COOKIE['user_id'])) { ?>
                    <button style="width:200px;" id="go-sign"><a href="login">Войти</a></button><br>

                    <button  style="width:200px;margin-top:20px;"  id="go-sign"><a href="signup">Регистрация</a></button><br>

                    <?php  } ?>
                </div>

            </div>

        </div>

            <div class="cart-order-container">

                <?php

                $all_price = 0;



                for ($i = 0; $i < count($product_ids);$i++) {
                    $row = $db->GetAllData('akb','id',$product_ids[$i]);

                    $all_price = $all_price + $row[0]['price'];

                }

                ?>

                <h2>В корзине товаров на сумму: <?php echo $all_price; ?> RUB</h2>

                <?php if(count($product_ids) == 0) { ?>
                    <button id="cart-order-button"><a style="color:white;text-decoration:none;" href="catalog">Выбрать аккумулятор</a></button>

                <?php } else { ?>
                    <button id="cart-order-button"><a href="<?php echo "order?order_id=".$row[0]['cart_id'] ?>" style="color:white;text-decoration:none;">Оформить заказ</a></button>

                <?php  } ?>
            </div>

    </div>


    </div>


    <?php require 'source/widgets/mailing.php'; ?>



    <?php require 'source/static/footer.php'; ?>

</div>


<script src="scripts/cartScript.js"></script>


</body>
</html>