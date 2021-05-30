<?php

session_start();

if(isset($_SESSION['userid']))
{
    unset($_SESSION['userid']);
}

header("Location: login.php");
die;

?>