<section id="main-content">
  <section class="wrapper">
    <!-- <h3><i class="fa fa-angle-right"></i> Lista de categorias</h3> -->

    <!-- <div class="showback">
  
      
      <button class="btn btn-success btn-lg " data-toggle="modal" data-target="#myModal">
        Cadastrar Categoria
      
      <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel">Preencha os campos abaixo</h4>
            </div>
            <div class="modal-body">
        
              <form class="cmxform form-horizontal style-form" id="commentForm" method="get" action="">
                <div class="form-group ">
                  <label for="cname" class="control-label col-lg-2">Descrição (Obrigatório)</label>
                  <div class="col-lg-10">
                    <input class=" form-control" id="cname" name="name" minlength="2" type="text" required="">
                  </div>
                </div>
                <div class="form-group ">
                  <label class="control-label col-lg-2" >Ativo</label>
                  <div class="col-lg-10">
                    <select class=" form-control">
                      <option value="1">Sim</option>
                      <option value="2">Não</option>
                    </select>
                  </div>
                </div>
              </form>
            </div>
         
            <div class="modal-footer">
              <button type="button" class="btn btn-primary">Gravar</button>
              <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
            </div>
          </div>
        </div>
      </div>
    </div> -->




    <!-- row -->
    <div class="row mt">
      <div class="col-md-12">
        <div class="content-panel">

          <div class="table-title">
            <div class="row">
              <div class="col-sm-6">
                <h2><b>Categorias</b></h2>
              </div>
              <div class="col-sm-6">
                <a href="#addEmployeeModal" class="btn btn-success float-right" data-toggle="modal">
                  <span>Cadastrar Novo</span>
                </a>
              </div>
            </div>
          </div>
          <div id="addEmployeeModal" class="modal fade">
            <div class="modal-dialog">
              <div class="modal-content">
                <form>
                  <div class="modal-header">
                    <h4 class="modal-title">Preencha as informações abaixo</h4>
                   
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                      <label>Descrição</label>
                      <input type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                      <label>Ativo</label>
                      <select class=" form-control">
                        <option value="1">Sim</option>
                        <option value="2">Não</option>
                      </select>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                    <input type="submit" class="btn btn-success" value="Add">
                  </div>
                </form>
              </div>
            </div>
          </div>




          <table class="table table-striped table-advance table-hover" id="example">
            <thead>
              <tr>
                <th> item</th>
                <th> Nome</th>
                <th> Status</th>
                <th> Ação</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $i = isset($inicio) ? $inicio + 1 : 1;
              foreach ($categorias as $categoria) {
              ?>
                <tr>
                  <td><?php echo $i++ ?></td>
                  <td><?php echo $categoria->categoria ?></td>
                  <?php if ($categoria->ativo_categoria == "S") { ?>
                    <td>
                      <span class="label label-info label-mini">Sim</span>
                    </td>
                  <?php } else { ?>
                    <td>
                      <span class="label label-danger label-mini">Não</span>
                    </td>
                  <?php } ?>
                  <td>
                    <button class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></button>
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></button>
                    <button class="btn btn-success btn-xs"><i class="fa fa-check"></i></button>
                  </td>
                </tr>
              <?php } ?>
            </tbody>

          </table>
        </div>
      </div>
    </div>
  </section>
</section>