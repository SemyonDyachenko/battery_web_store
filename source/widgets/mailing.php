<div class="mailing-container container">

    <div class="mailing">

        <div class="mailing-info">
            <h2>
                ПОДПИШИСЬ НА РЫССЫЛКУ<br>
                И ПЕРВЫЙ УЗНАВАЙ О НОВЫХ<br>
                ПРЕДЛОЖЕНИЯХ
            </h2>
        </div>

        <div class="mailing-form">
            <input type="email" onkeyup="checkEmailInput()" id="mailing-email" name="mailing-email" placeholder="Электронная почта"><br>
            <button type="submit" id="mailing-send" name="mailing-send" disabled>Подписаться</button>
        </div>

    </div>


</div>


<script>

    function checkEmailInput()
    {
        let email = $("input#mailing-email").val();

        if(email.length != 0)
        {
            $("button#mailing-send").removeAttr('disabled');
        }
        else {
            $("button#mailing-send").attr('disabled','disabled');
        }

    }

</script>