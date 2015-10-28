

    <!-- Header -->
    <header>
        <div class="container">
           <div class="intro-text">
               <!--      <div class="intro-lead-in">Quer suas isenções ? é só shamah!</div>
                <div class="intro-lead-in">Isenções de IPI, ICMS, IPVA, RODIZIO.</div>
                <!--<<div class="intro-heading">It's Nice To Meet You</div>;
                <p>Central de Atendimento: de segunda a sexta feira das 8:00 ás 17:00</p>
                <p>(11) 2241-9941 / 2613-0304 / 2613-0305</p>
                
                <!--<a href="#services" class="page-scroll btn btn-xl">Tell Me More</a>;-->
            </div>
        </div>
    </header>
    
    
    
    

    <!-- Services Section -->
    <section id="services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Serviços</h2>
                    <h3 class="section-subheading text-muted">Isenções de impostos como IPI, IOF, ICMS e IPVA para pessoas com deficiência física ou psiquiátrica na aquisição de automóveis novos.</h3>
                </div>
            </div>
            
            

            
            <div class="row text-center">
                <?php 
                echo monta_servico_site(
                        $titulo = "IPI (Imposto sobre Produtos Industrializados)",
                        $descricao = "São isentos os automóveis de passageiros ou de uso misto de fabricação nacional, adquiridos diretamente ou através de seus representantes."
                    );
                
                echo monta_servico_site(
                        $titulo = "IOF(Imposto sobre Operação Financeira) ",
                        $descricao = "São isentas do IOF as operações financeiras para aquisição do automóvel de passageiros de fabricação nacional."
                    );
                
                echo monta_servico_site(
                        $titulo = "ICMS (Imposto sobre Circulação de Mercadorias e Serviços)  ",
                        $descricao = "São isentos do ICMS automóveis movidos a qualquer combustível, destinados ao uso exclusivo do adquirente (condutor com deficiência), impossibilitado de utilizar automóveis comuns."
                    );
                echo monta_servico_site(
                        $titulo = "   IPVA (Imposto sobre a Propriedade de Veículos Automotores)",
                        $descricao = "A isenção de IPVA para automóvel de passageiros (fabricação nacional), de propriedade do portador de deficiência física.<br>A isenção do IPVA vale durante todo o período em que o automóvel estiver em nome do mesmo condutor."
                    );               
                echo monta_servico_site(
                        $titulo = "Rodizio Municipal de São Paulo (Dispensa)",
                        $descricao = "É concedida a autorização para as pessoas com deficiências rodarem com seus automóveis em áreas onde houver restrição à circulação de veículos."
                    );             
                /*
                echo monta_servico_site(
                        $titulo = "Serviçõs de Taxistas",
                        $descricao = ""
                        . "<li>Isenção de IPI e ICMS;</li>"
                        . "<li>Regularização de INSS;</li>"
                        . "<li>Regularização de Sest Senat;</li>"
                        . "<li>Retirada de Certidão do DTP;</li>"
                        . "<li> Baixa / Retirada do Preposto (2º Condutor);</li>"
                       // . "<br><b>Nota Importante: </b>Os taxistas, donos do alvará, poderão adiquirir com isenção de IPI e ICS, veiculos  0 KM para a utilização no transporte individual de passageitos na categoria aluguel, desse que:"
                       // . "<li>O veiculo esteja em seu nome</li>"
                       // . "<li>Alvará em seu nome sem o 2º segundo condutor ou preposto. O direito a aquisição com o beneficio da isenção, poderá ser exercido apenas uma vez a cada dois anos;</li>"
                       // . "<li>Não tenha nenhuma restrição com a previdência social, e esta e dia com suas contribuições</li>"
                       // . ""
                        
                        
                    );                
                
                 * 
                 */
                ?>
            </div>
        </div>
    </section>

    

    <!-- Team Section -->
    <section id="team" class="bg-light-gray">
        <div class="container">
           
            
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="section-heading">Quem têm direito?</h2>
                    <h3 class="section-subheading text-muted">
                        Existem benefícios fiscas concedidos às pessoas consideradas deficientes que foram criados para facilitar a locomoção e independência da mesmas. <br><br>
                        Porém, devido à falta de divulgação, a maioria das pessoas nem imagina quais são os benefícios acerca de direitos tão importantes.<br>
                        As isenções de IPI (Imposto sobre Produto Industrializado) e de ICMS (Imposto sobre Circulação de Mercadorias e Serviços) para aquisição de veículos 0Km, podem representar cerca de 23% de desconto sobre o valor do veículo.<br><br>
                        O mais interessante é que não são apenas os deficientes que têm estes direitos; algumas doenças ou tratamentos que para a maioria das pessoas não são considerados como uma deficiência, se enquadram na categoria de redução de mobilidade do membro (braços, pernas, mãos, pés e dedos), como por exemplo: 
                        <br />   <br /> 
                        <li>Escleroses múltiplas; </li><br /> 
                        <li>Mulheres que sofreram mastectomia e doenças desconhecidas degenerativas; </li><br /> 
                        <!-- <ul></ul>-->
                         <li>Artrose;</li><br /> 
                         <li>Artrite;</li><br /> 
                         <li>AVC</li><br /> 
                         <li>Paraplegia;</li><br /> 
                         <li>Amputação;</li><br /> 
                         <li>Nanismo;</li><br /> 
                         <li>Baixa altura;</li><br /> 
                         <li>LER;</li><br /> 
                         <li>Próteses internas ou externas;</li><br /> 
                         <li>Sequelas de talidomidas;</li><br /> 
                         <li>Paralisia Infantil;</li><br /> 
                         <li>Poliomielite;</li><br /> 
                         <li>Doenças neurológicas, etc.</li>
                                                 
                    </h3>
                    
                    <h2 class="section-heading">E os benefícios não param por aí! </h2>
                    <h3 class="section-subheading text-muted">
                     Após a compra do veiculo com as isenções de IPI e ICMS, existe ainda o direito das isenções de IPVA e rodízio, além do cartão 'Defis', ou Cartão do Idoso, que permitem estacionamento em vagas exclusivas demarcadas por toda a cidade em shoppings, farmácias, supermercados e etc.
     
                    </h3>                    
                </div>
            </div>
            
        </div>
    </section>

   <section id="parceiros">
    <aside class="clients">
        <div class="container">
            <div class="row">
                <?php 
                
                echo monta_imagem("chevrolet.png");
                echo monta_imagem("vw.png");
                echo monta_imagem("toyota.png");
                echo monta_imagem("reno.png");
                echo monta_imagem("hyundai.png");
                echo monta_imagem("fiat.png");
                ?>
            </div>
        </div>
    </aside>
       </section>
    
        

        
    
    
    <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Contato</h2>
                    <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
                </div>
            </div>
            
            
            <div class="row">
                <div class="col-lg-12">
                    <form name="sentMessage" id="contactForm" novalidate>
                        <div class="row">
                            <div class="col-md-6">
                               <?php 
                               echo input_text($nome_campo = 'nome', $label="Nome");
                               echo input_text($nome_campo = 'email', $label="E-mail");
                               echo input_text($nome_campo = 'telefone', $label="Telefone");
                               ?>
                                
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <textarea class="form-control" placeholder="Mensagem"  name="mensagem" ></textarea>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-lg-12 text-center">
                                <div id="success"></div>
                                <button type="submit" class="btn btn-xl">Enviar Mensagem</button>
                            </div>
                           <p><br><br><br><br><br><br><br><br><br><br><br><br><br></p>  
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

        <form action="" method="post">
    <section id="login" class="bg-light-gray">
        <aside class="container">
            <div class="container">
                <div class="row">
                    <h2 class="section-heading">Acesso ao sistema</h2>
                    <p><div class="form-group"><input type="text" class="form-control cpf" placeholder="CPF" id="cpf" name="cpf"></div>
                    <p><div class="form-group"><input type="password" class="form-control" placeholder="senha" id="senha" name="senha"></div>
                    <button class="btn btn-xl" type="submit" id="validar_login">Acessar</button>
                    <p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>  
                </div>
            </div>
        </aside>
    </section>
    </form>

    <?php
    if($dados['mensagem_login'] != ""){
        echo '<script>alert("'.$dados['mensagem_login'].'")</script>';
    }
    ?>
    
    
    
      <!-- Portfolio Modals 
    
    
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2014</span>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li><a href="#"><i class="fa fa-twitter"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-facebook"></i></a>
                        </li>
                        <li><a href="#"><i class="fa fa-linkedin"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li><a href="#">Privacy Policy</a>
                        </li>
                        <li><a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>

  -->
