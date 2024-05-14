<?php
        $obj_mysql = new mysql("127.0.0.1", "seu_usuario", "sua_senha", "tutocrudphp"); 

        $obj_mysqli = new mysqli("127.0.0.1", "root", "", "tutocrudphp");

        if ($obj_mysql->connect_errno)
        { //ocorreu uma conexão do php com o banco de dados
            echo "Ocorreu um erro na conexão com o banco de dados.";
            exit; //
        }

        mysqli_set_charset($obj_mysqli, 'utf8'); //mysqli_set_charset é responsável por informar a conexão atual que é em forma de utf8

        if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"]))
        { //isset = verificar a existencia de uma informação, empty = verificar se o dado foi preenchido
            if(empty($_POST["nome"]))
                    $erro = "Campo nome obrigatório";
            else 
            if(empty($_POST["email"]))
                    $erro = "Campo e-mail obrigatório";
            else
            {
                 //Local para a realização do cadastro ou dados enviados
            
                //local onde será realizado o cadastro e alteração do dados enviados    
                $nome = $_POST["nome"];
                $email = $_POST["email"];
                $cidade = $_POST["cidade"];
                $uf = $_POST["uf"];

                $stmt = $obj_mysqli->prepare("INSERT INTO 'cliente' ('nome', 'email', 'cidade', 'uf') values (?, ?)");
                $stmt->blind_param('ssss', $nome, $email, $cidade, $uf);

                if(!$stmt->execute())
                {
                    $erro = $stmt->error;
                }
                else 
                {
                    $sucesso = "Dados cadastrados com sucesso!";
                }
            }
        }

        if(isset($erro))
            echo '<div style="color:#F00">'.$erro.'</div><br/><br/>';
        else
        is(isset($sucesso))
            echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP, de forma simples e fácil</title>
</head>
<body>
    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST"> <!--Para onde os dados vão ser enviados -->
        Nome: <br>
        <input type="text" name="nome" placeholder="Qual seu nome?"><br><br>
        Email: <br>
        <input type="email" name="email" placeholder="Qual seu e-mail?"><br><br>
        Cidade: <br>
        <input type="text" name="cidade" placeholder="Qual a sua cidade?"><br><br>
        UF: <br>
        <input type="text" name="uf" size="2" placeholder="UF"><br><br>
        <input type="hidden" value="-1" name="id" >
        <button type="submit">Cadastrar</button>
    </form>
    
</body>
</html>