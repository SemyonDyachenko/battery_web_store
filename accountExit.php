<?php

unset($_COOKIE['user_id']);
unset($_COOKIE['email']);

setcookie('user_id',null,-1);
setcookie('email',null,-1);

$home_url = 'http://' . $_SERVER["HTTP_HOST"];
header('Location: '. $home_url);

?>