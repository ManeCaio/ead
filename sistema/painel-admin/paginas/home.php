	<?php 

	
	require_once('verificar.php');
		$pag = 'pagar';

		if(@$_SESSION['nivel'] != 'Administrador'){
			echo "<script>window.location='../index.php'</script>";
			exit();
		}


		$data_hoje = date('Y-m-d');
		$data_ontem = date('Y-m-d', strtotime("-1 days",strtotime($data_hoje)));

		$mes_atual = Date('m');
		$ano_atual = Date('Y');
		$data_mes = $ano_atual."-".$mes_atual."-01";

		

		$total_alunos = 0;
		$total_mat_pendentes = 0;
		$total_mat_aprovadas = 0;
		$total_vendas_dia = 0;
		$total_vendas_diaF = 0;
		$total_cursos = 0;

		$total_itens_preenchidos = 3;
		$total_itens_perfil = 10;
		$porcentagemPerfil = 0;
		$porcentagemCursos = 0;

		$query = $pdo->query("SELECT * FROM alunos ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_alunos = @count($res);

		$query = $pdo->query("SELECT * FROM matriculas where aluno = '$id_usuario'");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_mat = @count($res);

		$query = $pdo->query("SELECT * FROM matriculas where status = 'Aguardando'");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_mat_pendentes = @count($res);


		$query = $pdo->query("SELECT * FROM matriculas where status != 'Aguardando' and data >= '$data_mes' and data <= curDate()");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_mat_aprovadas = @count($res);


		$query = $pdo->query("SELECT * FROM matriculas where status != 'Aguardando' and subtotal > 0 and data = curDate() ORDER BY id asc");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			for($i=0; $i < $total_reg; $i++){
			foreach ($res[$i] as $key => $value){}
				$total_recebido = $res[$i]['total_recebido'];
				$total_vendas_dia += $total_recebido;
			}
		}
		$total_vendas_diaF = number_format($total_vendas_dia, 2, ',', '.');


		$query = $pdo->query("SELECT * FROM cursos where status = 'Aprovado' ");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_cursos = @count($res);


		$dados_meses =	'';
		//ALIMENTAR DADOS PARA O GRÁFICO
		for($i=1; $i <= 12; $i++){
			if($i < 10){
				$mes_atual = '0'.$i;
			}else{
				$mes_atual = $i;
			}

		if($mes_atual == '4' || $mes_atual == '6' || $mes_atual == '9' || $mes_atual == '11'){
			$dia_final_mes = '30';
		}else if($mes_atual == '2'){
			$dia_final_mes = '28';
		}else{
			$dia_final_mes = '31';
		}


		$data_mes_inicio_grafico = $ano_atual."-".$mes_atual."-01";
		$data_mes_final_grafico = $ano_atual."-".$mes_atual."-".$dia_final_mes;

		$total_mes = 0;
		$query = $pdo->query("SELECT * FROM matriculas where status != 'Aguardando' and subtotal > 0 and data >= '$data_mes_inicio_grafico' and data <= '$data_mes_final_grafico' ORDER BY id asc");
		$res = $query->fetchAll(PDO::FETCH_ASSOC);
		$total_reg = @count($res);
		if($total_reg > 0){
			for($i2=0; $i2 < $total_reg; $i2++){
				foreach ($res[$i2] as $key => $value){}
			$total_mes +=  $res[$i2]['total_recebido'];
		}
		}

		$dados_meses = $dados_meses. $total_mes. '-';

	}

	


	 ?>

	 <input type="hidden" id="dados_grafico">

	<div class="col_3 margem-mobile">

			<a href="index.php?pagina=alunos">
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-book icon-rounded"></i>
					<div class="stats">
						<h5><strong><big><big><?php echo $total_alunos ?></big></big></strong></h5>

					</div>
					<hr style="margin-top:10px">
					<div align="center"><span>Total de Alunos</span></div>
				</div>
			</div>
			</a>

			<a href="index.php?pagina=matriculas">
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-laptop user1 icon-rounded"></i>
					<div class="stats">
						<h5><strong><big><big><?php echo $total_mat_pendentes ?></big></big></strong></h5>

					</div>
					<hr style="margin-top:10px">
					<div align="center"><span>Matrículas Pendentes</span></div>
				</div>
			</div>	
			</a>

			<a href="index.php?pagina=matriculas_aprovadas">
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-laptop dollar2 icon-rounded"></i>
					<div class="stats">
						<h5><strong><big><big><?php echo $total_mat_aprovadas ?></big></big></strong></h5>

					</div>
					<hr style="margin-top:10px">
					<div align="center"><span>Mat Aprovadas Mês</span></div>
				</div>
			</div>
			</a>

			<a href="index.php?pagina=vendas">
			<div class="col-md-3 widget widget1">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-book user2 icon-rounded"></i>
					<div class="stats">
						<h5><strong><big><big><?php echo $total_vendas_diaF ?></big></big></strong></h5>

					</div>
					<hr style="margin-top:10px">
					<div align="center"><span>Vendas do Dia</span></div>
				</div>
			</div>
			</a>

			<a href="index.php?pagina=cursos">
			<div class="col-md-3 widget esc">
				<div class="r3_counter_box">
					<i class="pull-left fa fa-credit-card dollar1 icon-rounded"></i>
					<div class="stats">
						<h5><strong><big><big><?php echo $total_cursos ?></big></big></strong></h5>

					</div>
					<hr style="margin-top:10px">
					<div align="center"><span>Total de Cursos</span></div>
				</div>
			</div>
			</a>

			<div class="clearfix"> </div>
		</div>

		





		<div class="row-one widgettable">
			<div class="col-md-12 content-top-2 card">
				<div class="agileinfo-cdr">
					<div class="card-header">
                        <h3>Demonstrativo de Vendas</h3>
                    </div>
					
						<div id="Linegraph" style="width: 98%; height: 400px">
						</div>
						
				</div>
			</div>
		

			<div class="clearfix"> </div>


		</div>
				
				
				
	
	<!-- for amcharts js -->
			<script src="js/amcharts.js"></script>
			<script src="js/serial.js"></script>
			<script src="js/export.min.js"></script>
			<link rel="stylesheet" href="css/export.css" type="text/css" media="all" />
			<script src="js/light.js"></script>
	<!-- for amcharts js -->

    <script  src="js/index1.js"></script>
	
		
	


		<!-- for index page weekly sales java script -->
	<script src="js/SimpleChart.js"></script>
    <script>
    	$('#dados_grafico').val('<?=$dados_meses?>');  
    	var dados = $('#dados_grafico').val();
    	saldo_mes = dados.split('-');

        var graphdata1 = {
            linecolor: "#035908",
            title: "Monday",
            values: [
            { X: "Janeiro", Y: parseFloat(saldo_mes[0]) },
            { X: "Fevereiro", Y: parseFloat(saldo_mes[1]) },
            { X: "Março", Y: parseFloat(saldo_mes[2]) },
            { X: "Abril", Y: parseFloat(saldo_mes[3]) },
            { X: "Maio", Y: parseFloat(saldo_mes[4]) },
            { X: "Junho", Y: parseFloat(saldo_mes[5]) },
            { X: "Julho", Y: parseFloat(saldo_mes[6]) },
            { X: "Agosto", Y: parseFloat(saldo_mes[7]) },
            { X: "Setembro", Y: parseFloat(saldo_mes[8]) },
            { X: "Outubro", Y: parseFloat(saldo_mes[9]) },
            { X: "Novembro", Y: parseFloat(saldo_mes[10]) },
            { X: "Dezembro", Y: parseFloat(saldo_mes[11]) },
            
            ]
        };
       
       
        $(function () {                   
            
            $("#Linegraph").SimpleChart({
                ChartType: "Line",
                toolwidth: "50",
                toolheight: "25",
                axiscolor: "#E6E6E6",
                textcolor: "#6E6E6E",
                showlegends: false,
                data: [graphdata1],
                legendsize: "140",
                legendposition: 'bottom',
                xaxislabel: '',
                title: 'Total R$ Matrículas',
                yaxislabel: ''
            });
           
        });

    </script>
	<!-- //for index page weekly sales java script -->




	<!-- new added graphs chart js-->
	
    <script src="js/Chart.bundle.js"></script>
    <script src="js/utils.js"></script>
	