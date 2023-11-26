<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION["login"]) || !isset($_SESSION["cpf"]) || !isset($_SESSION["id"])) {
    $message = "Usuário não autorizado!";
    header("location: error.php");
    die();
}

