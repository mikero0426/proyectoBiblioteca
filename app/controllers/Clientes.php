<?php

class Clientes extends Controller
{
    public function __construct()
    {
        //configuramos el modelo correspondiente a este controlador  ojo como lo escribas aqui porque lo llamaras despues
        $this->ClientesModel = $this->loadModel('ClientesModel');
    }
    public function index()
    {
        //listamos a los clientes
        $data=$this->ClientesModel->listar();
        //$data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('Clientes/ClientesInicio',$data);

    }

    //para mostrar el formulario agregar
    public function formAdd(){

        $data=[];
        //$data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('Clientes/ClientesAgregar',$data);



    }

     //función para dar, impreso un reporte
     public function ImprimirListado()
     {
         $data = $this->ClientesModel->listar();
   
         $this->renderView('Clientes/rptListadoClientes', $data);
     }
   
    
  //para mostrar el formulario agregar
  public function add()
  {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $data = [
              'idEstudiante'=>$_POST['idEstudiante'],
              'nombreEstudiante'=>$_POST['nombreEstudiante'],
              'apellidoEstudiante'=>$_POST['apellidoEstudiante'],
              'correoEstudiante'=>$_POST['correoEstudiante'],
              'numeroEsudiante'=>$_POST['numeroEsudiante'],
             
          ];
          $resultado = $this->ClientesModel->add($data);
          if ($resultado) {
              $data = [
                  'mensaje' => 'insercion exitosa'
              ];
              $this->renderView('Clientes/ClientesAgregar', $data);
          } else {
              $data = [
                  'mensaje' => 'error en la insercion'
              ];
              $this->renderView('Clientes/ClientesAgregar', $data);
          }
      } else {
          echo 'Atención! los datos no fueron enviados de un formulario';
      }
  }

 //para que al mostrar formulario editar este edite un dato 
  public function update ($id)
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $data = [
              'idEstudiante'=>$id,
              'nombreEstudiante' => $_POST['nombreEstudiante'],
              'apellidoEstudiante' => $_POST['apellidoEstudiante'],
              'correoEstudiante' => $_POST['correoEstudiante'],
              'numeroEsudiante' => $_POST['numeroEsudiante']
          ];

          if ($this->ClientesModel->update($data)) {
              $data = [];
              $this->renderView('Clientes/ClientesInicio', $data);
          } else {
              die('ocurrió un error en la inserción !');
          };
      } else {
          $Cliente = $this->ClientesModel->getOne($id);
          $data = [
             
              'idEstudiante' => $Cliente->idEstudiante,
              'nombreEstudiante' => $Cliente->nombreEstudiante,
              'apellidoEstudiante'=> $Cliente->apellidoEstudiante,
              'correoEstudiante' => $Cliente->correoEstudiante,
              'numeroEsudiante' =>$Cliente->numeroEsudiante
          ];
          $this->renderView('CLientes/ClientesEditar', $data);
      }
  }


 //para eliminar un campo 
  public function delete($id)
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $data = [
              'idEstudiante' => $id
          ];

          if ($this->ClientesModel->delete($data)) {
              echo 'borrado';
              /* $data = [];
              $this->renderView('Inicio', $data); */
          } else {
              die('ocurrió un error !');
          };
      } else {
          $Cliente = $this->ClientesModel->getOne($id);
          $data = [
            'idEstudiante' => $Cliente->idEstudiante,
            'nombreEstudiante' => $Cliente->nombreEstudiante,
            'apellidoEstudiante'=> $Cliente->apellidoEstudiante,
            'correoEstudiante' => $Cliente->correoEstudiante,
            'numeroEsudiante' =>$Cliente->numeroEsudiante
          ];
          $this->renderView('Clientes/ClientesBorrar', $data);
      }
  }

   // funcion buscar resgistros
   public function search()
   {
       $data = [
           "valor" => $_POST['valor']
       ];

       $data = $this->ClientesModel->search($data);
       $this->renderView('Clientes/ClientesInicio', $data);
   }
}