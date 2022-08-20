<!-- llamo el header -->
<?php require_once APPROOT . "/views/inc/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Prestamos</h1>
    </div>



    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-5 text-center">
                    <div class="card" style="width: 30rem;">
                        <img src="<?php echo URLROOT ?>/public/assets/img/prestamo.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <marquee behavior="" direction="righ">
                                <h1>Agrega un prestamo</h1>
                            </marquee>
            </center>
        </div>
    </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <!-- comienzo de la table -->
                <table class="table table-bordered border-primary text-primary  display">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">nombre</th>
                            <th scope="col">correo</th>
                            <th scope="col">numeroPrestamista</th>
                            <th scope="col">idlibro</th>
                            <th scope="col">DiasPrestados</th>
                            <th scope="col">ACCION</th>
                            <th scope="col">ACCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- llamo los datos -->
                        <?php foreach ($data as $prestamo) :; ?>
                            <tr>
                                <td> <?php echo $prestamo->idprestamo; ?></td>
                                <td><?php echo $prestamo->estudiante_idEstudiante; ?></td>
                                <td> <?php echo $prestamo->correoPrestamista; ?></td>
                                <td> <?php echo $prestamo->numeroPrestamista; ?></td>
                                <td> <?php echo $prestamo->idLibro; ?></td>
                                <td> <?php echo $prestamo->diasPrestados; ?></td>
                                <td><button type="button" class="btn btn-primary">editar</button></td>
                                <td><button type="button" class="btn btn-danger">eliminar</button></td>
                            </tr>

                        <?php endforeach; ?>
                    </tbody>
                </table>
                <!-- fin de la table -->
                <!-- boton agregar  -->
                <a href="<?php echo URLROOT; ?>Clientes/formAdd">
                    <center><button class="boton cinco">
                            <div class="icono">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                </svg>
                            </div>
                            <span>Agregar</span>
                        </button></center>
                </a>
                <!-- fin boton -->
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- llamo el footer -->
    <?php require_once APPROOT . "/views/inc/footer.php"; ?>