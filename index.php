<?php
session_start();
//Fazendo conexão com Banco
require 'config.php';

//Verifica se o usuário está logado
if(empty($_SESSION['logado'])) {
	//Caso não esteja ele cai aqui e manda par ao login
	header("Location: login.php");
	exit;
}

$email = '';
$codigo = '';
//Pega a cessão que está logado no e-mail apra aparecer em baixo
$sql = "SELECT email, codigo FROM usuario_convite WHERE id = '".addslashes($_SESSION['logado'])."'";
$sql = $pdo->query($sql);
if($sql->rowCount() > 0) {
	$info = $sql->fetch();
	$email = $info['email'];
	$codigo = $info['codigo'];
}
?>
<h1>Area interna do sistema</h1>
<p>Usuario: <?php echo $email; ?> - <a href="sair.php">Sair</a>
<p>Link: http://estudophp/cadastrar.php?codigo=<?php echo $codigo?></p>