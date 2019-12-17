<div class="conteudo-dividido bg-fundo">
    <div class="conteudo-fluido">

        <div class="rows">
            <div class="col-12">
                <div class="caixa">
                    <span class="h5 caixa-titulo"><i class="fas fa-search"></i> Buscar por unidade</span>
                    <form name="busca" action="<?php echo URL_BASE . "unidade/filtro" ?>" method="POST">
                        <div class="px-4 pb-5 pt-4 ">
                            <div class="rows">
                                <div class="col-10">
                                    <label class="text-label d-block">Nome </label>
                                    <input type="text" value="<?php echo isset($pesquisa) ? $pesquisa : null ?>" name="pesquisa" placeholder="Digite aqui..." class="form-campo">
                                </div>
                                <div class="col-2 mt-4">
                                    <input type="submit" value="pesquisa" class="btn btn-warning text-uppercase">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- <div class="col-12"> -->
        <div class="caixa">
            <div class="caixa-titulo py-1 d-inline-block width-100">
                <span class="h5  pt-1 mb-0 d-inline-block"><i class="far fa-list-alt"></i> Lista de unidade <small class="d-inline-block text-right mb-0 h6 px-2">
                    <b class="text-azul">
                        <?php echo isset($TotalRegistros) ? $TotalRegistros : 0 ?>
                </b> registros</small>
                </span>
                <a href="<?php echo URL_BASE . "unidade/create" ?>" class="btn btn-verde float-right"><i class="fas fa-plus-circle mb-0"></i> Adicionar novo</a>
            </div>
            <div class="tabela-responsiva">
                <table cellpadding="0" cellspacing="0">
                    <thead>
                        <tr>
                            <th align="center">item</th>
                            <!-- <th align="center">Id</th> -->
                            <th align="left" width="50%">Nome</th>
                            <th align="center">Abrev</th>
                            <th align="center" colspan="2">Ação</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        $i = isset($inicio) ? $inicio + 1 : 1;
                        foreach ($unidades as $unidade) {
                            ?>
                            <tr>
                                <td align="center"><?php echo $i++ ?></td>
                                <!-- <td align="center">1</td> -->
                                <td align="left"><?php echo $unidade->unidade ?></td>
                                <td align="center"><?php echo $unidade->abrev_unidade ?></td>
                                <td align="center">
                                    <a href="<?php echo URL_BASE . "unidade/edit/" ?>" class="d-inline-block btn btn-outline-roxo btn-pequeno"><i class="fas fa-edit"></i> Editar</a>
                                    <a href="<?php echo URL_BASE . "unidade/excluir/" ?>" class="d-inline-block btn btn-outline-vermelho btn-pequeno"><i class="fas fa-trash-alt"></i> Excluir</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <footer class="caixa-rodape">

                    <select class="NumeroLinhas" name="qntPaginas" action="<?php echo URL_BASE . "categoria/filtro" ?>" method="POST">
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option>
                    </select>
                    <ul class="paginacao text-end">
                        <?php echo paginacao($URL_Pag, $pg, $paginas) ?>
                    </ul>
                </footer>
            </div>
        </div>

        <!-- qunado não hover pedido  -->

        <!-- <div class="caixa p-2">
                                <div class="msg msg-verde">
                                <p><b><i class="fas fa-check"></i> Mensagem de boas vindas</b> Parabéns seu produto foi inserido com sucesso</p>
                                </div>
                                <div class="msg msg-vermelho">
                                <p><b><i class="fas fa-times"></i> Mensagem de Erro</b> Houve um erro</p>
                                </div>
                                <div class="msg msg-amarelo">
                                <p><b><i class="fas fa-exclamation-triangle"></i> Mensagem de aviso</b> Tem um aviso pra você</p>
                                </div>
                        </div> -->

        <!-- </div> -->

    </div>
</div>
</div>