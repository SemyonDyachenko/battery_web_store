<?php

function send_mail($to_email,$mail_subject,$mail_message,$headers=0)
{

    mail($to_email,$mail_subject,$mail_message,$headers);
}



?>