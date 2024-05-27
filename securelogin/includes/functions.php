<?php
    include_once 'psl-config.php';

    function sec_session_start() {

        $session_name='sec_session_id'; //nome para a sessão

        $secure = SECURE;

         // impede que o através do javascript, seja capaz de acesssar o nome da sessão

        $httponly = true; 

        // força a sessão a usar apenas cookies

        if(ini_set('session.use_only_cookies',1)===FALSE) {
            header("Location:../error.php?err=Could not initiate a safe session(ini_set)");
            exit;
        }

        // obtém params de cookies atualizados

        $cookieParams = session_get_cookie_params();
        session_set_cookie_params($cookieParams["lifetime"],

            $cookieParams["path"],
            $cookieParams["domain"],
            $secure,
            $httponly);

        // estabelece o nome fornecido como o nome da sessão

        session_name($session_name);
        session_start(); // inicializa a sessão
        session_regenerate_id(); // recupera a sessão e deleta a anterior
    }

    function login($email,$password,$mysqli) {

        // definições pré-estabelecidas impedem a injeção de um ataque SQL

        if($stmt=$mysqli->prepare("SELECT id, username, password, salt FROM members WHERE email=? LIMIT 1")) {

            $stmt->bind_param('s',$email); // Relaciona email ao parâmetro

            $stmt->execute(); // executa uma tarefa pré-estabelecida

            $stmt->store_result();

            // obtém as variaveis através do resultado

            $stmt->bind_result($user_id,$username,$db_password,$salt);
            $stmt->fetch();

            // faz o hash da senha com um salt
        }
    }
?>