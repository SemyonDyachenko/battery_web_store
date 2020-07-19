<!doctype html>
<html lang="en">
<?php
    require 'source/static/head.php';
?>

<!--
$orderNumber = round(microtime(true) * 1000);
echo $orderNumber;

-->

<body>
<div id="wrapper">

    <?php
    require 'source/static/header.php';
    ?>


    <div class="order-container container">
        <div class="order-child container">
            <div class="order-headline">
                <h1>Оформление заказа</h1>
            </div>

            <div class="order-content">
                <div class="order-form">


                    <form id="order-form-form" method="POST" action="/orderView.php">
                    <h3>Введите данные для доставки</h3>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Имя:</span><br>
                             <input type="text" id="firstname" name="firstname" placeholder="Иван"> <br>
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Фамилия:</span><br>
                            <input type="text" id="lastname" name="lastname" placeholder="Иванов"><br>
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Отчество:</span><br>
                            <input type="text" id="middlename" name="middlename" placeholder="Иванович"><br>
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>E-mail:</span><br>
                            <input type="email" id="email" name="email" placeholder="user@example.ru">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Номер телефона:</span><br>
                            <input type="tel" id="phone" name="phone" placeholder="+1 (234) 567-89-00">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Город:</span><br>
                            <input type="tel" id="phone" name="phone" placeholder="Москва">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Улица,дом,квартира:</span><br>
                            <input type="tel" id="phone" name="phone" placeholder="">
                        </div>


                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Почтовый индекс:</span><br>
                            <input type="tel" id="phone" name="phone" placeholder="111111">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <button type="submit" id="order-button" name="order-button">Оформить заказ</button>
                        </div>



                    </form>
                </div>

                <div id="order-info">
                    <div id="order-info-headline">
                        <h4>Ваш заказ</h4>
                    </div>

                    <div class="order-info-container container">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require 'source/static/footer.php';
    ?>
</div>
</body>
</html>