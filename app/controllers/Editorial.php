<?php

class Editorial extends Controller
{
    public function __construct()
    {
        //configuramos el modelo correspondiente a este controlador  ojo como lo escribas aqui porque 
        $this->EditorialModel = $this->loadModel('EditorialModel');
    }
     //rendiza la vista

    public function index()
    {
        $data=$this->EditorialModel->listar();
       
       $this->renderView('Editorial/EditorialInicio',$data);

    }

  //para mostrar el formulario agregar
    public function formAdd(){

        $data=[];
      
       $this->renderView('Editorial/EditorialAgregar',$data);

    }



    //para mostrar el formulario agregar
  public function add()
  {
      if ($_SERVER['REQUEST_METHOD'] == "POST") {
          $data = [
              'idEditorial'=>$_POST['idEditorial'],
              'nombreEditorial'=>$_POST['nombreEditorial'],
              'telefonoEditorial'=>$_POST['telefonoEditorial'],
              'direccionEdtirial'=>$_POST['direccionEdtirial'],
             
          ];
          $resultado = $this->EditorialModel->add($data);
          if ($resultado) {
              $data = [
                  'mensaje' => 'insercion exitosa'
              ];
              $this->renderView('Editorial/EditorialAgregar', $data);
          } else {
              $data = [
                  'mensaje' => 'error en la insercion'
              ];
              $this->renderView('Editorial/EditorialAgregar', $data);
          }
      } else {
          echo 'Atención! los datos no fueron enviados de un formulario';
      }
  }

//funcion editar
  public function update ($id)
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $data = [
            'idEditorial'=>$id,
            'nombreEditorial'=>$_POST['nombreEditorial'],
            'telefonoEditorial'=>$_POST['telefonoEditorial'],
            'direccionEdtirial'=>$_POST['direccionEdtirial']
          ];

          if ($this->EditorialModel->update($data)) {
              $data = [];
              $this->renderView('Editorial/EditorialInicio', $data);
          } else {
              die('ocurrió un error en la inserción !');
          };
      } else {
          $Editorial = $this->EditorialModel->getOne($id);
          $data = [
             
              'idEditorial' => $Editorial->idEditorial,
              'nombreEditorial' => $Editorial->nombreEditorial,
              'telefonoEditorial'=> $Editorial->telefonoEditorial,
              'direccionEdtirial' => $Editorial->direccionEdtirial
              
          ];
          $this->renderView('Editorial/EditorialEditar', $data);
      }
  }


//funcion eliminar usasa para desechar un dato 
  public function delete($id)
  {
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $data = [
              'idEditorial' => $id
          ];

          if ($this->EditorialModel->delete($data)) {
              echo 'borrado';
              /* $data = [];
              $this->renderView('Inicio', $data); */
          } else {
              die('ocurrió un error !');
          };
      } else {
        $Editorial= $this->EditorialModel->getOne($id);
          $data = [
            'idEditorial' => $Editorial->idEditorial,
            'nombreEditorial' => $Editorial->nombreEditorial,
            'telefonoEditorial'=> $Editorial->telefonoEditorial,
            'direccionEdtirial' => $Editorial->direccionEdtirial
          ];
          $this->renderView('Editorial/EditorialBorrar', $data);
      }
  }
  public function ImprimirListado()
  {
      $data = $this->EditorialModel->listar();
      //$data = [];
      $this->renderView('Editorial/rptListadoEditorial', $data);
  }
         
    // funcion buscar resgistros
    public function search()
    {
        $data = [
            "valor" => $_POST['valor']
        ];

        $data = $this->EditorialModel->search($data);
        $this->renderView('Editorial/EditorialInicio', $data);
    }
}