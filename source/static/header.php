<div class="header desktop">
    <nav id="page-nav">
        <ul id="search-container">
            <li><input type="text" name="page-search" id="page-search" placeholder="Поиск по сайту"></li> <a id="page-searcher" href="#"><li class="fas fa-search"></li></a>
        </ul>
        <ul id="menu">
            <li class="menu-elem"><a href="/">Главная</a></li>
            <li class="menu-elem"><a href="catalog.php">Каталог</a></li>
            <li class="menu-elem"><a href="">Контакты</a></li>
            <li class="menu-elem"><a href="">Помошь</a></li>
            <li  class="menu-elem bag-link"><a style="font-size: 15px;" href=""><i class="fas fa-shopping-bag"></i></a></li>

            <?php  
                if(empty($_COOKIE['email'])) {
            ?>
            <li class="menu-elem profile-link"><a href="signup.php"><i class="fas fa-user"></i></a></li>

            <?php } else { ?>
                <li class="menu-elem profile-link"><a href="account.php">Личный кабинет</a></li>

            <?php  } ?>

        </ul>

    </nav>

</div>


<div class="under-header desktop">

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


</div>

