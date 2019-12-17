<div class="conteudo-dividido bg-fundo">
    <div class="conteudo-fluido">
        <div class="rows">
            <div class="col-12">
                <div class="caixa">
                    <div class="caixa-titulo py-1 d-inline-block width-100">
                        <span class="h5 mb-0 d-inline-block"><i class="fas fa-trash-alt"></i> Excluir categoria</span>
                        <a href="<?php echo URL_BASE . "categoria"?>" class="btn btn-verde btn-pequeno float-right "><i class="fas fa-arrow-left"></i>   Voltar</a>
                    </div>
                    <form action="<?php echo URL_BASE ."categoria/deletar/" . $categoria->id_categoria ?>" method="Post">
                        <div class="col-6 d-block m-auto rows px-5 mt-5">
                        <div class="col-12 mb-3">
                                <label class="text-label">Nome</label>
                                <input type="text" readonly="readonly" name="categoria" class="form-campo" value="<?php echo isset($categoria) ? $categoria->categoria : null?>">
                            </div>                                                   
                            <div class="col-12 mb-3">
                                <label class="text-label">Ativo</label>
                                <select name="ativo_categoria" class="form-campo" disabled="disabled" >
                                    <option value="S" <?php echo (!isset($categoria)) ? "" : ($categoria->ativo_categoria=="S")? "selected" : "" ?> >Sim</option>
                                    <option value="N" <?php echo (!isset($categoria)) ? "" : ($categoria->ativo_categoria=="N")? "selected" : "" ?> >Não</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3 mb-5">
                                <input type="submit" name="" value="Excluir categoria"  class="btn btn-vermelho d-block m-auto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>