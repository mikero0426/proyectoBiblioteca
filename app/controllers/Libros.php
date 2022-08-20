<?php

class Libros extends Controller
{
    public function __construct()
    {
        //configuramos el modelo correspondiente a este controlador  ojo como lo escribas aqui porque 
        $this->LibroModel = $this->loadModel('LibroModel');
    }

    //rendiza la vista
    public function index()
    {
        $data=$this->LibroModel->listar();
        //$data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('Libros/LibroInicio',$data);

    }


  //para mostrar el formulario agregar
    public function formAdd(){

        $data=[];
       $this->renderView('Libros/LibroAgregar',$data);



    }

  //funcion para agregar un dato 
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'idLibro' =>$_POST['idLibro'],
                'nombreLibro' => $_POST['nombreLibro'],
                'generoLibro' => $_POST['generoLibro'],
                'estado' => $_POST['estado'],
                'Edicion' => $_POST['Edicion'],
                'autor' => $_POST['autor'],
                'stock' => $_POST['stock'],
                'editorial_idEditorial' => $_POST['editorial_idEditorial']
            ];
            $resultado = $this->LibroModel->add($data);
            if ($resultado) {
                $data = [
                    'mensaje' => 'insercion exitosa'
                ];
                $this->renderView('Libros/LibroAgregar', $data);
            } else {
                $data = [
                    'mensaje' => 'error en la insercion'
                ];
                $this->renderView('Libros/LibroAgregar', $data);
            }
        } else {
            echo 'Atención! los datos no fueron enviados de un formulario';
        }
    }

//funcion para editar un campo
    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idLibro'=>$id,
                'nombreLibro' => $_POST['nombreLibro'],
                'generoLibro' => $_POST['generoLibro'],
                'estado' => $_POST['estado'],
                'Edicion' => $_POST['Edicion'],
                'autor' => $_POST['autor'],
                'stock' => $_POST['stock'],
                'editorial_idEditorial' => $_POST['editorial_idEditorial']
            ];

            if ($this->LibroModel->update($data)) {
                $data = [];
                $this->renderView('Libros/LibroInicio', $data);
            } else {
                die('ocurrió un error en la inserción !');
            };
        } else {
            $libro = $this->LibroModel->getOne($id);
            $data = [
               
                'idLibro' => $libro->idLibro,
                'nombreLibro' => $libro->nombreLibro,
                'generoLibro' => $libro->generoLibro,
                'estado' => $libro->estado,
                'Edicion' => $libro->Edicion,
                'autor' =>$libro->autor,
                'stock' => $libro->stock,
                'editorial_idEditorial' => $libro->editorial_idEditorial
            ];
            $this->renderView('libros/libroEditar', $data);
        }
    }


 //funcion para eliminar un dato 
    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'idLibro' => $id
            ];

            if ($this->LibroModel->delete($data)) {
                echo 'borrado';
                /* $data = [];
                $this->renderView('Inicio', $data); */
            } else {
                die('ocurrió un error !');
            };
        } else {
            $libro = $this->LibroModel->getOne($id);
            $data = [
                'idLibro' => $libro->idLibro,
                'nombreLibro' => $libro->nombreLibro,
                'generoLibro' => $libro->generoLibro,
                'estado' => $libro->estado,
                'Edicion' => $libro->Edicion,
                'autor' =>$libro->autor,
                'stock' => $libro->stock,
                'editorial_idEditorial' => $libro->editorial_idEditorial,
            ];
            $this->renderView('Libros/LibroBorrar', $data);
        }
    }
 
    //funcion  para imprimir reportes
    public function ImprimirListado()
    {
        $data = $this->LibroModel->getAll();
        //$data = [];
        $this->renderView('Libros/rptListadoLibros', $data);
    }


   // funcion buscar resgistros
   public function search()
   {
       $data = [
           "valor" => $_POST['valor']
       ];

       $data = $this->LibroModel->search($data);
       $this->renderView('Libros/LibroInicio', $data);
   }
}