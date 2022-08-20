<?php
//modelo correspondiente a cada controlador
class EditorialModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    // llamo los datos de editorial
    public function listar()
    {
        $this->db->query("SELECT * FROM editorial");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    //cuento y llamo los datos
    public function contar()
    {
        $this->db->query("SELECT * FROM editorial");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }

    //llamo el idEditorial
    public function getOne($id)
    {
        $this->db->query("SELECT * FROM editorial where idEditorial=:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }


    // agrega un registro
    public function add($data)
    {
        $this->db->query("INSERT INTO editorial (idEditorial, nombreEditorial, telefonoEditorial, direccionEdtirial) VALUES (:idEditorial, :nombreEditorial, :telefonoEditorial, :direccionEdtirial);");
        //bindiamos
        $this->db->bind(':idEditorial', $data['idEditorial']);
        $this->db->bind(':nombreEditorial', $data['nombreEditorial']);
        $this->db->bind(':telefonoEditorial', $data['telefonoEditorial']);
        $this->db->bind(':direccionEdtirial', $data['direccionEdtirial']);



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
        $this->db->query('UPDATE editorial SET 
        nombreEditorial=:nombreEditorial,telefonoEditorial=:telefonoEditorial,
        direccionEdtirial=:direccionEdtirial WHERE idEditorial =:idEditorial   
        ');
        //vinculacion de los datos
        $this->db->bind(':idEditorial', $data['idEditorial']);
        $this->db->bind(':nombreEditorial', $data['nombreEditorial']);
        $this->db->bind(':telefonoEditorial', $data['telefonoEditorial']);
        $this->db->bind(':direccionEdtirial', $data['direccionEdtirial']);

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
        $this->db->query('DELETE FROM editorial WHERE idEditorial = :idEditorial');
        //vinculacion de los datos
        $this->db->bind(':idEditorial', $data['idEditorial']);

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
         $this->db->query("SELECT * FROM editorial WHERE nombreEditorial LIKE CONCAT(:telefonoEditorial,'%')");
         $valor = $data['valor'];
         $this->db->bind(':telefonoEditorial', $valor);
         $resultSet = $this->db->getAll();
         return $resultSet;
     }




}