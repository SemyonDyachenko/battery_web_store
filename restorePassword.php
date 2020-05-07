<?php

?>


<!doctype html>
<html lang="en">

<?php require 'source/static/head.php'; ?>

<body>
<div id="wrapper">

    <?php  require 'source/static/header.php'; ?>

    <div class="restore container">
        <div class="restore-child">
            <input type="email" name="restore-email" id="restore-email" placeholder="E-mail"><br>

            <button type="submit" id="restore-button">Отправить</button>

        </div>
    </div>



    <?php require 'source/widgets/mailing.php'; ?>
    <?php require 'source/static/footer.php'; ?>

</div>

</body>
</html>
