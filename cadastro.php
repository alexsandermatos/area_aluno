<?php 

$servername = "127.0.0.1";
$database = "area_aluno";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  //  die("Connection failed: " . mysqli_connect_error());
}
//echo "Connected successfully";
//mysqli_close($conn);


$LOGIN1 = $_POST['LOGIN1'];
$SENHA = MD5($_POST['SENHA']);
$EMAIL = $_POST['EMAIL'];
$NOME = $_POST['NOME'];
$CPF = $_POST['CPF'];
$DDD = $_POST['DDD'];
$TELEFONE = $_POST['TELEFONE'];
$CIDADE = $_POST['CIDADE'];
$ESTADO = $_POST['ESTADO'];

// Script sem utilidade  ---------------------------------------------------
//$ENDERECO = $_POST['ENDERECO'];
//$COMPLEMENTO = $_POST['COMPLEMENTO'];
//$BAIRRO = $_POST['BAIRRO'];
//$CEP = $_POST['CEP'];
//$query_select = "SELECT LOGIN FROM cad_aluno WHERE LOGIN = " .$LOGIN;
//$select = mysqli_query($query_select,$dbh);
//$array = mysqli_fetch_array($select);
// ---------------------------------------------------------------

function validaCPF() {
 $CPF = $_POST['CPF'];
	// Verifica se um número foi informado
	if(empty($CPF)) {
    return false;
	} 
	
	// Verifica se o numero de digitos informados é igual a 11 
	if (strlen($CPF ) != 11) {
    return false;
  }
  
	// Verifica se nenhuma das sequências invalidas abaixo 
	// foi digitada. Caso afirmativo, retorna falso
	else if ($CPF == '00000000000' || 
		$CPF == '11111111111' || 
		$CPF == '22222222222' || 
		$CPF == '33333333333' || 
		$CPF == '44444444444' || 
		$CPF == '55555555555' || 
		$CPF == '66666666666' || 
		$CPF == '77777777777' || 
		$CPF == '88888888888' || 
		$CPF == '99999999999') {
    return false;

	 // Calcula os digitos verificadores para verificar se o
	 // CPF é válido
	 } else {   
		
		for ($t = 9; $t < 11; $t++) {
			
			for ($d = 0, $c = 0; $c < $t; $c++) {
				$d += $CPF{$c} * (($t + 1) - $c);
			}
			$d = ((10 * $d) % 11) % 10;
			if ($CPF{$c} != $d) {
        return false;

			}
		}
    return true;
	}
};  

if (validaCPF()) {

    $sql = "INSERT INTO cadastro (LOGIN1, SENHA, EMAIL, NOME, CPF, DDD, TELEFONE, CIDADE, ESTADO) 
    VALUES ('$LOGIN1' , '$SENHA' , '$EMAIL' , '$NOME' , '$CPF' , '$DDD' , '$TELEFONE' , '$CIDADE' , '$ESTADO')";

    //mysqli_query($conn, $sql) ;
      if (mysqli_query($conn, $sql)) {
        echo "<br>";
        echo "Cadastro efetuado com sucesso. Redirecionando...";
        header("location: http://localhost/pgtocurso.html");//Redireciona caso true
      }

} else {
  echo "CPF Inválido";
  header("location: http://localhost/cadastro.html"); //redireciona se false 
}

?>
