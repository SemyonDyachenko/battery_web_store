


<div id="main">



    <div class="feedcall-container container">

        <div class="feedcall-container-child">
            <div class="feedcall-headline">
                <div>

                <h3>Подбор аккумулятора для вас</h3>
                </div>
                <div>
                <h4>Заполните поля ниже и мы подберем аккумулятор для вас,в разных ценовых категориях и перезвоним вам в ближайщее время.</h4>
                </div>
            </div>
            <div class="feedcall-form">

            <form method="POST">

                    <input type="text" onkeyup="CheckFeedCall()" id="feedbcall-brand" name="feedcall-brand" placeholder="Марка автомобиля">

                    <input type="text" onkeyup="CheckFeedCall()" id="feedcall-model" name="feedcall-model" placeholder="Модель автомобиля">

                    <input type="tel" onkeyup="CheckFeedCall()" id="feedcall-phone" name="feedcall-phone" placeholder="+7 (999) 999-99-99">

                    <input type="text" onkeyup="CheckFeedCall()" id="feedcall-name" name="feedcall-name" placeholder="Как к вам обращаться?">


                    <button type="submit" id="feedcall-send-button" name="feedcall-send-button" disabled>Отправить</button>

            </form>

            </div>

        </div>

    </div>

    <div class="select-container container">

        <div class="select-container-child">



        </div>

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

<script>



    function CheckFeedCall()
    {
        let feedBrand = $("input#feedbcall-brand").val();
        let feedModel = $("input#feedcall-model").val()
        let feedPhone = $("input#feedcall-phone").val();
        let feedName = $("input#feedcall-name").val();

        if(feedBrand.length != 0 && feedModel.length != 0 && feedPhone.length != 0 && feedName.length !=0 && feedPhone.length >= 11) {
            $("button#feedcall-send-button").removeAttr('disabled');
        }
        else {
            $("button#feedcall-send-button").attr('disabled','disabled');
        }

    }

    $(document).ready(function()
    {
      $('#feedcall-send-button').on('click',function() {

          let feedBrand = $("input#feedbcall-brand").val();
          let feedModel = $("input#feedcall-model").val();
          let feedPhone = $("input#feedcall-phone").val();
          let feedName = $("input#feedcall-name").val();


          //send
          $.ajax({
             method: "POST",
             url: "source/server/mail.php",
             data: {brand:feedBrand,model:feedModel,phone:feedPhone,name:feedName }
          }).done(function (msg) {
            alert("Data Saved: " + msg);
          });


      });

    });


</script>
