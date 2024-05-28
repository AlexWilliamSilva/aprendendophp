<?php
    include_once 'db_connect.php';
    include_once 'functions.php';

    sec_session_start(); // segurança personalizada para criar uma sessão

    if(isset($_POST['email'],$_POST['p'])) {

        $email = $_POST['email'];
        $password = $_POST['p']; 

        if(login($email,$password,$mysqli) == true) {

            // login feito com sucesso
            header('Location:../protected_page.php');
        } else {

            // Falha no login
            header('Location:../index.php?error=1');
        }
    } else {

        // As variaveis POST que estão corretas não forma enviadas para esta pagina
        echo 'Invalid Request';
    }