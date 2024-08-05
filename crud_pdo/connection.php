<?php

    try{
        $conexao = new PDO("mysql:host=localhost;dbname=crudsimples", "root", "");
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->exec("set names utf8");

        echo "Conexão bem sucedida!";

    } catch (PDOException $erro) {
        echo "Erro na conexão:" . $erro->getMessage();
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contatos</title>
</head>
<body>
    
    <form action="?act=save" method="POST" name="form1" >

        <h1>Agenda de contatos</h1>
        <hr>

        <input type="hidden" name="id" />

        Nome:
        <input type="text" name="nome" />

        E-mail:
        <input type="text" name="email" />

        Celular:
        <input type="text" name="celular" />
        
        <input type="submit" value="salvar" />
        <input type="reset" value="Novo" />
        <hr>
    </form>

</body>
</html>