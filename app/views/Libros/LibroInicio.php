<?php require_once APPROOT . "/views/inc/header.php"; ?>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">INICIO DE LIBRERIAS</h1>
    </div>
    <div class="container">
        <div class="row">
            <center>
                <div class="col-md-5 text-center">
                    <div class="card" style="width: 30rem;">
                        <img src="<?php echo URLROOT ?>/public/assets/img/26102.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <marquee behavior="" direction="righ">
                                <h1>Agrega un libro</h1>
                            </marquee>
            </center>
        </div>
    </div>




    <!-- fin col -->
    </div>

    <br>
    <div class="col-md-12">
        <div class="card-body">
            <form action="<?php echo URLROOT; ?>Libros/search" method="POST">
                <div class="input-group mb-2 w-50">
                    <input type="text" class="form-control form-control-sm " placeholder="Genero ..." aria-label="Recipient's username" aria-describedby="button-addon2" name="valor">
                    <button class="btn btn-secondary" type="submit"><i class="bi bi-search"></i></button>

                </div>
            </form>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered border-primary text-primary  display">
                            <center><a class="boton seis" href="<?php echo URLROOT; ?>Libros/ImprimirListado">
                                    <span><i class="bi bi-printer"></i></span>
                                    <svg>
                                        <rect x="0" y="0" fill="none"></rect>
                                    </svg>
                                </a></center>


                            <thead>
                                <tr>
                                    <th scope="col">idLibro</th>
                                    <th scope="col">nombreLibro</th>
                                    <th scope="col">GeneroLibro</th>
                                    <th scope="col">estado</th>
                                    <th scope="col">version</th>
                                    <th scope="col">Autor</th>
                                    <th scope="col">Stock</th>
                                    <th scope="col">ACCION</th>
                                    <th scope="col">ACCION</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $Libros) :; ?>
                                    <tr>
                                        <td><?php echo $Libros->idLibro; ?></td>
                                        <td><?php echo $Libros->nombreLibro; ?></td>
                                        <td> <?php echo $Libros->generoLibro; ?></td>
                                        <td> <?php echo $Libros->estado; ?></td>
                                        <td> <?php echo $Libros->Edicion; ?></td>
                                        <td> <?php echo $Libros->autor; ?></td>
                                        <td> <?php echo $Libros->stock; ?></td>
                                        <td><a class="btn btn-primary" href="<?php echo URLROOT; ?>Libros/update/<?php echo $Libros->idLibro ?>"><i class="bi bi-pencil-square"></i></a></td>

                                        <td><a class="btn btn-danger" href="<?php echo URLROOT; ?>Libros/delete/<?php echo $Libros->idLibro ?>"><i class="bi bi-trash-fill"></i></a></td>
                                    </tr>

                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="<?php echo URLROOT; ?>Libros/formAdd">
                            <center><button class="boton cinco">

                                    <div class="icono">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z" />
                                        </svg>
                                    </div>
                                    <span>Agregar</span>
                                </button></center>
                        </a>
                    </div>
                </div>
            </div>










        </div>
    </div>



































    <?php require_once APPROOT . "/views/inc/footer.php"; ?>