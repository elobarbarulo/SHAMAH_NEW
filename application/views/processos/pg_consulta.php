<?php
echo monta_input('12', 'Buscar Cliente', 'txt', 'busca_cliente', '');
echo SubTitulo('');

?>
<table class="table table-striped table-hover col-md-12">
    <thead>
        <tr><td>Nome</td><td>CPF</td><td>Ação</td></tr>
    </thead>
    <tbody class="registros">
        <tr class="sumir">
            <td colspan="3">
                <?php echo mensagem_alerta(" Para achar um processo ou cliente faça a busca a cima pelo CPF ou NOME"); ?>
            </td>
        </tr>
    </tbody>
</table>