<?php
    include_once 'functions.php';

    sec_session_start();

    // desfaz todos os valores da sessão
    $SESSION = array();

    // obtém os parametros da sessão
    $params = session_get_cookie_params();

    // deleta o cookie em uso
    setcookie(session_name(),

     '', time() -42000,
     $params["path"],
     $params["domain"],
     $params["secure"],
     $params["httponly"]);

     // destroi a sessão
     session_destroy();
     header('Location:../index.php');