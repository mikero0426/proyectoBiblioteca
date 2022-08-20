<?php
//modelo correspondiente a cada controlador
class UsuarioModel
{
    private $db;

    public function __construct()
    {
        $this->db = new Dbase;
    }
    // llamo los usuario
    public function listar()
    {
        $this->db->query("SELECT * FROM usuario");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    // validamos el usuario y la contraseña
    public function validarUsuario()
    {
        $usuario = $_POST['user'];
        $pass = $_POST['passwordU'];
        
        $this->db->query("SELECT * FROM usuario where user='$usuario' AND passwordU='$pass'");
        $cantidad = $this->db->rowCount();

        if($cantidad>0){
            $resultSet = $this->db->getOne();
            return $resultSet;
        }
        else{
            return "Vacio";
        }

    }
   // validamos y llamamos el idRol, nombreRol
    public function roles(){
        $this->db->query("SELECT idRol,nombreRol from rol");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }




    //llamo la funcion de contar si no existe el campo en la base de datos 
    public function contar()
    {
        $this->db->query("SELECT * FROM usuario");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }

    public function getOne($id)
    {
        $this->db->query("SELECT * FROM usuario where identiUsuario =:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }


    // agrega un registro
    public function add($data)
    {
        $this->db->query("INSERT INTO usuario(identiUsuario,nombreU,apellidosU,correoU,celularU,estadoU,user,passwordU,rol_idRol) VALUES (:identiUsuario,:nombreU,:apellidosU,:correoU,:celularU,:estadoU,:user,:passwordU,:rol_idRol)");
        //bindiamos
        $this->db->bind(':identiUsuario', $data['identiUsuario']);
        $this->db->bind(':nombreU', $data['nombreU']);
        $this->db->bind(':apellidosU', $data['apellidosU']);
        $this->db->bind(':correoU', $data['correoU']);
        $this->db->bind(':celularU', $data['celularU']);
        $this->db->bind(':estadoU', $data['estadoU']);
        $this->db->bind(':user', $data['user']);
        $this->db->bind(':passwordU', $data['passwordU']);
        $this->db->bind(':rol_idRol', $data['rol_idRol']);

        //verificamos la ejecucion correcta del query
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
    //actualiza un registro
    public function update($data)
    {
        $this->db->query('UPDATE usuario SET nombreU=:nombreU,
        apellidosU=:apellidosU,correoU=:correoU,
        celularU=:celularU,estadoU=:estadoU,user=:user,passwordU=:passwordU,rol_idRol=:rol_idRol WHERE identiUsuario =:identiUsuario     
        ');
        //vinculacion de los datos
        $this->db->bind(':identiUsuario', $data['identiUsuario']);
        $this->db->bind(':nombreU', $data['nombreU']);
        $this->db->bind(':apellidosU', $data['apellidosU']);
        $this->db->bind(':correoU', $data['correoU']);
        $this->db->bind(':celularU', $data['celularU']);
        $this->db->bind(':estadoU', $data['estadoU']);
        $this->db->bind(':user', $data['user']);
        $this->db->bind(':passwordU', $data['passwordU']);
        $this->db->bind(':rol_idRol', $data['rol_idRol']);

        // ejecucion de la consulta

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }



    //borra un registro
    public function delete($data)
    {
        $this->db->query('DELETE FROM usuario WHERE identiUsuario = :identiUsuario');
        //vinculacion de los datos
        $this->db->bind(':identiUsuario', $data['identiUsuario']);

        // ejecucion de la consulta

        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

   // busca un usuario
    public function search($data)
    {
        $this->db->query("SELECT * FROM usuario WHERE apellidosU LIKE CONCAT(:nombreU,'%')");
        $valor = $data['valor'];
        $this->db->bind(':nombreU', $valor);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
}
