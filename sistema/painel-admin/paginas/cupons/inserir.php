<?php 
require_once("../../../conexao.php");
$tabela = 'cupons';

$codigo = $_POST['codigo'];
$valor = $_POST['valor'];
$id = $_POST['id'];
$valor = str_replace(',', '.', $valor);

//validar email duplicado
$query = $pdo->query("SELECT * FROM $tabela where codigo = '$codigo'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0 and $res[0]['id'] != $id){
	echo 'Cupon já Cadastrado com este código, escolha Outro!';
	exit();
}


if($id == ""){

	$query = $pdo->prepare("INSERT INTO $tabela SET codigo = :codigo, valor = :valor");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET codigo = :codigo, valor = :valor WHERE id = '$id'");
}

$query->bindValue(":codigo", "$codigo");
$query->bindValue(":valor", "$valor");
$query->execute();

echo 'Salvo com Sucesso';

 ?>