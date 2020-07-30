<?php
include 'source/server/QueryBuilder.php';

try {
    $pdo = new PDO("mysql:host=localhost;dbname=akkums", 'root', '');
}
catch (PDOException $e)
{
    die('Не удалось подключиться к базе данных');
}

$db = new QueryBuilder($pdo);


$query = "SELECT * FROM `cart` WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
$statement = $pdo->prepare($query);
$statement->execute();
 
$cart_count = $statement->rowCount();

if($cart_count == 0) {
    header('Location: http://'.$_SERVER['HTTP_HOST']);
    
} else {


if(isset($_POST['order-button']))
{
    $firstname = trim($_POST['firstname']);
    $lastname = trim($_POST['lastname']);
    $middlename = trim($_POST['middlename']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $address = trim($_POST['useraddress']);


    $query = "SELECT * FROM `cart` WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
    $statement = $pdo->prepare($query);
    $statement->execute();
    $cart_row = $statement->fetchAll();
    
    $cart_count = $statement->rowCount();
    
    $order_id =  substr((base_convert(sha1(uniqid(mt_rand(), true)), 16, 36)),0,8);

    $to_email = "semyondyachenko@gmail.com";
    $subject = "Заявка на оформление заказа | абинск-автосервис.рф";

    $products = "";
    $order_info = "";

    for($i = 0;$i < $cart_count;$i++) {
    $products .= "<a>абинск-автосервис.рф/product?id=".$cart_row[$i]['cart_product_id']."</a><br>";
    $order_info .=$cart_row[$i]['cart_product_id'].",";
    }

    $message = 
    "
    <!DOCTYPE HTML>
    <html>
    <head>
        <meta charset='utf8'>
    </head>
    <body>
        <h1>Заявка на оформление заказа</h1>
        <br>
        <h2>Информация о покупателе:</h2>
        <br>
        <h3>E-mail:".$email."</h3>
        <h3>Имя:".$firstname."</h3>
        <h3>Фамилия:".$lastname."</h3>
        <h3>Отчество:".$middlename."</h3>
        <h3>Номер телефона:".$phone."</h3>
        <h3>Адрес доставки:".$address."</h3>
        <br>
        <br>
        <h2>Информация о заказе</h2>
        <br>
        ".$products."

    </body>

    </html>
    ";



   if(!empty($firstname) && !empty($lastname) && !empty($middlename) && !empty($email) && !empty($phone) && !empty($address))
    {
        if(!empty($_COOKIE['user_id']))
        {
            $db->Create('orders',array(
                "order_id" => $order_id,
                "user_id"=> (int)$_COOKIE['user_id'],
                "order_info" => $order_info
            ));
        }
        else 
        {
            $db->Create('orders',array(
                "order_id" => $order_id,
                "user_id"=> 999999,
                "order_info" => $order_info
            ));
        }

        $query = "DELETE FROM `cart` WHERE cart_ip = '{$_SERVER['REMOTE_ADDR']}'";
        $statement = $pdo->prepare($query);
        $statement->execute();


        for($i = 0;$i < $cart_count;$i++) {

            $product_id = $cart_row[$i]['cart_product_id'];

            $query = "UPDATE `akb` SET available='0' WHERE id='$product_id'";
            $statement = $pdo->prepare($query);
            $statement->execute();
            

        }


        mail($to_email,$subject,$message);


        header('Location: http://'.$_SERVER['HTTP_HOST']."/denwer/result?order_id=".$order_id);
    }

    else {
        echo "Заполните все поля правильно.";
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

<!doctype html>
<html lang="en">
<?php
    require 'source/static/head.php';
?>

<!--
$orderNumber = round(microtime(true) * 1000);
echo $orderNumber;

-->

<body>
<div id="wrapper">

    <?php
    require 'source/static/header.php';
    ?>


    <div class="order-container container">
        <div class="order-child container">
            <div class="order-headline">
                <h1>Оформление заказа</h1>
            </div>

            <div class="order-content">
                <div class="order-form">


                    <form id="order-form-form" method="POST" action="order">
                    <h3>Введите данные для доставки</h3>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Имя:</span><br>
                             <input type="text" onkeyup="checkValidate()" id="firstname" name="firstname" placeholder="Иван" value="<?php if(!empty($_COOKIE['user_id'])) { echo $row['firstname']; } else { echo "";}?>"> <br>
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Фамилия:</span><br>
                            <input type="text" onkeyup="checkValidate()" id="lastname" name="lastname" placeholder="Иванов" value="<?php if(!empty($_COOKIE['user_id'])) { echo $row['lastname']; } else {echo ""; } ?>"><br>
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Отчество:</span><br>
                            <input type="text" onkeyup="checkValidate()" id="middlename" name="middlename" placeholder="Иванович" value="<?php if(!empty($_COOKIE['user_id'])) { echo $row['middlename']; } else { echo "";} ?>"><br>
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>E-mail:</span><br>
                            <input type="email" onkeyup="checkValidate()" id="email" name="email" placeholder="user@example.ru" value="<?php if(!empty($_COOKIE['user_id'])) { echo $row['email']; } else {echo ""; } ?>">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Номер телефона:</span><br>
                            <input type="tel" onkeyup="checkValidate()" id="phone" name="phone" placeholder="+1 (234) 567-89-00" value="<?php if(!empty($_COOKIE['user_id'])) { echo $row['usernumber']; } else {echo ""; } ?>">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Город:</span><br>
                            <input type="text" id="town" name="town" placeholder="Москва" style="pointer-events:none;" value="Абинск">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Улица,дом,квартира:</span><br>
                            <input type="text" onkeyup="checkValidate()" id="useraddress" name="useraddress" placeholder="" value="<?php if(!empty($_COOKIE['user_id'])) { echo $row['useraddress']; } else { echo ""; } ?>">
                        </div>


                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <span>Почтовый индекс:</span><br>
                            <input type="text" id="zip" name="zip" placeholder="111111" style="pointer-events:none;" value="353320">
                        </div>

                        <div class="order-form-element" title="Значение в поле - образец ввода,введите свои данные.">
                            <button type="submit" id="order-button" name="order-button" disabled>Оформить заказ</button>
                        </div>



                    </form>
                </div>

                <div id="order-info">
                <?php


            $user_ip = $_SERVER['REMOTE_ADDR'];

            $row = $db->GetAllData('cart', "cart_ip", $user_ip);


            $product_ids = array();

            for ($i = 0; $i < count($row); $i++) {
                $product_ids[$i] = $row[$i]['cart_product_id'];
            }

?>
                    <div id="order-info-headline">
                        <h4>Ваш заказ</h4>
                    </div>

                    <div class="order-info-container container">
                        <div class="order-list">
                        <?php
                for ($i = 0; $i < count($product_ids);$i++)
                {
                    $row = $db->GetAllData('akb','id',$product_ids[$i]);

                    if($row[0]['available'] == 1) {

                    $imgpath = $row[0]["imgpath"];
                    $headline = $row[0]["modelname"];
                    $capacity = $row[0]['capacity'];
                    $amperage = $row[0]['amperage'];
                    $price = $row[0]['price'];
                    ?>
                            
                            <div class="order-list-element">

                                    <div class="order-list-child-element">

                                        <div class="order-element-image-box">
                                            <img src="<?php echo $imgpath;?> "alt="akb.jpg">

                                        </div>

                                        <div class="order-element-content">
                                            <div class="order-element-headline">
                                                <h3>Аккумулятор <?php echo $headline; ?> </h3>
                                            </div>
                                            <div class="order-element-feature">
                                                <h4>Емкость: <?php echo $capacity; ?> Ач</h4>
                                                <h4>Пусковой ток: <?php echo $amperage; ?> Ач</h4>
                                                <h4>Цена: <?php echo $price; ?> RUB </h4>
                                                <h4><a href="<?php echo "product?id=".$row[0]['id']; ?>">Подробнее</a></h4>
                                            </div>

                                        </div>
                                
                                    </div>

                            </div>

                            <?php 

                    }
                }
                ?>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    require 'source/static/footer.php';
    ?>
</div>

<script>

window.onload = function() {
        // Works most of the time but not all of the time.
        // Especially if my.js injects another script that contains myFunction().
        checkValidate();
    };


function checkValidate() {


    let ids = [
        $('input#firstname').val(),
        $('input#lastname').val(),
        $('input#middlename').val(),
        $('input#email').val(),
        $('input#phone').val(),
        $('input#useraddress').val()
    ];

    console.log(ids);

    if(ids[0].length > 1 && ids[1].length > 1 && ids[2].length > 2 && ids[3].length > 5 && ids[4].length > 10 && ids[5].length > 4)
    {
        $("button#order-button").removeAttr('disabled');
    }
    else {
        $("button#order-button").attr('disabled','disabled');
    }
}




</script>



</script>



</body>
</html>

<?php } ?>