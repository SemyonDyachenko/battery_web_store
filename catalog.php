<!DOCTYPE html>
<html lang="en">
<?php require 'source/static/head.php'; ?>

<body>

<div id="wrapper">

<?php require 'source/static/header.php'; ?>



<div class="store-container container">

    <div class="preview-container container">

        <div class="image-container">

        <img src="resource/images/akkums.jpg" alt="akkums.jpg">
    </div>
    </div>



<div class="select-settings-container container">

    <div id="select-settings">

        <div class="setting">
            <span>Тип</span>
            <ul class="subsettings">
                    <li><input type="checkbox"><a href="#"> Легковоые</a></li>
                    <li><input type="checkbox"><a href="#"> Грузовые</a></li>
                    <li><input type="checkbox"><a href="#"> ИБП</a></li>
                </ul>
        </div>

        <div class="setting">
            <span>Модель</span>
            <ul class="subsettings">
                   <li><input type="checkbox"><a href="#"> Akom</a></li>
                    <li><input type="checkbox"><a href="#"> Ridicon</a></li>
                    <li><input type="checkbox"><a href="#"> Turbo</a></li>
                    <li><input type="checkbox"><a href="#"> Mutlu</a></li>
                    <li><input type="checkbox"><a href="#"> Varta</a></li>
                </ul>
        </div>

        <div class="setting">
            <span>Страна</span>
            <ul class="subsettings">
                    <li><input type="checkbox"><a href="#"> Россия</a></li>
                    <li><input type="checkbox"><a href="#"> Китай</a></li>
                    <li><input type="checkbox"><a href="#"> Германия</a></li>
                    <li><input type="checkbox"><a href="#"> США</a></li>
                    <li><input type="checkbox"><a href="#"> Турция</a></li>
                    <li><input type="checkbox"><a href="#"> Сербия</a></li>
                    <li><input type="checkbox"><a href="#"> Словения</a></li>
                    <li><input type="checkbox"><a href="#"> Сербия</a></li>
                </ul>
        </div>
        <div class="setting">
            <span>Емкость</span>
            <ul class="subsettings">
                    <li><input type="number" placeholder="Емкость"></li>
                </ul>
        </div>

        <div class="setting">
            <span >Пусковой ток</span>
            <ul class="subsettings">
                    <li><input type="checkbox"><a href="#"> Akom</a></li>
                    <li><input type="checkbox"><a href="#"> Ridicon</a></li>
                    <li><input type="checkbox"><a href="#"> Turbo</a></li>
                    <li><input type="checkbox"><a href="#"> Mutlu</a></li>
                    <li><input type="checkbox"><a href="#"> Varta</a></li>
                </ul>
        </div>

        <div class="setting">

        <span>Цена</span>
            <ul class="subsettings">
        <li><input type="number" placeholder="Минимальная цена"></li>
        <li><input type="number" placeholder="Максимальная цена"></li>
            </ul>
         </div>

         <div class="setting settings-saver">

        <span><a href="#" id="settings-saver-btn">Применить</a></span>

        </div>


    </div>  


</div>

<div class="catalog-container container">

    <div class="catalog">
        <?php

        include 'source/server/QueryBuilder.php';

        try {
            $pdo = new PDO("mysql:host=localhost;dbname=akkums", 'root', '');
        }
        catch (PDOException $e)
        {
            die('Не удалось подключиться к базе данных');
        }

        $db = new QueryBuilder($pdo);
        $akb_row = $db->GetAll('akb');



        if($db->GetAllCount('akb') > 0)
        {

           for($i = 0; $i < $db->GetAllCount('akb'); $i++)
            {
                if($akb_row[$i]['available'] == 1)
                {

        ?>
        <div class="product-container">
            <div class="product-container-child">
                <a href="<?php echo "product?id=".$akb_row[$i]['id'] ?>">
                <div class="product-container-price">
                    <h4><?php echo $akb_row[$i]['price']; ?> RUB</h4>
                </div>
                <div class="product-container-image">
                    <?php $imgpath = $akb_row[$i]['imgpath'];
                   echo  '<img src="'.$imgpath.'" alt="product.jpg">'; ?>
                </div>
                <div class="product-container-about">
                   <h3 class="modelname-headline"><?php echo $akb_row[$i]['modelname']; ?></h3>

                </div>
                </a>
            </div>
        </div>



        <?php
                }
            }
        }
        ?>




    </div>


</div>


</div>

    <?php require 'source/widgets/mailing.php'; ?>

    <?php require 'source/static/footer.php'; ?>

</div>

<script>




</script>

<script src="scripts/product-view.js"></script>

</body>
</html>