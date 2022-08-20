<?php require_once APPROOT . "/views/inc/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">INICIO DE CLIENTES</h1>
    </div>

    <!-- 
 inicio del container -->
    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-5 text-center">
                    <div class="card">
                        <img src="<?php echo URLROOT ?>/public/assets/img/Estudiante.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <marquee behavior="" direction="righ">
                                <h1>Agrega un cliente</h1>
                            </marquee>
            </center>
        </div>
    </div>
    </div>
    <br>
    <div class="col-md-12">
        <div class="card-body">
            <form action="<?php echo URLROOT; ?>Clientes/search" method="POST">
                <div class="input-group mb-2 w-50">
                    <input type="text" class="form-control form-control-sm " placeholder="nombreEstudiante ..." aria-label="Recipient's username" aria-describedby="button-addon2" name="valor">
                    <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>

                </div>
            </form>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <!-- inicio tabla  -->
                        <table class="table table-bordered border-primary text-primary  display">
                           <center><a class="boton seis" href="<?php echo URLROOT; ?>Clientes/ImprimirListado">
                                <span><i class="bi bi-printer"></i></span>
                                <svg>
                                    <rect x="0" y="0" fill="none"></rect>
                                </svg>
                            </a></center>
                            <thead>
                                <thead>
                                    <tr>
                                        <th scope="col">Id</th>
                                        <th scope="col">nombre</th>
                                        <th scope="col">apellido</th>
                                        <th scope="col">correo</th>
                                        <th scope="col">numero</th>
                                        <th scope="col">ACCION</th>
                                        <th scope="col">ACCION</th>
                                    </tr>
                                </thead>
                            <tbody>
                                <?php foreach ($data as $Cliente) :; ?>
                                    <tr>
                                        <td> <?php echo $Cliente->idEstudiante; ?></td>
                                        <td><?php echo $Cliente->nombreEstudiante; ?></td>
                                        <td> <?php echo $Cliente->apellidoEstudiante; ?></td>
                                        <td> <?php echo $Cliente->correoEstudiante; ?></td>
                                        <td> <?php echo $Cliente->numeroEsudiante; ?></td>
                                        <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>Clientes/update/<?php echo $Cliente->idEstudiante ?>"><i class="bi bi-pencil-square"></i></a></td>
                                        <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>Clientes/delete/<?php echo $Cliente->idEstudiante ?>"><i class="bi bi-trash-fill"></i></a></td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                            <!-- fin de la tablaa -->
                        </table>

                        <!-- boton agregar -->
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
                        <!-- fin del boton -->

                    </div>
                </div>
            </div>



        </div>
        <!-- fin del container -->
    </div>




    <!-- 
    llamo el footer -->
    <?php require_once APPROOT . "/views/inc/footer.php"; ?>