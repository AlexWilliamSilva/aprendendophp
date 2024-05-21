<?php
$obj_mysqli = new mysqli("127.0.0.1", "root", "", "tutocrudphp");

if($obj_mysqli->connect_errno)
{
    echo "Ocorreu um erro na conexâo com o banco de dados.";
    exit;
}

mysqli_set_charset($obj_mysqli, 'utf8');

$id = -1;
$nome = "";
$desc = "";
$unid = "";
$marca = "";

if(isset($_POST["nome"]) && isset($_POST["desc"]) && isset($_POST["unid"]) && isset($_POST["marca"]))
{
    if(empty($_POST["nome"]))
        $erro = "Campo de nome obrigatório";
    else
        if(empty($_POST["desc"]))
            $erro = "Campo de descrição obrigatório";
    else
        if(empty($_POST["unid"]))
            $erro = "Campo de unidade obrigatório";
    else
        if(empty($_POST["marca"]))
            $erro = "Campo da marca obrigatório";
    else
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $desc = $_POST["desc"];
    $unid = $_POST["unid"];
    $marca = $_POST["marca"];

    if($id == -1)
    {
        $stmt = $obj_mysqli->prepare("INSERT INTO `produto` (`nome, `desc`, `unid`, `marca`) VALUES (?,?,?,?)");
        $stmt->bind_param($nome, $desc, $unid, $marca);

        if(!$stmt->execute())
        {
            $erro = $stmt->error;
        }
        else{
            header("location:produto.php");
            exit;
        }
    }

    else
    if(is_numeric($id) && $id >= 1)
    {
        $stmt = $obj_mysqli->prepare("UPDATE `produto` SET `nome`=?, `desc`=?, `unid`=?, `marca`=? WHERE id = ? ");
        $stmt->bind_param($nome, $desc, $unid, $marca);

        if(!$stmt->execute())
        {
            $erro = $stmt->error;
        }
        else{
            header("location:produto.php");
            exit;
        }

        else
        {
            $erro = "Número inválido";
        }
    }
}

else

if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
    $id = (int)$_GET["id"];

    if(isset($_GET["del"]))
    {
        $stmt = $obj_mysqli->prepare("DELETE FROM `cliente` WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();

        header("location:produto.php");
        exit;
    }
    else
    {
        $stmt = $obj_mysqli->prepare("SELECT * FROM `produto` WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();
        $result = $stmt->get_result();
        $aux_query = $result->fetch_assoc();

        $id = $aux_query["id"];
        $nome = $aux_query["nome"];
        $desc = $aux_query["desc"];
        $unid = $aux_query["unid"];
        $marca = $aux_query["marca"];

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>
<body>

    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST">
        <fieldset>
            <legend><h1>Produto</h1></legend>

            <label for="nome">Digite o Nome do produto:</label><br>
            <input type="text" name="nome" id="nome"><br><br>
            <hr>

            <label for="desc">Digite a descrição do produto:</label><br>
            <input type="text" name="desc" id="desc"><br><br>
            <hr>

            <label for="unid">Digite o tipo de unidade do produto:</label><br>
            <input type="text" name="unid" id="unid" placeholder="mg,ml,kg..."><br><br>
            <hr>

            <label for="marca">Digite a marca do produto:</label><br>
            <input type="text" name="marca" id="marca"><br><br>
            <hr>

            <input type="hidden" value="<?=$id?>" name="id">
            <button type="submit"><?php=($id==-1)?"Enviar":"Salvar"?></button>
        </fieldset>
    </form>

    <br>
    <br>
    <table width="800px" border="2" cellspacing="2">
        <tr>
            <th>#</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Unid</th>
            <th>Marca</th>
            <th>#</th>
        </tr>
    </table>
</body>
</html>