<?php
setcookie('user_login','', time() -3600, "/");
header('Location: index.php');
exit();
