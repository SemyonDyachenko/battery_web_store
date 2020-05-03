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

                    header('Location: signin.php');
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
            <div class="sign-headline">

              <h3>Регистрация</h3>

            </div>

            <div class="signform-container">
                <form id="signform"  method="POST">
                    <input type="email" id="sign-email" name="sign-email" placeholder="E-mail"><br><br>
                    <input  type="password" id="sign-password" name="sign-password" placeholder="Пароль"><br><br>
                    <input type="password" id="sign-password-repeat" name="sign-password-repeat" placeholder="Повторите пароль"><br><br>

                    <button type="submit" id="signup-button" name="signup-button">Регистрация</button><br>

                    <a style="display:block;margin-top:25px;font-size:18px;" href="signin.php">Уже есть аккаунт ? Войти </a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>