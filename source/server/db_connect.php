<?php



try {
    $pdo = new PDO("mysql:host=localhost;dbname=akkums", 'root', '');
}
catch (PDOException $e)
{
    die('Не удалось подключиться к базе данных');
}



?>