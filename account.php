
<?php


include "source/server/QueryBuilder.php";




$dbc = mysqli_connect('localhost','root','','akkums');

if(!empty($_COOKIE['email']) && !empty($_COOKIE['user_id']))
{

    if(isset($_POST['personal-data-button']))
    {
        $user_id = $_COOKIE['user_id'];
        $user_email = $_COOKIE['email'];

        $real_first_name= mysqli_real_escape_string($dbc,trim($_POST['firstname']));
        $real_last_name = mysqli_real_escape_string($dbc,trim($_POST['lastname']));
        $real_middle_name= mysqli_real_escape_string($dbc,trim($_POST['middlename']));
        $user_phone = mysqli_real_escape_string($dbc,trim($_POST['phone']));
        $date = mysqli_real_escape_string($dbc,trim($_POST['date']));
   
        $query = "UPDATE `users` SET firstname='$real_first_name',lastname='$real_last_name',middlename='$real_middle_name',usernumber='$user_phone',borndate='$date' WHERE email = '$user_email'";
        $data = mysqli_query($dbc,$query);
    

        mysqli_close($dbc);
    }   

    if(isset($_POST['track-data-button']))
    {
        $user_id = $_COOKIE['user_id'];
        $user_email = $_COOKIE['email'];


        $address = mysqli_real_escape_string($dbc,trim($_POST['useraddress']));

        $query = "UPDATE `users` SET useraddress='$address' WHERE email='$user_email'";
        $data = mysqli_query($dbc,$query);

        mysqli_close($dbc);
    }

}


?>

<?php 
                    $dbc = mysqli_connect('localhost','root','','akkums');

                    $user_email = $_COOKIE['email'];

                    $query = "SELECT * FROM `users` WHERE email = '$user_email'";

                    $result = mysqli_query($dbc,$query);

                    $row = mysqli_fetch_assoc($result);


                ?>

<!DOCTYPE html>

<html lang="ru">
<?php require 'source/static/head.php'?>

<body>
    <div id="wrapper">
        
        <?php require 'source/static/header.php'; ?>

        <div id="account-container">
            <div class="account-headline"><h1>Мой аккаунт</h1></div>
        </div>

        <div id="account-info">
            <section id="account-logo">
                <div class="privacy-page">
                    <div class="privacy-detals">
                        <form class="privacy-personal-data" method="POST" action="account">
                            <header>
                                <span class="personal-data-title">
                                    Персональные данные
                                </span>

                                <span id="personal-data-change" class="personal-data-change"> 
                                        Изменить
                                </span>
                            </header>

                            <div class="privacy-personal-data-list">
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Имя
                                </p>
                                <input type="text" name="firstname" class="personal-data-element-input disable" value="<?php echo $row['firstname']; ?>">
                                </div>
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Фамилия
                                </p>
                                <input type="text" name="lastname" class="personal-data-element-input disable" value="<?php echo $row['lastname']; ?>">
                                </div>
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Отчество
                                </p>
                                <input type="text" name="middlename" class="personal-data-element-input disable" value="<?php echo $row['middlename']; ?>">
                                </div>
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Телефон
                                </p>
                                <input type="tel" name="phone" class="personal-data-element-input disable" value="<?php echo $row['usernumber']; ?>">
                                </div>
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Дата рождения
                                </p>
                                <input type="date" name="date" class="personal-data-element-input disable" value="<?php echo $row['borndate']; ?>">
                                </div>
                           
                            
                                <button type="submit" name="personal-data-button" id="personal-data-button" class="personal-data-button" disabled><span>Сохранить изменения</span></button>
                                

                            </div>
                        </form>
                    </div>

                </div>
           

            </section>

            <section id="account-logo">
                <div class="privacy-page">
                    <div class="privacy-detals">
                        <form class="privacy-personal-data" method="POST" action="account">
                            <header>
                                <span class="personal-data-title">
                                    Информация о доставке
                                </span>

                                <span id="track-data-change" class="track-data-change"> 
                                        Изменить
                                </span>
                            </header>

                            <div class="privacy-personal-data-list">
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Город
                                </p>
                                <input type="text" class="track-data-element-input disable" value="Абинск">
                                </div>
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Улица,Дом,Квартира
                                </p>
                                <input type="text" name="useraddress" class="track-data-element-input disable" value="<?php echo $row['useraddress']; ?>">
                                </div>
                                <div class="personal-data-element">
                                <p class="personal-data-element-title">
                                    Почтовый индекс
                                </p>
                                <input type="text" class="track-data-element-input disable" value="353320">
                                </div>
                              
                                <button type="submit" name="track-data-button" id="track-data-button" class="personal-data-button" disabled><span>Сохранить изменения</span></button>
                            </div>
                        </form>
                    </div>

                </div>
           

            </section>

         
             
        </div>

        <?php require 'source/static/footer.php'; ?>
    </div>

    <script src="scripts/account.js"></script>
</body>

</html>