<?php

class Usuario extends Controller
{
    public function __construct()
    {
        //configuramos el modelo correspondiente a este controlador  ojo como lo escribas aqui porque 
        $this->UsuarioModel = $this->loadModel('UsuarioModel');
    }
    public function index()
    {
        $data=$this->UsuarioModel->listar();
        //$data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('Usuario/UsuarioInicio',$data);

    }

    public function formAdd(){

        $data=[];
        $data = $this->UsuarioModel->roles();
        $this->renderView('Usuario/UsuarioAgregar', $data);
    
    
    }
    //función para dar impreso un reporte
    public function ImprimirListado()
  {
      $data = $this->UsuarioModel->listar();

      $this->renderView('Usuario/rptListadoUsuario', $data);
  }

  //para mostrar el formulario agregar 
    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $data = [
                'identiUsuario' =>$_POST['identiUsuario'],
                'nombreU' => $_POST['nombreU'],
                'apellidosU' => $_POST['apellidosU'],
                'correoU' => $_POST['correoU'],
                'celularU' => $_POST['celularU'],
                'estadoU' => $_POST['estadoU'],
                'user' => $_POST['user'],
                'passwordU' => $_POST['passwordU'],
                'rol_idRol' => $_POST['rol_idRol']
            ];
            $resultado = $this->UsuarioModel->add($data);
            if ($resultado) {
                $data = [
                    'mensaje' => 'insercion exitosa'
                ];
                $this->renderView('Usuario/UsuarioAgregar', $data);
            } else {
                $data = [
                    'mensaje' => 'error en la insercion'
                ];
                $this->renderView('Usuario/UsuarioAgregar', $data);
            }
        } else {
            echo 'Atención! los datos no fueron enviados de un formulario';
        }
    }


    public function update($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'identiUsuario'=>$id,
                'nombreU' => $_POST['nombreU'],
                'apellidosU' => $_POST['apellidosU'],
                'correoU' => $_POST['correoU'],
                'celularU' => $_POST['celularU'],
                'estadoU' => $_POST['estadoU'],
                'user' => $_POST['user'],
                'passwordU' => $_POST['passwordU'],
                'rol_idRol' => $_POST['rol_idRol']
            ];

            if ($this->UsuarioModel->update($data)) {
                $data = [];
                $this->renderView('Usuario/UsuarioInicio', $data);
            } else {
                die('ocurrió un error en la inserción !');
            };
        } else {
            $usuario = $this->UsuarioModel->getOne($id);
            $data = [
               
                'identiUsuario' => $usuario->identiUsuario,
                'nombreU' => $usuario->nombreU,
                'apellidosU' => $usuario->apellidosU,
                'correoU' => $usuario->correoU,
                'celularU' => $usuario->celularU,
                'estadoU' =>$usuario->estadoU,
                'user' =>$usuario->user,
                'passwordU' =>$usuario->passwordU,
                'rol_idRol' => $usuario->rol_idRol
            ];
            $this->renderView('Usuario/UsuarioEditar', $data);
        }
    }



    public function delete($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'identiUsuario' => $id
            ];

            if ($this->UsuarioModel->delete($data)) {
                echo 'borrado';
                /* $data = [];
                $this->renderView('Inicio', $data); */
            } else {
                die('ocurrió un error !');
            };
        } else {
            $usuario = $this->UsuarioModel->getOne($id);
            $data = [
                'identiUsuario' => $usuario->identiUsuario,
                'nombreU' => $usuario->nombreU,
                'apellidosU' => $usuario->apellidosU,
                'correoU' => $usuario->correoU,
                'celularU' => $usuario->celularU,
                'estadoU' =>$usuario->estadoU,
                'user' =>$usuario->user,
                'passwordU' =>$usuario->passwordU,
                'rol_idRol' => $usuario->rol_idRol
            ];
            $this->renderView('Usuario/UsuarioBorrar', $data);
        }
    }


    // funcion buscar resgistros
    public function search()
    {
        $data = [
            "valor" => $_POST['valor']
        ];

        $data = $this->UsuarioModel->search($data);
        $this->renderView('Usuario/UsuarioInicio', $data);
    }
}
