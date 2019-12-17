<section id="main-content">
    <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Lista de categorias</h3>

        <!-- row -->
        <div class="row mt">
            <div class="col-md-12">
                <div class="content-panel">

                    <table class="table table-striped table-advance table-hover">
                        <div class="col-10">
                            <div class="col-sm-10">
                                <h4>Pesquisar categoria</h4>
                                
  
                        <hr>
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

        <ul class="pagination">
            <?php echo paginacao($URL_Pag, $pg, $paginas) ?>
        </ul>

    </section>
</section>