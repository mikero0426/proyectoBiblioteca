<?php require_once 'inc/header.php'; ?>

<div class="container-fluid">
    <div class="row">
        <main class="col-md-12 ms-sm-auto col-lg-10 px-md-4">
            <div class="container-fluid">
                <div class="page-header">
                    <h1 class="all-tittles">Sistema bibliotecario <small>Inicio</small></h1>

                </div>
                <section class="full-reset text-center" style="padding: 40px 0;">


                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
                        <div class="tile-name all-tittles">Usuarios</div>
                        <!-- asi pinto los datos que conte con mi consulta -->
                        <div class="tile-num full-reset"><?php echo $data[0]; ?></div>

                    </article>

                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-face"></i></div>
                        <div class="tile-name all-tittles">CLientes</div>
                        <!-- asi pinto los datos que conte con mi consulta -->
                        <div class="tile-num full-reset"><?php echo $data[3]; ?></div>

                    </article>
                    <!-- <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-male-alt"></i></div>
                <div class="tile-name all-tittles">docentes</div>
                <div class="tile-num full-reset">11</div>
            </article> -->
                    <!-- <article class="tile">
                <div class="tile-icon full-reset"><i class="zmdi zmdi-male-female"></i></div>
                <div class="tile-name all-tittles" style="width: 90%;">personal administrativo</div>
                <div class="tile-num full-reset">17</div>
            </article> -->
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-truck"></i></div>
                        <div class="tile-name all-tittles">Editoriales</div>
                        <div class="tile-num full-reset"><?php echo $data[2]; ?></div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-book"></i></div>
                        <div class="tile-name all-tittles">libros</div>
                        <div class="tile-num full-reset"><?php echo $data[1]; ?></div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-bookmark-outline"></i></div>
                        <div class="tile-name all-tittles">categorías</div>
                        <div class="tile-num full-reset">11</div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-assignment-account"></i></div>
                        <div class="tile-name all-tittles">secciones</div>
                        <div class="tile-num full-reset">17</div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-timer"></i></div>
                        <div class="tile-name all-tittles">reservaciones</div>
                        <div class="tile-num full-reset">3</div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-time-restore"></i></div>
                        <div class="tile-name all-tittles" style="width: 90%;">devoluciones pendientes</div>
                        <div class="tile-num full-reset">9</div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-calendar"></i></div>
                        <div class="tile-name all-tittles">préstamos</div>
                        <div class="tile-num full-reset"><?php echo $data[3]; ?></div>
                    </article>
                    <article class="tile">
                        <div class="tile-icon full-reset"><i class="zmdi zmdi-trending-up"></i></div>
                        <div class="tile-name all-tittles" style="width: 90%;">reportes y estadísticas</div>
                        <div class="tile-num full-reset">&nbsp;</div>
                    </article>

                </section>
                
                <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                            </div>
                            <div class="modal-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore dignissimos qui molestias ipsum officiis unde aliquid consequatur, accusamus delectus asperiores sunt. Quibusdam veniam ipsa accusamus error. Animi mollitia corporis iusto.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
       
    







<?php require_once 'inc/footer.php'; ?>