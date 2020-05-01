<?php

include "source/server/db_connect.php";

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
            <div class="sign-headline">

              <h3>Войти в систему</h3>

            </div>

            <div class="signform-container">
                <form action="<?php  echo $SERVER['PHP_SELF']; ?>" id="signform"  method="POST">
                    <input type="email" id="signin-email" name="signin-email" placeholder="E-mail"><br><br>
                    <input  type="password" id="signin-password" name="signin-password" placeholder="Пароль"><br><br>

                    <button type="submit" id="signup-button" name="signin-button">Войти</button><br>

                    <a style="display:block;margin-top:25px;font-size:18px;" href="signup.php">Еще не зарегистрированы?</a>
                </form>
            </div>
        </div>
    </div>
</body>

</html>