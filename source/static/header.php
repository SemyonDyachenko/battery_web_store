<div class="header desktop">
    <nav id="page-nav">
        <ul id="search-container">
            <li><form method="GET" action="search"><input type="text" name="page-search" id="page-search" placeholder="Поиск по сайту"><button style="background:none;border:none;color:white;padding-left:10px;" type="submit" id="page-searcher"><li class="fas fa-search"></li></form></li>
        </ul>
        <ul id="menu">
            <li class="menu-elem nav-button"><a href=""><i class="fas fa-bars"></i></a></li>
            <li  class="menu-elem nav-button"><a href="/">Главная</a></li>
           <!-- <li class="menu-elem nav-button"><a href="catalog">Каталог</a></li>-->
            <li class="menu-elem nav-button"><a href="contacts">Контакты</a></li>
            <li class="menu-elem nav-button"><a href="">Помошь</a></li>
            <li  class="menu-elem bag-link"><a style="font-size: 15px;" href="cart"><i class="fas fa-shopping-bag"></i></a>
            <?php 
             $dbc = mysqli_connect('localhost','root','','akkums');

             $query = mysqli_query($dbc,"SELECT * FROM `cart` WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'");

             $count_of_cart = mysqli_num_rows($query);

             if($count_of_cart != 0)
             {
            ?>
            
            <div class="cart-count-number">
              <a href="cart">  
                  <?php 
                 echo $count_of_cart;
                    ?>
                </a>
                
             </div>
              <? } ?>

            </li>

            <?php  
                if(empty($_COOKIE['email'])) {
            ?>
            <li class="menu-elem profile-link"><a href="login">Войти</a></li>

            <?php } else { ?>
                <li class="menu-elem profile-link"><a href="account">Личный кабинет</a></li>

            <?php  } ?>

        </ul>

    </nav>

</div>


<!--<div class="under-header desktop">

    <div id="sector">
            <div id="sector-logo">
                <a href="#"><img src="resource/images/logotip.png" alt="logo image"></a>
            </div>

            <div id="sector-address">
                <div class="name"><li class="fas fa-map-marker-alt"></li> Точки продаж:</div>
                <div class="text">Советов, 120</div>
            </div>

            <div id="sector-time">
            <div class="name"><li class="fas fa-clock"></li> График работы:</div>
            <div class="text">пн-вс 08:00-19:00</div>
            </div>

            <div id="sector-contacts">
                <div class="tel">
                    <a href="tel:+79180599600">+7 (918) 059-96-00</a>
            
                </div>
            </div>

        </div>


</div>-->

