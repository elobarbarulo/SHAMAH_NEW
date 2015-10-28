<?php

function campo_data(){    
    $mes = get_mes(date('m'), $tipo = 'completo');    
    $texto = "São Paulo,".date('d')." de " . $mes . " de " . date('Y');
    return $texto;
}
function assinatura_contrato(){
    $texto = "";
    $texto.=" <table>
     <tr><td>____________________________________ </td><td>____________________________________ </td></tr>
     <tr><td>CONTRATADA</td><td>CONTRATANTE  </td></tr>
     <tr><td>Shamah Isenções  Ltda<br> 15.204.683/0001-76</td><td>Sr. (a)   </td></tr>
 </table>";
    
   return $texto; 
}

function testemunhas(){
    $texto = "";
    $texto.=" 
        TESTEMUNHAS:<br><br>
<table>
     <tr><td>Nome:__________________________________ </td><td>Nome:__________________________________ </td></tr>
     <tr><td>RG:____________________________________ </td><td>RG:____________________________________ </td></tr>
     <tr><td>CPF:___________________________________ </td><td>CPF:___________________________________ </td></tr>
 </table>";
    
   return $texto; 
}

function contrato_prestacao_servicos_cnh_isencoes(){
        $mensagem = "";
        $mensagem.='<div id="impressao">'
                . '<h3>CONTRATO DE PRESTAÇÃO DE SERVIÇOS</h3>'
                . '<p>'
                . 'Pelo presente instrumento de contrato de prestação de serviços de um lado, como CONTRATADA SHAMAH ISENÇÕES LTDA., sediada na Rua Maria Cândida 888 – Vila Guilherme – São Paulo-SP, inscrita no CNPJ: 15.204.683/0001-76, de agora denominada CONTRATADA, e do outro lado como CONTRATANTE, o Sr (a). ______________________portador (a) do CPF: ______________________e RG: ______________________residente e domiciliado a ______________________Bairro: ______________________CEP: ______________________Município: ______________________SP, Fone: ______________________     '
                . '</p>'
                
                . '<p>'
                . '<b>CLÁUSULA PRIMEIRA:</b> A <b>CONTRATADA</b> prestará Serviços de Aquisição das isenções de:
                   <b> IPI <i>(Imposto sobre Produtos Industrializados) </i>,
                   ICMS <i>(Imposto sobre Circulação de Mercadorias e Serviços)</i>,  
                   IPVA <i>( Imposto sobre a Propriedade de Veículos Automotores )</i>
                   e Rodízio.	
                   </b>
                <br>
                </p>'
                   
                .'<p>
                    <b>CLÁUSULA SEGUNDA:</b>
                    Pelos serviços objetos da CLÁUSULA PRIMEIRA, o <b>CONTRATANTE</b> pagará, a importância de R$ 600,00 (seiscentos reais).
                </p>'
                
                
                .'<p>
                    <b> Parágrafo Primeiro: Fica acertado entre as partes, que os valores constantes nesta Cláusula, podem ser quitados pela Concessionária onde for efetuada a compra do veículo, salvo este, o valor deve ser custeado integralmente pelo CONTRATANTE e ou seu representante legal. </b>
                </p>'
                
                .'<p>
                    <b>Parágrafo Segundo: Fica o Contratante ciente, que o não pagamento dos valores acima resultará a retenção dos documentos emitidos até efetivação do pagamento.</b>
                </p>' 
                
                .'<p>
                    <b>CLÁUSULA TERCEIRA</b>:Fica O <b>CONTRATANTE</b> ciente que, havendo desistência de sua parte, ou falta de regularização de sua situação cadastral  junto à Receita Federal e/ou Secretaria da Fazenda para a retirada de pendências, ou falta de documentações exigidas pelos órgãos públicos - Receita Federal, Secretaria da Fazenda Estadual e CET (Companhia de Engenharia e Tráfego), não será restituída a taxa que foi paga no início do processo, uma vez que o valor pago para iniciar a execução dos trâmites de concessão de isenção independem da situação cadastral do cliente, tanto assim é, que sanadas as pendências, o processo continuará até a conclusão dos serviços contratados.</b>
                </p>'   
                
                .'<p>
                    <b>CLÁUSULA QUARTA</b>:Fica O <b>CONTRATANTE</b> ciente que a CONTRATADA ficará impossibilitada de dar entrada e/ou retirada dos serviços contratados, caso exista pendências junto Receita Federal, Previdência Social e/ou Secretaria da Fazenda Estadual.</b>
                </p>'                   

                .'<p>
                    <b> CLÁUSULA QUINTA</b>:Fica o <b>CONTRATANTE</b> ciente que a CONTRATADA não se responsabiliza pelo deferimento, indeferimento e prazos estabelecidos para conclusão dos serviços contratados na CLÁUSULA PRIMEIRA, uma vez que o prazo é de responsabilidade de cada órgão público.</b>
                </p>'                 

                .'<p>
                     Parágrafo Primeiro: As cartas de IPI e ICMS, uma vez emitidas tem sua validade de 180 dias a contar da sua emissão, caso dentro deste prazo não seja faturado o veículo, haverá a necessidade de solicitar nova carta no órgão emissor, o que acarretará em despesas adicionais e documentais para tal, e isso fica por responsabilidade do contratante, conforme tabela abaixo:
                </p>'   
                
                .'<p>
                    IPI: R$ 300,00 ( trezentos reais )
                </p>'
                
                 .'<p>
                   ICM:   R$ 300,00 ( trezentos reais )
                </p>'               

                .'<p>Laudo Médico DETRAN: R$ 400,00  ( quatrocentos reais )</p>'   
                .'<p>O não pagamento destas impedira o andamento do processo</p>'   
                .'<p><br></p>'
                .'<p class="data_contrato">1-3</p>'
                .'<p><br></p>'                
                .'<p><br</p>'
                
                .'<p>CLÁUSULA SEXTA: O CONTRATANTE é responsável pela entrega à CONTRATADA quando da compra do veículo, NO PRAZO MÁXIMO DE 20 (VINTE) DIAS APÓS A DATA DE EMISSÃO DA NOTA FISCAL DO VEÍCULO, dos seguintes documentos:</p>'   
                .'<li>05  (Cinco) cópias autenticadas da Nota Fiscal de Compra do Veículo;</li>' 
                .'<li>05  (Cinco) cópias autenticadas frente e verso do CRV (Certificado de Registro do Veículo); </li>' 
                .'<li>05 (Cinco) cópias autenticadas frente e verso do CRLV (Certificado de Registro e Licenciamento do Veículo); </li>' 
                .'<li>05  (Cinco) cópias comuns de seu comprovante de endereço atual;</li>' 
                .'<li>A via original do Laudo de Inspeção do INMETRO (tanto para veículos mecânicos ou adaptados), quanto para veículos automáticos, quando não constar na Nota Fiscal do Veículo o item CÂMBIO AUTOMÁTICO e no caso o veículo seja adaptado, via original da Nota Fiscal da Adaptação. ( quando se fizer necessário ) </li>' 
                .'<p><br>Parágrafo Único: Fica o CONTRATANTE, ciente que o atraso ou a não entrega dos documentos citados no parágrafo anterior, poderá ocasionar o indeferimento da isenção de IPVA referente ao ano da compra do veículo. </p>'   
                .'<p>CLÁUSULA SÉTIMA: Fica o CONTRATANTE ciente que a isenção de Rodízio é deferida entre 25 (vinte e cinco) a 30 (trinta) dias após a entrega da documentação citada na CLÁSULA SEXTA, portanto, a partir do momento que o veículo for retirado na concessionária e até o término deste prazo, será necessário respeitar o Rodízio para que não ocorra o recebimento de multas. Após este prazo, favor verificar junto à CONTRATADA, sobre a data de deferimento da isenção do Rodízio.</p>'   
                .'<p>CLÁUSULA OITAVA: Fica o CONTRATANTE ciente que possíveis débitos de IPVA e/ou multas por transitar em local/horário não permitidos pela legislação (multa de Rodízio), gerados devido a atrasos ou falta de entrega de quaisquer um dos documentos solicitados, são de responsabilidade do CONTRATANTE e devem ser quitados pelo mesmo.</p>'   
                .'<p>CLÁUSULA NONA: Fica o CONTRATANTE ciente que a adaptação do veículo deve estar em acordo com o solicitado no Laudo de Avaliação Médica do DETRAN, sem a qual será indeferida a isenção de IPVA.</p>'   
                .'<p>CLÁUSULA DÉCIMA: O CONTRATANTE é responsável pela entrega à CONTRATADA de todos os documentos necessários para a execução dos serviços constantes neste contrato, nos endereços da CONTRATADA. O CONTRATANTE com a assinatura do presente contrato, declara que recebeu todas as informações sobre a prestação dos serviços contratados.</p>'   
                .'<p>CLÁUSULA DÉCIMA PRIMEIRA: O presente contrato tem validade de 01 (um) ano a partir da assinatura ou até a conclusão dos serviços contratados lançados na CLÁUSULA PRIMEIRA, demais serviços que não estejam especificados neste contrato,  deverão ser negociados e apresentados em anexo, e juntado ao contrato, entre as partes interessadas.</p>'   
                .'<p>Parágrafo Único: O CONTRATANTE concorda e autoriza o envio de seus contatos telefônicos e e-mail para empresas parceiras que atuam na área de SEGURO, INSS e ADAPTAÇÕES a fim de lhe prestar o melhor serviço possível.  	</p>'   
                .'<p>CLÁUSULA DÉCIMA SEGUNDA: As partes elegem o foro Regional do Tatuapé para conhecer, dirimir e decidir quaisquer  dúvidas ou questão oriunda do presente contrato, renunciando a qualquer outro por  mais privilegiado que seja.</p>'   
                .'<p>Os valores constantes neste contrato devem ser custeados pela concessionária.</p>'   
                
                .'<p><br></p>'
                .'<p class="data_contrato">2-3</p>'
                .'<p><br></p>'                
                .'<p><br</p>'
                
                .'<p class="data_contrato">'.campo_data().'</p>'   
                .'<p><br></p>'                
                .'<p><br</p>'
                
                .'<p class="">'.assinatura_contrato().'</p>'   
                
                
                .'<p><br></p>'                
                .'<p><br></p>'                
                .'<p class="">'.testemunhas().'</p>'
                .'<p><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></p>'  
                .'<p class="data_contrato">3-3</p>'          
                . '';
               
                
             $mensagem.='</div>';
             //Deixar em negrtito
             $mensagem = texto_negrito("CONTRATADA SHAMAH ISENÇÕES LTDA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA SEXTA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA SÉTIMA:",$mensagem);
             $mensagem = texto_negrito("CONTRATADA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA DÉCIMA SEGUNDA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA DÉCIMA PRIMEIRA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA NONA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA DÉCIMA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA OITAVA",$mensagem);
             $mensagem = texto_negrito("Parágrafo Único:",$mensagem);
             $mensagem = texto_negrito("CRV ",$mensagem);
             $mensagem = texto_negrito("CRLV",$mensagem);
             $mensagem = texto_negrito("CÂMBIO AUTOMÁTICO",$mensagem);
             $mensagem = texto_negrito("via original",$mensagem);
             $mensagem = texto_sublinhado("NO PRAZO MÁXIMO DE 20 (VINTE) DIAS APÓS A DATA DE EMISSÃO DA NOTA FISCAL DO VEÍCULO",$mensagem);
             $mensagem = texto_negrito("Laudo Médico DETRAN: R$ 400,00  ( quatrocentos reais )",$mensagem);
             $mensagem = texto_negrito("ICM:   R$ 300,00 ( trezentos reais )",$mensagem);
             $mensagem = texto_negrito("IPI: R$ 300,00 ( trezentos reais )",$mensagem);
             $mensagem = texto_negrito("Parágrafo Primeiro: As cartas de IPI e ICMS, uma vez emitidas tem sua validade de 180 dias a contar da sua emissão, caso dentro deste prazo não seja faturado o veículo, haverá a necessidade de solicitar nova carta no órgão emissor, o que acarretará em despesas adicionais e documentais para tal, e isso fica por responsabilidade do contratante, conforme tabela abaixo:",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA PRIMEIRA",$mensagem);
             $mensagem = texto_negrito("Parágrafo Segundo: Fica o Contratante ciente, que o não pagamento dos valores acima resultará a retenção dos documentos emitidos até efetivação do pagamento.",$mensagem);
             $mensagem = texto_negrito("Parágrafo Primeiro: Fica acertado entre as partes, que os valores constantes nesta Cláusula, podem ser quitados pela Concessionária onde for efetuada a compra do veículo, salvo este, o valor deve ser custeado integralmente pelo CONTRATANTE e ou seu representante legal.",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA SEGUNDA",$mensagem);
             $mensagem = texto_negrito("CLÁUSULA PRIMEIRA",$mensagem);
             $mensagem = texto_negrito("O não pagamento destas impedira o andamento do processo",$mensagem);
          
                
        return $mensagem;
    }