


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


                $dbc = mysqli_connect('localhost','root','','akkums');

                $query = mysqli_query($dbc,"SELECT * FROM `models`");

                $models_row = mysqli_fetch_array($query);

                   if(mysqli_num_rows($query) > 0)
                   {
           
                      do {
                       
                ?>
                    <li><input name="models[]" id="<?php echo "checkmodel".$models_row['id']; ?>" value="<?php echo $models_row['id'];?>" type="checkbox"><a ><?php echo $models_row['name']; ?></a></li>


                <?php
                       } while($models_row = mysqli_fetch_array($query));

                    }  
                    else {

                ?>
                    <li><a><?php echo "Список фильтров пуст" ?></a></li>

                <?php
                    }
                ?>
        
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
        $akb_query = mysqli_query($dbc,"SELECT * FROM akb WHERE available = '1'");
    
        $akb_row = mysqli_fetch_array($akb_query);

        if(mysqli_num_rows($akb_query) > 0)
        {

           do {

        ?>
        <div class="product-container">
            <div class="product-container-child">
                <a href="<?php echo "product?id=".$akb_row['id']; ?>">
                <div class="product-container-price">
                    <h4><?php echo $akb_row['price']; ?> RUB</h4>
                </div>
                <div class="product-container-image">
                    <?php $imgpath = $akb_row['imgpath'];
                   echo  '<img src="'.$imgpath.'" alt="product.jpg">'; ?>
                </div>
                <div class="product-container-about">
                   <h3 class="modelname-headline"><?php echo $akb_row['modelname']; ?></h3>

                </div>
                </a>
            </div>
        </div>



        <?php
                } while($akb_row = mysqli_fetch_array($akb_query));
            }
            else  {
                
            ?>
                  <div class="product-container">
            <div class="product-container-child">
                <a href="#">
                <div class="product-container-price">
                    <h4></h4>
                </div>
                <div class="product-container-image">
                
                </div>
                <div class="product-container-about">
                   <h3 class="modelname-headline"><?php echo "Не найденное ни одного товара." ?></h3>

                </div>
                </a>
            </div>
        </div>

            <?php 
            }
            mysqli_close($dbc);
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