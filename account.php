
<?php


include "source/server/QueryBuilder.php";
include "source/server/db_connect.php";



$dbc = mysqli_connect('localhost','root','','akkums');

if(!empty($_COOKIE['email']) && !empty($_COOKIE['user_id']))
{

    if(isset($_POST['account-button']))
    {
        $user_id = $_COOKIE['user_id'];
        $user_email = $_COOKIE['email'];

        $real_first_name= mysqli_real_escape_string($dbc,trim($_POST['realname-first']));
        $real_last_name = mysqli_real_escape_string($dbc,trim($_POST['realname-last']));
        $real_middle_name= mysqli_real_escape_string($dbc,trim($_POST['realname-middle']));
        $borndate = mysqli_real_escape_string($dbc,trim($_POST['borndate']));
        $user_phone = mysqli_real_escape_string($dbc,trim($_POST['user-number']));
        $user_address = mysqli_real_escape_string($dbc,trim($_POST['user-address']));     

   
        $query = "UPDATE `users` SET firstname='$real_first_name',lastname='$real_last_name',middlename='$real_middle_name',borndate='$borndate',usernumber='$user_phone',useraddress='$user_address'  WHERE email = '$user_email'";
        $data = mysqli_query($dbc,$query);
    

        mysqli_close($dbc);
    }   


}


?>


<!DOCTYPE html>

<html lang="ru">
<?php require 'source/static/head.php'?>

<body>
    <div id="wrapper">
        
        <?php require 'source/static/header.php'; ?>

        <div id="account-container">
            <div class="account-headline"><h2>Ваш профиль</h2></div>
        </div>

        <div id="account-info">
            <section id="account-logo">
                <li class="fas fa-user"></li>
            </section>

            <section id="account-data">

            <div id="already-account-info">

          
                <span name="email-info">E-mail: <?php echo $_COOKIE['email']; ?></span><br>

                <?php 
                    $dbc = mysqli_connect('localhost','root','','akkums');

                    $user_email = $_COOKIE['email'];

                    $query = "SELECT * FROM `users` WHERE email = '$user_email'";

                    $result = mysqli_query($dbc,$query);

                    $row = mysqli_fetch_assoc($result);


                    if($row['firstname'])
                    {

                ?>

                <span name="firstname-info">Иия: <?php echo $row['firstname']; ?></span><br>

                <?php 

                    }
                    ?>

                <?php if($row['lastname']) { ?>

            
                <span name="lastname-info">Фамилия: <?php echo $row['lastname']; ?></span><br>

                <?php } ?>
                

                <?php if($row['middlename']) { ?>

                    <span name="middlename-info">Отчество: <?php echo $row['middlename']; ?></span><br>
                    
                <?php  } ?>

                <?php if($row['borndate']) { ?>
                    <span name="borndate-info">Дата рождения: <?php echo $row['borndate']; ?></span><br>

                <?php } ?>

                <?php if($row['usernumber']) { ?>

                <span name="usernumber-info">Номер телефона: <?php echo $row['usernumber']; ?></span><br>
                    
                <?php  } ?>

                <?php if($row['useraddress']) { ?>

                <span name="useraddress-info">Адрес: Абинск,<?php echo $row['useraddress']; ?></span><br>

                <?php  } ?>


                </div>

                <form id="realname-info" method="POST">
                    <h5>Заполните личные данные, для быстрого заказа.</h5><br><br>

                    <?php if(!$row['firstname']) { ?>
                    <label for="realname-first">Имя: </label>
                    <input type="text" id="realname-first" name="realname-first" placeholder=""><br><br>
                    <?php } ?>
                    <?php if(!$row['lastname']) { ?>
                    <label for="realname-last">Фамилия: </label>
                    <input type="text" id="realname-last" name="realname-last" placeholder=""><br><br>

                    <?php } ?>

                    <?php if(!$row['middlename']) { ?>
                    <label for="realname-last">Отчество: </label>
                    <input type="text" id="realname-middle" name="realname-middle" placeholder=""><br><br>

                    <?php } ?>

                    <?php if(!$row['borndate']) { ?>

                    <label for="borndate">Дата рождения: </label>
                    <input type="date" id="borndate" name="borndate" value="<?php echo $row['borndate']; ?>"><br><br>

                    <?php } ?>


                    <?php if(!$row['usernumber']) { ?>

                    <label for="user-number">Телефон: </label>
                    <input type="tel" id="user-number" name="user-number" value="<?php echo $row['usernumber']; ?>"><br><br>

                    <?php } ?>

        
                    
                    <h5>Адрес для доставки по Абинску.</h5><br><br>

                    <?php if(!$row['useraddress']) { ?>
                    <label for="user-address">Адрес: </label>
                    <input type="tel" id="user-address" name="user-address" value="<?php echo $row['useraddress'];?>"><br><br>

                    <?php } ?>

                    <?php if(!$row['firstname'] && !$row['lastname'] && !$row['middlename'] && !$row['borndate'] && !$row['usernumber'] && !$row['useraddress']) { ?>

                    <button type="submit" id="account-button" name="account-button">Сохранить</button>

                    <?php } ?>
                </form>

                <a href="accountExit.php">Выйти</a>
            </section>
        </div>

    </div>
</body>

</html>