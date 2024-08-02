<?php 
require_once("sistema/conexao.php");
$login = 'Login';
$painel = 'sistema';
@session_start();
if(@$_SESSION['nivel'] == 'Administrador' || @$_SESSION['nivel'] == 'Professor'){
  $painel = 'sistema/painel-admin';
  $login = 'Painel';
}

if(@$_SESSION['nivel'] == 'Aluno'){
  $painel = 'sistema/painel-aluno';
   $login = 'Painel';
}



$index = '';
$categorias = '';
$cursos = '';
$sobre = '';
$linguagens = '';
$contatos = '';

$url = basename($_SERVER['PHP_SELF'],'.php');

if($url == "index"){
  $index = 'active';
}

if($url == "categorias"){
  $categorias = 'active';
}

if($url == "cursos" || $url == "lista-cursos" || $url == "pacotes" || $url == "formacoes"  || $url == "sistemas" || $url == "cursos-2021" || $url == "cursos-2022"){
  $cursos = 'active';
}


if($url == "sobre" || $url == "planos" || $url == "parcerias" || $url == "perguntas" || $url == "politica" || $url == "termos" ){
  $sobre = 'active';
}


if($url == "linguagens"){
  $linguagens = 'active';
}

if($url == "contatos"){
  $contatos = 'active';
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

      <?php if(@$palavras_chaves == ""){ ?>
      <meta name="keywords" content="cursos, portal de cursos, curso de tecnologia, cursos de programação, cursos online, cursos a distância, ensino a distancia, ensino EAD">
      <?php }else{ ?>
      <meta name="keywords" content="<?php echo $palavras_chaves; ?>">
      <?php } ?>

      <?php if(@$nome_curso_titulo == ""){ ?>
      <title><?php echo $nome_sistema ?></title>
      <?php }else{ ?>
      <title><?php echo $nome_curso_titulo; ?></title>
      <?php } ?>



    
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="scss/main.css">
    <link rel="stylesheet" href="scss/skin.css">
    <link rel="stylesheet" href="scss/card.css">
    <link rel="stylesheet" href="scss/curso.css">
    <link rel="shortcut icon" href="sistema/img/favicon.ico" type="image/x-icon">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
   
    
    <script src="./script/index.js"></script>
</head>

<body id="wrapper">

    <section id="top-header">
        <div class="container">
            <div class="row">
                <div class="col-md-7 col-sm-7 col-xs-7 top-header-links">
                    <ul class="contact_links">
                        <li><i class="fa fa-whatsapp"></i><a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp ?>" target="_blank"><?php echo $tel_sistema ?></a></li>
                        <li><i class="fa fa-envelope"></i><a href="#"><?php echo $email_sistema ?></a></li>
                    </ul>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 social">
                    <ul class="social_links">
                        <li><a href="<?php echo $facebook_sistema ?>" title="Nossa Página no Facebook" target="_blank"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="<?php echo $instagram_sistema ?>" title="Nossa Página no Instagram" target="_blank"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="<?php echo $youtube_sistema ?>" title="Nosso canal no Youtube" target="_blank"><i class="fa fa-youtube"></i></a></li>
                        <li><a href="http://api.whatsapp.com/send?1=pt_BR&phone=<?php echo $tel_whatsapp ?>" title="Chamar no Whatsapp" target="_blank"><i class="fa fa-whatsapp"></i></a></li>
                        
                    </ul>

                    <div class="search-box ">
                        <button class="btn-search"><i class="fa fa-search"></i></button>
                        <input onkeyup="listarCab()" name="buscar_cab" id="buscar_cab" type="text" class="input-search" placeholder="Busque um Curso...">
                    </div>

                </div>
            </div>
        </div>


    </section>

    <header>
        <nav class="navbar navbar-inverse" style="z-index: 1000">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="./">
                            <h1> <img src="sistema/img/logo.png" width="45px"></h1><span><?php echo $nome_sistema ?></span></a>
                        </div>
                        <div id="navbar" class="collapse navbar-collapse navbar-right">
                            <ul class="nav navbar-nav">
                                <li class="<?php echo $index ?>"><a href="./">Home</a></li>
                                <li class="<?php echo $categorias ?>"><a href="categorias">Categorias</a></li>

                                <li class="dropdown <?php echo $cursos ?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cursos e Pacotes <span class="caret"></span></a>
                                    <ul class="dropdown-menu navbar-nav-sub">
                                       <li><a href="cursos">Cursos</a></li>
                                       <li><a href="lista-cursos">Todos os Cursos</a></li>
                                       <li><a href="pacotes">Pacotes Promocionais</a></li> 
                                       <li><a href="formacoes">Formações</a></li> 
                                       <li><a href="categorias">Categorias</a></li>
                                       <li><a href="sistemas">Sistemas Prontos</a></li>
                                       <li><a href="cursos-2021">Cursos 2021</a></li>
                                       <li><a href="cursos-2022">Cursos 2022</a></li>
                                   </ul>
                               </li>

                                <li class="dropdown <?php echo $sobre ?>">
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Sobre <span class="caret"></span></a>
                                    <ul class="dropdown-menu navbar-nav-sub">
                                       <li><a href="sobre">Nossa Escola</a></li>
                                       <li><a href="planos">Planos de Assinaturas</a></li>
                                       <li><a href="parcerias">Parcerias</a></li> 
                                       <li><a href="perguntas">Dúvidas Frequentes</a></li> 
                                       <li><a href="politica">Politíca de Privacidade</a></li>
                                       <li><a href="termos">Termos de uso</a></li>
                                       <li><a href="consultar-certificados">Validaçao do Certificado</a></li>
                                      
                                   </ul>
                               </li>

                               <li class=" <?php echo $linguagens ?>"><a href="linguagens">Linguagens</a></li>
                               <li class=" <?php echo $contatos ?>"><a href="contatos">Contato</a></li>
                               <li><a target="_blank" href="<?php echo $painel ?>"><?php echo $login ?></a></li>

                           </ul>
                       </div>
                       <!--/.nav-collapse -->
                   </div>
               </div>
           </nav>
       </header>
    <!--/.nav-ends -->


    <div id="listar-cab"></div>


    <div id="area-conteudo">


    <script type="text/javascript">
      
function listarCab(pagina){
  console.log(pagina)

  var busca = $("#buscar_cab").val();
    $.ajax({
        url: "script/ajax-listar-cursos-cab.php",
        method: 'POST',
        data: {busca, pagina},
        dataType: "html",

        success:function(result){
          
            $("#listar-cab").html(result);
            if(result.trim() != ""){              
             document.getElementById('area-conteudo').style.display = 'none';
            }else{
              document.getElementById('area-conteudo').style.display = 'block';
            }
        }
    });
}
    </script>






