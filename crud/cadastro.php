<?php
$obj_mysqli = new mysqli("127.0.0.1", "root", "", "tutocrudphp");

if ($obj_mysqli->connect_errno)
{ //ocorreu uma conexão do php com o banco de dados
    echo "Ocorreu um erro na conexão com o banco de dados.";
    exit; //
}

mysqli_set_charset($obj_mysqli, 'utf8'); //mysqli_set_charset é responsável por informar a conexão atual que é em forma de utf8

//Incluímos um código aqui...
$id = -1;
$nome = "";
$email = "";
$cidade = "";
$uf = "";

//Validando a existência dos dados
if(isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["cidade"]) && isset($_POST["uf"]))
{ //isset = verificar a existencia de uma informação, empty = verificar se o dado foi preenchido
    if(empty($_POST["nome"]))
        $erro = "Campo nome obrigatório";
    else 
        if(empty($_POST["email"]))
        $erro = "Campo e-mail obrigatório";
    else
        {
        /*Alteramos aqui também.
        Agora, o $id, pode vir com o valor -1, que nos indica novo registro,
        ou, vir com um valor diferente de -1, ou seja, 
        o código do registro no banco, que nos indica alteração dos dados.*/

         //Local para a realização do cadastro ou dados enviados
            
         //local onde será realizado o cadastro e alteração do dados enviados    
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cidade = $_POST["cidade"];
            $uf = $_POST["uf"];

            //Se o id for -1, vamos realizar o cadastro ou alteração dos dados enviados.
            if($id == -1)
            {
                $stmt = $obj_mysqli->prepare("INSERT INTO `cliente` (`nome`,`email`,`cidade`,`uf`) VALUES (?,?,?,?)");
                $stmt->bind_param('ssss', $nome, $email, $cidade, $uf);

                if(!$stmt->execute())
                {
                    $erro = $stmt->error;
                }
                else 
                {
                    header("location:cadastro.php");
                    exit;
                }
            }
            /*se não, vamos realizar a alteraçao dos dados,
            porém, vamos nos certificar que o valor passado no $id, seja válido para nosso caso*/
            else
            if(is_numeric($id) && $id >= 1)
            {
                $stmt = $obj_mysqli->prepare("UPDATE 'cliente' SET 'nome'=?, 'email'=?, 'cidade'=?, 'uf'=? WHERE id = ? ");
                $stmt->bind_param('ssssi', $nome, $email, $cidade, $uf, $id);

                if(!$stmt->execute())
                {
                    $erro = $stmt->error;   
                }
                else
                {
                    header("location:cadastro.php");
                    exit;
                }
            }
            //retorna um erro.
            else
            {
                $erro = "Número inválido";
            }
        }   
} 
else
//Incluimos este bloco, onde vamos verificar a existência do id passado...
if(isset($_GET["id"]) && is_numeric($_GET["id"]))
{
    //..,pegamos aqui o id passado...
    $id = (int)$_GET["id"];

    if(isset($_GET["del"]))
    {
        $stmt = $obj_mysqli->prepare("DELETE FROM `cliente` WHERE id = ?");
        $stmt->bind_param('i',$id);
        $stmt->execute();

        header("Location:cadastro.php");
        exit;
    }
    else
    {

        //...montamos a consulta que será realizada....
        $stmt = $obj_mysqli->prepare("SELECT * FROM `cliente` WHERE id = ?");

        //passamos o id como parâmetro, do tipo i = int, inteiro...
        $stmt->bind_param('i', $id);

        //...mandamos executar a consulta...
        $stmt->execute();

        //...retornamos o resultado, e atribuímos à variável $result...
        $result = $stmt->get_result();

        /*...atribuímos o retorno, como um array de valores,
        por meio do método fetch_assoc, que realiza um associação dos valores em forma de array...*/ 
        $aux_query = $result->fetch_assoc();

        //...onde aqui, nós atribuímos às variáveis.
        $nome = $aux_query["Nome"];
        $email = $aux_query["Email"];
        $cidade = $aux_query["Cidade"];
        $uf = $aux_query["UF"];

        $stmt->close();
    }
  
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD com PHP, de forma simples e fácil</title>
</head>
<body>
<?php   

    if(isset($erro))
            echo '<div style="color:#F00">'.$erro.'</div><br/><br/>';
    else 
        if(isset($sucesso))
            echo '<div style="color:#00f">'.$sucesso.'</div><br/><br/>';
?>

    <form action="<?=$_SERVER["PHP_SELF"]?>" method="POST"> <!--Para onde os dados vão ser enviados -->
        Nome: <br>
        <input type="text" name="nome" placeholder="Qual seu nome?"><br><br>
        Email: <br>
        <input type="email" name="email" placeholder="Qual seu e-mail?"><br><br>
        Cidade: <br>
        <input type="text" name="cidade" placeholder="Qual a sua cidade?"><br><br>
        UF: <br>
        <input type="text" name="uf" size="2" placeholder="UF"><br><br>
        <input type="hidden" value="<?=$id?>" name="id" >
        <button type="submit"><?=($id==-1)?"Cadastrar":"Salvar"?></button>
    </form>

<br>
<br>    
<table width="400px" border="0" cellspacing="0">
    <tr>
        <td><strong>#</strong></td>
        <td><strong>Nome</strong></td>
        <td><strong>Email</strong></td>
        <td><strong>Cidade</strong></td>
        <td><strong>UF</strong></td>
        <td><strong>#</strong></td>
    </tr>

    <?php
        $result = $obj_mysqli->query("SELECT * FROM `cliente`");
        while ($aux_query = $result->fetch_assoc()) 
        {
            echo'<tr>';
            echo'  <td>'.$aux_query["Id"].'</td>';
            echo'  <td>'.$aux_query["Nome"].'</td>';
            echo'  <td>'.$aux_query["Email"].'</td>';
            echo'  <td>'.$aux_query["Cidade"].'</td>';
            echo'  <td>'.$aux_query["UF"].'</td>';
            echo'  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].'">Editar</a></td>';
            echo'  <td><a href="'.$_SERVER["PHP_SELF"].'?id='.$aux_query["Id"].'&del=true">Excluir</a></td>';
            echo'</tr>';
        }
?>
</table>
    
</body>
</html>
