<?php






$brand = $_POST['feedcall-brand'];
$model = $_POST['feedcall-model'];
$phone = $_POST['phone'];
$name = $_POST['name'];

$email = "semyondyachenko@gmail.com";

$title = "Запрос на подбор аккумулятора с сайта.";

$text = "Привет мир";

$headers  = "Content-type: text/html; charset=utf-8 \r\n";


echo $text;


mail($email,$title,$text,$headers);

?>