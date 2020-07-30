<?php

if(empty($_GET['order_id']))
{
     header('Location: http://'.$_SERVER['HTTP_HOST']."/denwer/404");
}

else {
?>


<!DOCTYPE html>
<html lang="en">
<?php require 'source/static/head.php'; ?>
<body>
<div id="wrapper">

<?php require 'source/static/header.php'; ?>

<div class="order-result container" style="min-height:850px;margin-top:50px;box-sizing:border-box;padding-left:40px;">

<h1 style="font-size:25px;">Заказ успешно оформлен.</h1>

<h2 style="font-size:20px;">Номер вашего заказа: <?php echo $_GET['order_id']; ?></h2>

<h3 style="font-size:20px;">Если вы авторизованны на сайте,после подтверждения ваш заказ появится в личном кабинете.<br>Ожидайте звонок от нашего оператора для подтверждения заказа.</h3>        

<a href="/">Вернуться на главную</a>

</div>


<?php require 'source/static/footer.php'; ?>

</div>
    
</body>
</html>

<?php } ?>