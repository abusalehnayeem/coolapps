<?php
session_start();
function success() {
    if ($_SESSION['login']&&$_SESSION['id']) {
        //$login = $_SESSION['login'];
        return true;
    }
    else{
        return false;
    }
}
?>
