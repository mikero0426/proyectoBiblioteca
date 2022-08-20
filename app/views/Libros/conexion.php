<?php
session_start(); // activa la configuracion de arreglos para almacenar las secciones 
//conexion a la base de datos de la forma tradicional

$Usuario = 'root';
$password = '';




try{
    //creamos el conector instanciado la clase PDO
    $pdo = new PDO('mysql:host=localhost;dbname=bdbiblioteca',$Usuario,$password);    // usamos la clase PDO con el conector MYSQL
    // var_dump($pdo);
    // echo '<br>';
    /*  echo 'conexion exitosa!!!'; */
    
}
catch(PDOException $error){
    echo 'ha ocurrido un error en la conexion'; //mensaje de error para el usuario
   //echo 'El error es:  '.$error->getMessage(); //mensaje de error para el programador
   
}