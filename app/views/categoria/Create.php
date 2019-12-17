<div class="conteudo-dividido bg-fundo">
    <div class="conteudo-fluido">
        <div class="rows">
            <div class="col-12">
                <div class="caixa">
                    <div class="caixa-titulo py-1 d-inline-block width-100">
                        <span class="h5 mb-0 d-inline-block"><i class="fas fa-plus"></i> Inserir categoria</span>
                        <a href="<?php echo URL_BASE . "categoria"?>" class="btn btn-verde btn-pequeno float-right ">Listar Categoria</a>
                    </div>
                    <form action="<?php echo URL_BASE ."categoria/Inserir" ?>" method="Post">
                        <div class="col-6 d-block m-auto rows px-5 mt-5">
                            <div class="col-12 mb-3">
                                <label class="text-label">Nome</label>       <!--  isset(categoria)  <- verifico se existe o objeto categoria... o Sinal de ? significa imprimir caso não exista o : imprimi Null              -->
                                <input type="text" name="categoria" class="form-campo" value="<?php echo isset($categoria) ? $categoria->categoria : null?>" placeholder="Digite o nome da categoria">
                            </div>                                                   
                            <div class="col-12 mb-3">
                                <label class="text-label">Ativo</label>
                                <select name="ativo_categoria" class="form-campo">
                                    <!-- Nesse caso do select aqui, eu verifico se não existe o objeto categoria antes, e passo o valor vazio caso N existe.-
                                        Se existir, verifico se o estatus está como S e se estiver eu seleciono
                                    -->
                                    <option value="S" <?php echo (!isset($categoria)) ? "" : ($categoria->ativo_categoria=="S")? "selected" : "" ?> >Sim</option>
                                    <option value="N" <?php echo (!isset($categoria)) ? "" : ($categoria->ativo_categoria=="N")? "selected" : "" ?>  >Não</option>
                                </select>
                            </div>
                            <div class="col-12 mt-3 mb-5">
                                <!-- Input que recebe o ID categoria, para edição do registro -->
                                <input type="hidden" name="id_categoria" value="<?php echo isset($categoria) ? $categoria->id_categoria : null?>">
                                <input type="submit" name="" value="Cadastrar categoria"  class="btn btn-azul d-block m-auto">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>