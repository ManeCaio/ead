<?php 
require_once("cabecalho.php");
?>


<br>

<hr>

  <section id="about-page-section-3">

        <div class="container">

            <div class="row">

                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-5 text-align">

                    <div class="section-heading">

                        <h2>Consultar <span>Certificados</span></h2>

                        <p class="subheading">Consulte um certificado para comprovar a legitimidade do mesmo.</p>

                    </div>

                    <p style="margin-top: -15px">
                         <form method="post" action="sistema/rel/rel_certificado.php" target="_blank">
                        <div class="row">
                            <div class="col-md-8">
                       <div class="form-group">
                            <label>Código de Legitimidade do Certificado *</label>
                            <input type="text" name="id_mat" id="id_mat" class="form-control" required="required">
                        </div>
                    </div>
                    <div class="col-md-4" style="margin-top:30px">
                        <div class="form-group">
                            <button id="btn-enviar" type="submit" name="submit" class="btn btn-info ">Gerar</button>
                        </div>
                    </div>
                </div>
                        


                        <br><br> <i class="neutra">O código será apresentado no canto superior direito do certificado, um número dentro de uma marca d'agua, conforme mostrado na imagem ao lado, basta inserir aqui este número ou usar a url <span style="color:blue"><?php echo $url_sistema ?>certificado/codigo.</span></i>



                    </p>

                 

                </div>

                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-7">                 

                   <img src="img/codigo.png" width="100%">
                  

                </div>

            </div>

        </div>

    </section>






<section id="features-page">
        <div class="subsection4">
            <div class="container">
                <div class="col span_12">
                    <div class="col-sm-12 wpb_column column_container">
                        <div class="wpb_wrapper">
                            <div class="section-heading text-center">
                                <h1>Nossos <span>Planos</span></h1>
                                <p class="subheading">Confira nossos planos de assinaturas.</p>
                            </div>
                            <div class="row" style="margin-top:30px;">
                                <div class="wpb_column vc_column_container col-sm-4 block grow">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="pricing-plan pricing-color-true">
                                                <div class="pricing-plan-head pricing-plan-1">
                                                    <h3>Cursos deste Ano</h3>
                                                    <div class="pricing-price">
                                                        <span class="pricing-amount">R$ 999,99</span>
                                                        <span class="pricing-per">Valor Total (Sem Mensalidade)</span>
                                                    </div>
                                                </div>

                                                <ul>
                                                    <li><strong>Todos os cursos deste Ano</li>
                                                    <li>Cerca de 70 cursos</li>
                                                    <li>Cerca de 6 Sistemas</li>
                                                    <li>Sistemas WEB e Aplicativos</li>
                                                    <!-- <li><strong>Basic</strong> Stats</li> -->
                                                </ul>
                                                <div class="pricing-signup">
                                                    <a href="cursos-do-cursos-2022" class="button color-5">Comprar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container col-sm-4 block grow">
                                    <div class="vc_column-inner">
                                        <div class="wpb_wrapper">
                                            <div class="pricing-plan pricing-color-true ">
                                                <div class="pricing-plan-head pricing-plan-2">
                                                    <div class="featured-ribbon">Melhor Plano</div>
                                                    <h3>Todos os Cursos</h3>
                                                    <div class="pricing-price">
                                                        <span class="pricing-amount">R$ 1799,99</span>
                                                        <span class="pricing-per">Valor Total (Sem Mensalidade)</span>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>Total de 470 Cursos</li>
                                                    <li>Todos os cursos até 2021</li>
                                                    <li>Sistemas e Aplicativos</li>
                                                    <li>14 Categorias de Cursos</li>
                                                    <!-- <li><b>Complex</b>&nbsp;Stats</li> -->
                                                </ul>
                                                <div class="pricing-signup">
                                                    <a href="cursos-do-todos-os-cursos" class="button color-5">Comprar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="wpb_column vc_column_container col-sm-4 block grow">
                                    <div class="vc_column-inner ">
                                        <div class="wpb_wrapper">
                                            <div class="pricing-plan pricing-color-true">
                                                <div class="pricing-plan-head pricing-plan-1">
                                                    <h3>Acesso aos Lançamentos</h3>
                                                    <div class="pricing-price">
                                                        <span class="pricing-amount">R$ 199,99</span>
                                                        <span class="pricing-per">Valor Mensal</span>
                                                    </div>
                                                </div>
                                                <ul>
                                                    <li>Cerca de 8 a 10 cursos por Mês</li>
                                                    <li>Acesso imediato aos Lançamentos</li>
                                                    <li>Projetos totalmente atualizados</li>
                                                    <li>Excelente custo benefício</li>
                                                    <!-- <li><b>Complex</b> Stats</li> -->
                                                </ul>
                                                <div class="pricing-signup">
                                                    <a href="cursos-do-acesso-aos-lancamentos" class="button color-5">Comprar</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






<br>

<hr>



<?php 

require_once("rodape.php");

?>



