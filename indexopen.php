<?php
//Iniciando sessão do usuário
session_start();


$servername = "127.0.0.1";
$database = "area_aluno";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";

$LOGIN1 = $_POST['LOGIN1'];
$SENHA = MD5($_POST['SENHA']);
$CPF = $_POST['CPF'];

//Verificação no banco de dados
// $result = ("SELECT LOGIN1, SENHA, CPF FROM cadastro 
// WHERE 'LOGIN1' = '$LOGIN1' AND 'SENHA' = '$SENHA' AND 'CPF' = '$CPF'");
//WHERE 'LOGIN1' = '$LOGIN1' AND 'SENHA' = '$SENHA' AND 'CPF' = '$CPF'");
$result = ("SELECT * FROM cadastro WHERE LOGIN1 = '$LOGIN1' AND SENHA = '$SENHA' AND CPF = '$CPF'");


$dados = mysqli_query($conn, $result) or die('Erro ao consultar os dados'.mysqli_error($conn)) ;
$linha = mysqli_fetch_assoc($dados);
$total = mysqli_num_rows($dados);


echo $result;
echo "<br>";
// echo $linha;
echo "<br>";
echo $total;

// echo $total;
// echo "<br>";


if ($total > 0) {
    //if (isset($LOGIN1))
    //TRUE - Dados encontrados com sucesso. Redirecionamento para a aba de cursos
    $_SESSION['LOGIN1'] = $LOGIN1;
    $_SESSION['SENHA'] = $SENHA;
    $_SESSION['CPF'] = $CPF;
    header("location:http://localhost/dashboard_curso.php");
} else {
    //FALSE - Ddados não foram encontrados. Redirecionamento para a aba index
    unset ($_SESSION['LOGIN1']);
    unset ($_SESSION['SENHA']);
    unset ($_SESSION['CPF']);
    header("location:http://localhost/index.html");
}



?>