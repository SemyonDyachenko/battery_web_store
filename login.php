<?php



if(!empty($_COOKIE['email'])) {
    $home_url = 'http://' . $_SERVER["HTTP_HOST"];
    header('Location: '. $home_url);
}


$dbc = mysqli_connect('localhost','root','','akkums');


if(!isset($_COOKIE['user_id']))
{
    if(isset($_POST["signin-button"]))
    {
        $user_email = mysqli_real_escape_string($dbc,trim($_POST["signin-email"]));
        $user_password = mysqli_real_escape_string($dbc,trim($_POST['signin-password']));

        if(!empty($user_email) && !empty($user_password))
        {
            $query = "SELECT `id` ,`email` FROM `users` WHERE email = '$user_email' AND password = SHA('$user_password')";
            $data= mysqli_query($dbc,$query);

    
            if (mysqli_num_rows($data) == 1) {
                $row = mysqli_fetch_assoc($data);
                setcookie('user_id',$row['id'],time() + (60*60*24*30));
                setcookie('email',$row['email'],time() + (60*60*24*30));
                
                $home_url = 'http://' . $_SERVER["HTTP_HOST"];
                header('Location: '. $home_url);
  
            }
            else
            {
                echo 'Данный пользователь не зарегестрирован в системе. Проверьте данные.';
            }
        }

        else {
            echo 'Заполните все поля';
        }

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
                 <div class="login-container">

                     <div class="login-form-headline">
                         <h1>Войти</h1>
                     </div>

                <form action="<?php  echo $_SERVER['PHP_SELF']; ?>" id="signform"  method="POST">
                    <input class="sign-input" onkeyup="checkValidate()" type="email" id="signin-email" name="signin-email" placeholder="E-mail"><br><br>
                    <input class="sign-input"  onkeyup="checkValidate()" type="password" id="signin-password" name="signin-password" placeholder="Пароль"><br><br>


                    <a href="restorePassword.php">Забыли пароль?</a><br>

                    <button type="submit" id="signup-button" name="signin-button" disabled>Войти</button><br>

                    <a style="display:block;margin-top:25px;font-size:18px;" href="signup">Еще не зарегистрированы?</a>
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

                            <button id="go-sign"><a href="signup">Регистрация</a></button><br>
                    </div>

                </div>
            </div>
        </div>

        <?php require 'source/widgets/mailing.php'; ?>
        <?php require 'source/static/footer.php'; ?>

    </div>

    <script>

        function checkValidate() {
            let email = $('input#signin-email').val();
            let password = $('input#signin-password').val();

            if (email.length <= 5) {
                $('input#signin-email').addClass('no-validate');
            } else {
                $('input#signin-email').removeClass('no-validate');
            }

            if(password.length < 7)
            {
                $('input#signin-password').addClass('no-validate');
            } else {
                $('input#signin-password').removeClass('no-validate');
            }

            if(email.length > 5 && password.length >= 7)
            {
                $("button#signup-button").removeAttr('disabled');
            }
            else {
                $("button#signup-button").attr('disabled','disabled');
            }
        }






    </script>






</body>

</html>