<?php

class Prestamo extends Controller
{
    public function __construct()
    {
        //configuramos el modelo correspondiente a este controlador  ojo como lo escribas aqui porque 
        $this->PrestamoModel = $this->loadModel('PrestamoModel');
    }
     //rendiza la vista
    public function index()
    {
        $data=$this->PrestamoModel->listar();
        //$data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('Prestamo/Prestamoinicio',$data);

    }

  //para mostrar el formulario agregar
    public function formAdd(){

        $data=[];
        //$data =[]; //temporal porque no hay dataa
       // return 'este es el metodo index';
       $this->renderView('Prestamo/PrestamoAgregar',$data);



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