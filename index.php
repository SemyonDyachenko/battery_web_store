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
?>


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

        <form id="filter-form" method="GET" action="filters">
            
        <div class="setting">
            <span>Категория<li class="arrow-down fas fa-caret-down"></li></span>
            <ul class="subsettings categories-sub">
            <li><button type="button" data-category="0" class="btn btn-default active js-category">Все категории</button></li>
            <li><button type="button" data-category="1" class="btn btn-default js-category">Легковые</button></li>
            <li><button type="button" data-category="2" class="btn btn-default js-category">Грузовые</button></li>
            <li><button type="button" data-category="3" class="btn btn-default js-category">ИБП</button></li>
                </ul>
        </div>

        <div class="setting">
            <span>Модель<li class="arrow-down fas fa-caret-down"></li></span>
            <ul class="subsettings scroll-sub">

                <?php 
                   $models_row = $db->GetAll('models');

                   if($db->GetAllCount('models') > 0)
                   {
           
                      for($i = 0; $i < $db->GetAllCount('models'); $i++)
                       {
                       
                ?>
                    <li><input name="models[]" id="<?php echo "checkmodel".$models_row[$i]['id']; ?>" value="<?php echo $models_row[$i]['id'];?>" type="checkbox"><a ><?php echo $models_row[$i]['name']; ?></a></li>


                <?php
                       }

                    }

                ?>
                    <!--<li><input name="models[]" type="checkbox"><a href="?model=ridicon"> Ridicon</a></li>
                    <li><input name="models[]" type="checkbox"><a href="?model=turbo"> Turbo</a></li>
                    <li><input name="models[]" type="checkbox"><a href="#"> Mutlu</a></li>
                    <li><input name="models[]" type="checkbox"><a href="#"> Varta</a></li>-->
                </ul>
        </div>

        <div class="setting">

        <span>Цена<li class="arrow-down fas fa-caret-down"></li></span>
            <ul class="subsettings">
        <li><input type="number" placeholder="Минимальная цена"></li>
        <li><input type="number" placeholder="Максимальная цена"></li>
            </ul>
         </div>

         <div class="setting settings-saver">

        <span><button id="settings-saver-button" type="submit">Показать</button></span>

        </div>

        </form>


    </div>  


</div>

<div class="catalog-container container">

    <div class="catalog">
        <?
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

<script src="scripts/product-view.js"></script>

</body>
</html>