<?php
include("functions.php");
unset($_SESSION['login_mail']);
unset($_SESSION['login_pass']);
die('<meta http-equiv="refresh" content="0; url=index.php"/>');
?>