<?php 
require_once("../../../conexao.php");
$tabela = 'pacotes';

$ano_atual = date('Y');

@session_start();
$id_usuario = $_SESSION['id'];

$nome = $_POST['nome'];
$desc_rapida = $_POST['desc_rapida'];
$linguagem = $_POST['linguagem'];
$grupo = $_POST['grupo'];
$valor = $_POST['valor'];
$valor = str_replace(',', '.', $valor);
$promocao = $_POST['promocao'];
$promocao = str_replace(',', '.', $promocao);
$palavras = $_POST['palavras'];
$desc_longa = $_POST['desc_longa'];
$video = $_POST['video'];
$comissao = $_POST['comissao'];

$desc_longa = str_replace("'", " ", $desc_longa);
$desc_longa = str_replace('"', ' ', $desc_longa);

$nome = str_replace("'", " ", $nome);
$nome = str_replace('"', ' ', $nome);

$desc_rapida = str_replace("'", " ", $desc_rapida);
$desc_rapida = str_replace('"', ' ', $desc_rapida);

$nome_novo = strtolower( preg_replace("[^a-zA-Z0-9-]", "-", 
        strtr(utf8_decode(trim($nome)), utf8_decode("áàãâéêíóôõúüñçÁÀÃÂÉÊÍÓÔÕÚÜÑÇ"),
        "aaaaeeiooouuncAAAAEEIOOOUUNC-")) );
$url = preg_replace('/[ -]+/' , '-' , $nome_novo);

$id = $_POST['id'];

//retirar espaços vazios e possívels aspas simples do textarea
$desc_longa = str_replace(array("\n", "\r", "'"), ' ', $desc_longa);

//validar nome curso duplicado
$query = $pdo->query("SELECT * FROM $tabela where nome = '$nome'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0 and $res[0]['id'] != $id){
	echo 'Pacote já Cadastrado com este nome, escolha Outro!';
	exit();
}


$query = $pdo->query("SELECT * FROM $tabela where id = '$id'");
$res = $query->fetchAll(PDO::FETCH_ASSOC);
$total_reg = @count($res);
if($total_reg > 0){
	$foto = $res[0]['imagem'];
}else{
	$foto = 'sem-foto.png';
}



//SCRIPT PARA SUBIR FOTO NO SERVIDOR
$nome_img = date('d-m-Y H:i:s') .'-'.@$_FILES['foto']['name'];
$nome_img = preg_replace('/[ :]+/' , '-' , $nome_img);

$caminho = '../../img/pacotes/' .$nome_img;

$imagem_temp = @$_FILES['foto']['tmp_name']; 

if(@$_FILES['foto']['name'] != ""){
	$ext = pathinfo($nome_img, PATHINFO_EXTENSION);   
	if($ext == 'png' or $ext == 'jpg' or $ext == 'jpeg' or $ext == 'gif'){ 
						
			//EXCLUO A FOTO ANTERIOR
			if($foto != "sem-foto.png"){
				@unlink('../../img/pacotes/'.$foto);
			}

			$foto = $nome_img;
		
		move_uploaded_file($imagem_temp, $caminho);
	}else{
		echo 'Extensão de Imagem não permitida!';
		exit();
	}
}


if($id == ""){

	$query = $pdo->prepare("INSERT INTO $tabela SET nome = :nome, desc_rapida = :desc_rapida, desc_longa = :desc_longa, valor = :valor, professor = '$id_usuario', linguagem = '$linguagem', imagem = '$foto', ano = '$ano_atual', palavras = :palavras, grupo = '$grupo', nome_url = '$url', promocao = :promocao, video = :video, comissao = '$comissao'");
}else{
	$query = $pdo->prepare("UPDATE $tabela SET nome = :nome, desc_rapida = :desc_rapida, desc_longa = :desc_longa, valor = :valor, professor = '$id_usuario', linguagem = '$linguagem', imagem = '$foto', palavras = :palavras, grupo = '$grupo', nome_url = '$url', promocao = :promocao, video = :video, comissao = '$comissao'  WHERE id = '$id'");
}

$query->bindValue(":nome", "$nome");
$query->bindValue(":desc_rapida", "$desc_rapida");
$query->bindValue(":desc_longa", "$desc_longa");
$query->bindValue(":valor", "$valor");
$query->bindValue(":palavras", "$palavras");
$query->bindValue(":promocao", "$promocao");
$query->bindValue(":video", "$video");
$query->execute();

echo 'Salvo com Sucesso';

 ?>