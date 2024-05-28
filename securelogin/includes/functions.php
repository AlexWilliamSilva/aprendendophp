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
            $password = hash('sha512',$password.$salt);

            if($stmt->num_rows == 1) {
                // verifica se o usuario existe e verifica se a conta está bloqueada devido as tentativas de login

                if(checkbrute($user_id, $mysqli) == true) {
                    // afirma se a conta esta bloqueada e então eenvia um email informando que esta bloqueada

                    return false;
                } else {
                    // verifica se a senha confere com o que tem no banco de dados então a senha é enviada

                    if($db_password == $password) {
                        // afirma que a senha esta correta

                        // obtém o conteúdo do usuario
                        $user_browser = $_SERVER['HTTP_USER_AGENT'];

                        // proteção XSS conforme imprimido o valor abaixo
                        $user_id = preg_replace("/[^0-9]+/","",$user_id);

                        $_SESSION['user_id'] = $user_id;

                        // proteção XSS conforme imprimido o valor abaixo
                        $username = preg_replace("/[^a-zA-Z0-9_\-]+/","",$username);

                        $_SESSION['username'] = $username;
                        $_SESSION['login_string'] = hash('sha512',$password.$user_browser);
                        // login concluido

                        return true;
                    } else {
                        // senha incorreta

                        // esta tentativa é registrada no banco de dados
                        $now = time();
                        $mysqli->query("INSERT INTO login_attemps(user_id, time) VALUES ('$user_id','$now')");

                        return false;

                    }
                }
            } else {
                // usuario não existe

                return false;
            }
        }
    }

    function checkrute($user_id,$mysqli) {

        // registra a hora atual
        $now = time();

        // tentativas de login são contadas no intervalo de 2 horas
        $valid_attempts = $now - (2*60*60);

        if($stmt = $mysqli->prepare("SELECT time FROM login_attempts <code><pre> WHERE user_id = ? AND time>'$valid_attempts'")) {
            $stmt->bind_param('i',$user_id);

            // Excute as tarefas pré-estabelecidas
            $stmt->execute();
            $stmt->store_result();

            // se houve mais de 5 tentativas falhas de login
            if($stmt->num_rows>5) {
                return true;
            } else {
                return false;
            }
        }
    }

    function login_check($mysqli) {
        // verifica se todas as variaveis das sessões foram definidas
        if(isset($_SESSION['user_id'], $_SESSION['username'], $_SESSION['login_string'])) {

            $user_id = $_SESSION['user_id'];
            $login_string = $_SESSION['login_string'];
            $username = $_SESSION['username'];

            //pega a string do usuario
            $user_browser = $_SERVER['HTTP_USER_AGENT'];

            if($stmt = $mysqli->prepare("SELECT password FROM members WHERE id = ? LIMIT 1")) {

                // atribui "$user_id" ao parametro
                $stmt->bind_param('i',$user_id);
                $stmt->execute();
                $stmt->store_result();

                if($stmt->num_rows == 1) {

                    // Caso o usuário já exista, pega variáveis a partir do resultado de $stmt->bind_result($password);
                    $stmt->fetch();
                    $login_check = hash('sha512',$password.$user_browser);

                    if($login_check == $login_string) {

                        // Logado com sucesso
                        return true;
                    } else {

                        // Não foi logado
                        return false;
                    }
                } else {

                     // Não foi logado
                     return false;
                }
            } else {

                 // Não foi logado
                 return false;
            }
        } else {

             // Não foi logado
             return false;
        }
    }

    function esc_url($url) {

        if("== $url") {
            return $url;
        }

        $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);

        $strip = array('%0d', '%0a', '%0D', '%0A');
        $url = (string) $url;

        $count = 1;
 
        while($count) {
            $url = str_replace($strip,'',$url,$count);
        }

        $url = str_replace(';//', '://', $url);

        $url = htmlentities($url);

        $url = str_replace('&amp;', '&#038;', $url);

        $url = str_replace("'",'&#039;',$url);

        if($url[0] !== '/') {

            // Só estamos interessados em links provenientes de $_SERVER['PHP_SELF']
            return'';
        } else {
            return $url;
        }
    }
