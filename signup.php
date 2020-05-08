<?php

$dbc = mysqli_connect('localhost','root','','akkums');



if(!empty($_COOKIE['email'])) {
    $home_url = 'http://' . $_SERVER["HTTP_HOST"];
    header('Location: '. $home_url);
}


if(isset($_POST["signup-button"]))
{
    $email = mysqli_real_escape_string($dbc,trim($_POST["sign-email"]));
    $password = mysqli_real_escape_string($dbc,trim($_POST['sign-password']));
    $passwordRepeat = mysqli_real_escape_string($dbc,trim($_POST['sign-password-repeat']));

    if(!empty($email) && !empty($password) && !empty($passwordRepeat))
    {
        if(strlen($password) > 6 && strlen($password) < 16)
        {
            if($password == $passwordRepeat)
            {
                $query = "SELECT * FROM `users` WHERE email = '$email'";
                $data= mysqli_query($dbc,$query);

                if (mysqli_num_rows($data) == 0) {
                    // если такого нет, то сохраняем данные
                    $query =  mysqli_query($dbc,"INSERT INTO `users` (email,password) VALUES ('$email',SHA('$password'))") or die(mysqli_error($dbc));

                    $message ="Здравствуйте, на вашу почту был зарегестрирован аккаунт<br> на сайте абинск-автосервис.рф Аккумуляторный Цетр № 1.<br>Необходимо подтвердить E-mail,<br>для этого перейдите по ссылки ниже.<br>Если вы создавали аккаунт, то не реагируйте на это письмо.<br>Спасибо.";

                    $headers = "FROM: semyondyachenko@gmail.com\r\nReply-to: semyondyachenko@gmail.com\r\nContent-type: text/html; charset=utf-8\r\n";

                    mail($email,'Подтверждение E-mail Аккумуляторный Центр № 1',$message,$headers);

                    header('Location: login.php');
                    mysqli_close($dbc);

                    exit();
                }
                else {
                    echo 'Такой логин уже существует!';
                }
            }
            else {
                echo 'Извените, но пароли не совпадают!';
            }
        }
        else {
            echo 'Пароль не соответствует требованиям!';
        }
    }
    else {
        echo 'Заполните все поля';
    }

}


?>


<!DOCTYPE html>

<html lang="ru">
<?php require 'source/static/head.php'?>

<body>
    <div id="wrapper">
        <?php require 'source/static/header.php'; ?>

        <div id="signup-container">


            <div class="signform-container">

                <div class="signup-container">
                    <div class="signup-headline">

                        <h1>Регистрация</h1>

                    </div>
                <form id="signform"  method="POST">
                    <input class="sign-input" onkeyup="checkValidate()" type="email" id="sign-email" name="sign-email" placeholder="E-mail"><br><br>
                    <input class="sign-input"  onkeyup="checkValidate()"  type="password" id="sign-password" name="sign-password" placeholder="Пароль"><br><br>
                    <input class="sign-input" onkeyup="checkValidate()"  type="password" id="sign-password-repeat" name="sign-password-repeat" placeholder="Повторите пароль"><br><br>



                    <input onclick="checkValidate()" style="position:relative;" type="checkbox" class="custom-control-input privacy-check" id="defaultChecked2">
                    <label class="custom-control-label" for="defaultChecked2">я соглашаюь с <a href="copyright.php">политикой конфиденциальности</a> и <a href="copyright.php">обработки<br>персональных данных</a></label><br>

                    <button type="submit" id="signup-button" name="signup-button" disabled>Регистрация</button><br>

                    <a style="display:block;margin-top:25px;font-size:18px;" href="login.php">Уже есть аккаунт ? Войти </a>
                </form>
                </div>

                <div class="sign-container">
                    <div class="login-form-headline">
                        <h1>Еще нет аккаунта?</h1>
                    </div>
                    <div class="sign-row">
                        <h3><i class="fas fa-angle-down"></i> Быстрое оформление заказа.</h3>

                        <h3><i class="fas fa-angle-down"></i> Просмотр истории заказов.

                            <h3><i class="fas fa-angle-down"></i> Добавление в избранное.</h3>

                            <h3><i class="fas fa-angle-down"></i> Корзина товаров.</h3>


                    </div>

                </div>

            </div>

        </div>

        <?php require 'source/widgets/mailing.php'; ?>
        <?php require 'source/static/footer.php'; ?>

    </div>

    <script>
        function checkValidate() {
            let email = $('input#sign-email').val();
            let password = $('input#sign-password').val();
            let passwordRepeat = $('input#sign-password-repeat').val();
            let privacyCheck = $('input.privacy-check');

            console.log(email,password,passwordRepeat);

            if(email.length >= 7 && password.length >=  7 && passwordRepeat.length >= 7 && password === passwordRepeat && privacyCheck.prop('checked') === true)
            {
                $('button#signup-button').removeAttr('disabled');
            }
            else {
                $('button#signup-button').attr('disabled','disabled');
            }
        }



    </script>


</body>

</html>