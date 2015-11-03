<?php
    include "pg_clientes.php";
?>
<table class="table table-hover table-bordered">
    <thead>
        <tr>
            <td>SERVICOS</td>
            <td>CNH</td>
            <td>LAUDOS</td>
            <td>IPI</td>
            <td>ICMS</td>
            <td>IPVA</td>
            <td>RODIZIO</td>
            
            <td>BAIXA DE IPVA</td>
            <td>BAIXA DE RODIZIO</td>
            <td>ACAO</td>
        </tr>
    </thead>
    <tbody>
         <tr>
             <td>Contratado<br>Negociado / Pagamento</td>
            <td><?php echo ($dados['cnh'] == 1 ? '      <i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['laudos'] == 1 ? '   <i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipi'] == 1 ? '      <i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['icms'] == 1 ? '     <i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipva'] == 1 ? '     <i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['rodizio'] == 1 ? '  <i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_ipva'] == 1 ? '<i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_rodizio'] == 1 ? '<i class="fa fa-thumbs-o-up fa-1x"></i>' : '<i class="fa fa-ban"></i>');  ?></td>
            <td>
                <?php echo bt_link("processos/proc/".$this->uri->segment(3).'/'.$this->uri->segment(4)."/editar",'<i class="fa fa-pencil"></i>');?>
                <?php echo bt_link("processos/proc/".$this->uri->segment(3).'/'.$this->uri->segment(4)."/pagamentos",'<i class="fa fa-money"></i>');?>
            </td>
        </tr>
        <tr>
            <td>INICIADO</td>
            <td><?php echo ($dados['cnh'] == 1 ? $dados['cnh_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['laudos'] == 1 ? $dados['laudos_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipi'] == 1 ? $dados['ipi_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['icms'] == 1 ? $dados['icms_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipva'] == 1 ? $dados['ipva_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['rodizio'] == 1 ? $dados['rodizio_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_ipva'] == 1 ? $dados['baixa_ipva_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_rodizio'] == 1 ? $dados['baixa_rodizio_iniciado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td></td>
        </tr>
        <tr>
            <td>PROCESSO</td>
            <td><?php echo ($dados['cnh'] == 1 ? $dados['cnh_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['laudos'] == 1 ? $dados['laudos_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipi'] == 1 ? $dados['ipi_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['icms'] == 1 ? $dados['icms_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipva'] == 1 ? $dados['ipva_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['rodizio'] == 1 ? $dados['rodizio_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_ipva'] == 1 ? $dados['baixa_ipva_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_rodizio'] == 1 ? $dados['baixa_rodizio_processo'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td></td>
        </tr>
        <tr>
            <td>FINALIZADO</td>
            <td><?php echo ($dados['cnh'] == 1 ? $dados['cnh_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['laudos'] == 1 ? $dados['laudos_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipi'] == 1 ? $dados['ipi_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['icms'] == 1 ? $dados['icms_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipva'] == 1 ? $dados['ipva_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['rodizio'] == 1 ? $dados['rodizio_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            
            <td><?php echo ($dados['baixa_ipva'] == 1 ? $dados['baixa_ipva_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_rodizio'] == 1 ? $dados['baixa_rodizio_finalizado'] : '<i class="fa fa-ban"></i>');  ?></td>
            <td></td>
        </tr>
         <tr>
            <td>ACAO</td>
            <td><?php echo ($dados['cnh'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/cnh', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['laudos'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/laudos', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipi'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/ipi', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['icms'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/icms', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['ipva'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/ipva', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['rodizio'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/rodizio', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            
            <td><?php echo ($dados['baixa_ipva'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/baixa_ipva', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
            <td><?php echo ($dados['baixa_rodizio'] == 1 ? bt_link("processos/proc/" . $this->uri->segment(3) .'/'. $this->uri->segment(4).'/baixa_rodizio', '<i class="fa fa-eye fa-1x"></i>') : '<i class="fa fa-ban"></i>');  ?></td>
        </tr>
    </tbody>
</table>
<?php

echo SubTitulo('Histórico').'<hr>';
echo SubTitulo('<hr>');

foreach ($dados['log'] as $key => $value) {
   echo  '* '.$value['descricao'].'<hr>';
}

echo SubTitulo('Anexos');
foreach ($dados['arquivos'] as $key => $value) {
   $caminho = base_url().'anexos/'.$value['anexo'];
   echo '<iframe class=" col-md-6" src="'.$caminho.'" width="800px" height="600px" ></iframe>';
}
