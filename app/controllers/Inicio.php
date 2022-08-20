<?php
class Inicio extends Controller
{
    public function __construct()
    {

        $this->UsuarioModel = $this->loadModel('UsuarioModel');
        $this->LibroModel = $this->loadModel('LibroModel');
        $this->EditorialModel = $this->loadModel('EditorialModel');
        $this->ClientesModel = $this->loadModel('ClientesModel');
        $this->PrestamoModel = $this->loadModel('PrestamoModel');
    }
    public function index()
    {
        $data = [];

        // $data =[]; //temporal porque no hay dataa
        // return 'este es el metodo index';
        $this->renderView('Inicio', $data);
    }

    public function abrirMenu()
    {
        $data = [];
        $data = $this->UsuarioModel->validarUsuario();
        if ($data == "") {
            $this->renderView('Inicio', $data);
        } else {
              session_start();
            $_SESSION['usuario'] = $data->user;
            $_SESSION['nombreU']= $data->nombreU;
            $_SESSION['apellidosU']=$data->apellidosU;

            
            $data = $this->UsuarioModel->listar();
            

            $this->renderView('VistaM',$data);
        }
    }
}
