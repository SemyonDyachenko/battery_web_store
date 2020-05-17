<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
    include "../db_connect.php";
    include "../QueryBuilder.php";
    
    $db = new QueryBuilder($pdo);

    $id = $_POST['id'];

    $result = $db->Create();


}