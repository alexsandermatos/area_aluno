<!DOCTYPE HTML>
<HTML>
    <head>
    <?php 

// Verificação de sessão não-existente
if (!(session_id())) {
    session_create_id();
}
if(!isset($_SESSION)) { 
    session_start(); 
 //else {
    //     session_regenerate_id();
    // }   
} else { 
    session_destroy();
}
// echo session_start();
// echo "<br>";
// echo session_id();
// echo "<br>";
// echo session_status();
// echo "<br>";
// echo session_create_id();

if((!isset ($_SESSION['LOGIN1']) == true) and (!isset ($_SESSION['SENHA']) == true) and (!isset ($_SESSION['CPF']) == true))
{
  unset($_SESSION['LOGIN1']);
  unset($_SESSION['SENHA']);
  unset($_SESSION['CPF']);
  header('location: index.html');
  } else {
  }
 
$logadoLogin = $_SESSION['LOGIN1'];
$logadoSenha = $_SESSION['SENHA'];
$logadoCpf = $_SESSION['CPF'];

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

//$teste = ("SELECT 'EMAIL' = $EMAIL FROM cadastro");

// $dados = mysqli_query($conn, $teste) or die('Erro ao consultar os dados'.mysqli_error($conn)) ;
// $linha = mysqli_fetch_assoc($dados);

// Executando consulta SQL
$query = 'SELECT * FROM cadastro';
$result = mysqli_query($conn,$query) or die('Query failed: ' . mysqli_error());
// echo "<br>";

// echo $_SESSION['EMAIL'];
//  echo session_create_id();
//  echo "<br>";
//  echo session_status();
//  echo "<br>";
//  //echo session_start();
?>

            <meta charset="utf-8" >
            <meta http-equiv="content-type" content="text/html">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device=width, initial-scale=1">
            <meta name="googlebot" content="noarchive">
            <meta http-equiv="imagetoolbar" content="no">
            <title>Área de Cursos</title>
            <link rel="stylesheet" type="text/css" media="screen" href="css/estilos.css" >
            <script type="text/javascript"></script>
            <style type="text/css">
            body{
                background: white;
            }
            </style>
    </head>
<body>

<div id="posicao">
    <div id="tabela1">
        <div id="cabtab1">
            <h1 style="position:absolute; top:0px; left:28px;">Area do Aluno</h1> 
            <style type="text/css">
            #corpotab1{
                color: rgb(255, 255, 255);
            }
            img{
                z-index: 2px;
            }
            </style> 
        </div>
        <div id="corpotab1">
            <img src="imagens/Profile Curso 2.png" alt="Area do Aluno Instituto Rafael Caique" title="Area do Aluno Instituto Rafael Caique" width="100px" height="100px">
            
            <div id="textcorpotab1">
            <b>Seja Bem-Vindo</b> <br>
            <?php echo UCWORDS($_SESSION['LOGIN1']) ;

                echo "<br>";?>
            <!--(Aluno)<br>-->
            <!--<b>CPF:</b> 000.000.000-00<br>-->
            <!--<b>Curso: </b>Geografia e História de Goiás<br>-->
            </div>
        </div>
    </div>
    
    <div id="quadtab1">
    <ul id="nav">
            <li><a href="dashboard_curso.html">Home</a></li>
            <li><a href="Cursos.html">Meus Cursos</a> 
              <ul>
                <li><a href="AulasPDF.html">Aulas em PDF</a></li>
                <li><a href="Videoaulas.html">Vídeoaulas</a></li>
                <li><a href="Audio Dicas.html">Audio-Dicas</a></li>
             </ul>
           </li>
           
           <li><a href="Simulados_e_provas.html">Simulados e Provas</a>
            <ul>
                    <li><a href="simulado.html">Simulados</a></li>
                    <li><a href="prova.html">Provas</a></li>
                    <li><a href="historico_simulados.html">Histórico de Simulados</a></li>
            </ul>
        </li>
        <li><a href="Meus_dados.html">Meus Dados</a></li>
        <!--<li><a href="Contato.html">Contato</a></li>-->
        <li><a href="sair.php">Sair</a></li>
    </ul>
    </div>
</div>

<div id="inicio_curso">
        <div id="meucurso"> 
    <h3>Meu Curso:</h3>
        </div>
        <div id="echocurso">
    <h4>Delegado de Polícia Civíl Goiás - História e Geografia de Goiás</h4>
        </div>
        <div id="progressao">
        <progress></progress>
        </div>
    <div id="mapacurso">
        <td>Home</td>
    </div>
       <!-- <div id="vetorlivro">
        <img src="imagens/Vetor Livro2.png" width="100px" heigth="100px">
        </div>-->
    
</div>
<div id="areaestudo">

</div>
<div id="areadeestudo2">

</div>





<!--<div id="rodape">
    <footer>
    <h1>Hello</h1>-->

</footer>
</div>
</body>
</HTML>