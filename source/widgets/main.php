<div id="main">

    <div id="info-slider">
    <div id="about-company">
        <div class="headline">
        <h1>Аккумуляторный Центр  № 1.</h1>
        </div>

        <div class="about-text">
        <p>Магазин автомобильных аккумуляторов в городе Абинск.<br>Самые выгодные цены в городе.Аккумуляторы для легковых и грузовых автомобилей, ИБП.
        <br>Бесплатная доставка по городу.Скидка на новый аккумулятор при здаче старого.<br>Работаем 7 дней в неделю, без перерывов и выходных.</p>
        </div>
    </div>
    </div>

    <div id="rightbar">
    <form id="feed-call-form">
        <br>
        <h3>Обратный звонок</h3>

        <input type="text" id="feed-avto-model" name="feed-avto-model" placeholder="Марка и модель авто:"><br><br>

        <input type="tel" id="feed-phone" name="feed-phone" pattern="\+7\s?[\(]{0,1}9[0-9]{2}[\)]{0,1}\s?\d{3}[-]{0,1}\d{2}[-]{0,1}\d{2}" placeholder="Ваш телефон:"><br><br>

        <button type="submit" id="feed-button" name="feed-button">Отправить</button>
</form>

    <form id="bonus-price-form">
        <br>
        <h3>Цена при здаче Б/У</h3>

        <input type="number" id="bonus-price-input" name="bonus-price-input" placeholder="Обычная цена"><br><br>

        <input type="number" id="bonus-tok-input" name="bonus-tok-input" placeholder="Емкость аккумулятора"><br><br>

        <input type="button" id="bonus-calc-button" name="bonus-calc-button" value="Рассчитать"><br>

        <span id="bonus-newprice"></span>
    </form>
    </div>

   


</div>

<script>

    const bonusPrice = document.getElementById("bonus-price-input");
    const bonusTok = document.getElementById("bonus-tok-input");

    const bonusBtn = document.getElementById("bonus-calc-button");

    bonusBtn.addEventListener("click",function() {

        let newPrice =  Number(bonusPrice.value) - Number(bonusTok.value)*10; 

        document.getElementById("bonus-newprice").innerHTML = "Новая цена: " + newPrice;



    });
    

</script>
