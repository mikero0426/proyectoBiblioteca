<?php

class VistaM extends Controller
{
    public function __construct()
    {
        $this->UsuarioModel = $this->loadModel('UsuarioModel');
        $this->LibroModel = $this->loadModel('LibroModel');
        $this->EditorialModel = $this->loadModel('EditorialModel');
        $this->ClientesModel=$this->loadModel('ClientesModel');
        $this->PrestamoModel=$this->loadModel('PrestamoModel');
    }
    public function index()
    {
       $usuarios=$this->UsuarioModel->contar();
       $libros=$this->LibroModel->contar();
       $Editorial=$this->EditorialModel->contar();
       $Clientes=$this->ClientesModel->contar();
       $Prestamo=$this->PrestamoModel->contar();
   
       $data= [$usuarios,
               $libros,
               $Editorial,
               $Clientes,
               $Prestamo];



      
       // $data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('VistaM',$data);

    }
    


}