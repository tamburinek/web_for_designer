<?php
/*zahájení session*/
session_start();
/*smazání session*/
unset($_SESSION['login_user']);
header("Location: omne.php");
?>
