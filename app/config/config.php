<?php

/*
Configuración general del framework
Constantes
*/

// DIRECTORIO RAIZ DEL FRAMEWORK
define('APPROOT', dirname(dirname(__FILE__)));
//echo APPROOT;
//URL DE LA APP

define('URLROOT','http://localhost/curso_php/PJBIBLIOTECAV1/');
//NOMBRE DE LA APLICACIÖN
define('SITENAME', 'MICROFRAMEWORK MVC');
//CREDENCIALES PARA LA BASE DE DATOS
//FIXME: Cambiar a la forma nueva de hacer const
define('DB_HOST',  'localhost'); // ojo: cambiarla en el deploy
define('DB_USER','root'); //USUARIO DE LA BD
define('DB_PASSWORD',''); //PASSWORD USUARIO DE LA BD
define('DB_NAME', 'bdbiblioteca'); //nombre de la base de datos con la que se va a trabajar en el proyecto
