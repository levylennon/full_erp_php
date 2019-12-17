<div class="conteudo-dividido bg-fundo">				
    <div class="conteudo-fluido">	
        <div class="rows">	
            <div class="col-12">
            <div class="caixa">
            <span class="h5 caixa-titulo"><i class="fas fa-search"></i> Buscar por Pedidos</span>
                    <div class="px-5">
                    <div class="rows pt-3 pb-4">
                            <div class="col-3">
                                    <label class="text-label">Data 01</label>
                                            <input type="date" name="" class="form-campo">												
                            </div>
                            <div class="col-3">
                                    <label class="text-label">Data 01</label>
                                            <input type="date" name="" class="form-campo">												
                            </div>
                            <div class="col-4">
                                    <label class="text-label">Nome</label>
                                    <input type="text" placeholder="Digite aqui..." class="form-campo">
                            </div>
							 <div class="col-2 mt-4">
                                 <input type="submit" value="Pesquisar" class="btn btn-warning text-uppercase">
                             </div>
                            </div>
                        </div>
                    </div>
            </div>
							
							
            <div class="col-12">
                <div class="caixa">
                    <div class="caixa-titulo py-1 d-inline-block width-100">
                            <span class="h5  mb-0 pt-1 d-inline-block"><i class="far fa-list-alt"></i> LISTA DE PEDIDOS</span>
                    </div>
		<div class="tabela-responsiva">
		<table cellpadding="0" cellspacing="0">
        <thead>
            <tr>
                    <th align="center">Id</th>
                    <th align="left">Cliente</th>
                    <th align="center">Data</th>
                    <th align="center">Subtotal</th>
                    <th align="center">Origem</th>
                    <th align="center">Status</th>
                    <th align="center" colspan="4">Ação</th>
            </tr>
        </thead>
        <tbody>  

				<tr>
					<td align="center">1</td>
					<td align="left">Nome 01</td>
					<td align="left">00/00/0000</td>
					<td align="center">R$ 0.00</td> 											
					<td align="left">Desktop</td>
					<td align="center"><span class="status digitacao">Em Digitação</span></td> 											
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status digitacao"><i class="fas fa-info-circle"></i> Detalhes</a></td>						
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status digitacao"> Em Digitação</a>	</td>
                </tr>
				<tr>
					<td align="center">1</td>
					<td align="left">Nome 01</td>
					<td align="left">00/00/0000</td>
					<td align="center">R$ 0.00</td> 											
					<td align="left">Desktop</td>
					<td align="center"><span class="status emespera">Em Espera</span></td> 											
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status digitacao"><i class="fas fa-info-circle"></i> Detalhes</a></td>						
					<td align="center"><a href="<?php echo  URL_BASE ."pedido/atender" ?>" class="d-block btn btn-outline-verde status emespera"> Atender </a>	</td>
                </tr>
				<tr>
					<td align="center">1</td>
					<td align="left">Nome 01</td>
					<td align="left">00/00/0000</td>
					<td align="center">R$ 0.00</td> 											
					<td align="left">Desktop</td>
					<td align="center"><span class="status atendido">Em Atendido</span></td> 											
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status digitacao"><i class="fas fa-info-circle"></i> Detalhes</a></td>						
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status atendido"> NFE</a>	</td>
                </tr>
				<tr>
					<td align="center">1</td>
					<td align="left">Nome 01</td>
					<td align="left">00/00/0000</td>
					<td align="center">R$ 0.00</td> 											
					<td align="left">Desktop</td>
					<td align="center"><span class="status recusado">Excluir</span></td> 											
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status digitacao"><i class="fas fa-info-circle"></i> Detalhes</a></td>						
					<td align="center"><a href="#" class="d-block btn btn-outline-verde status recusado"> Excluir</a>	</td>
                </tr>
		 </tbody>
</table>
            <footer class="caixa-rodape"> 
				<ul class="paginacao text-end">
					<li><a href='#' class='link'>1</a></li>
					<li><a href='#' class='link'>2</a></li>			
					<li><a href='#' class='link'><i class='fas fa-angle-right'></i></a></li>
					<li><a href='#' class='link'>Último <i class='fas fa-angle-double-right'></i></a></li>                                     
				</ul>
			</footer>
            </div>

            </div>
                        </div>

                </div>
        </div>
</div>