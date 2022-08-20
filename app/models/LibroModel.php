<?php
//modelo correspondiente a cada controlador
class LibroModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    public function listar()
    {
        $this->db->query("SELECT * FROM libros");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    public function getAll()
    {
        $this->db->query("SELECT * FROM libros");
        $resultSet = $this->db->getAll();
        // $resultSet = json_encode($resultSet);
        return $resultSet;
    }

    //llamo la funcion de contar si no existe el campo en la base de datos 
    public function contar()
    {
        $this->db->query("SELECT * FROM libros");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }

    public function getOne($id)
    {
        $this->db->query("SELECT * FROM libros where idLibro =:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }


    // agrega un registro
    public function add($data)
    {
        $this->db->query("INSERT INTO libros(idLibro, nombreLibro, generoLibro, estado, Edicion, autor, stock, editorial_idEditorial) VALUES (:idLibro,:nombreLibro,:generoLibro,:estado,:Edicion,:autor,:stock,:editorial_idEditorial)");
        //bindiamos
        $this->db->bind(':idLibro', $data['idLibro']);
        $this->db->bind(':nombreLibro', $data['nombreLibro']);
        $this->db->bind(':generoLibro', $data['generoLibro']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':Edicion', $data['Edicion']);
        $this->db->bind(':autor', $data['autor']);
        $this->db->bind(':stock', $data['stock']);
        $this->db->bind(':editorial_idEditorial', $data['editorial_idEditorial']);

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
        $this->db->query('UPDATE libros SET nombreLibro=:nombreLibro,
        generoLibro=:generoLibro,estado=:estado,
        Edicion=:Edicion,autor=:autor,stock=:stock,editorial_idEditorial=:editorial_idEditorial WHERE idLibro =:idLibro     
        ');
        //vinculacion de los datos
        $this->db->bind(':idLibro', $data['idLibro']);
        $this->db->bind(':nombreLibro', $data['nombreLibro']);
        $this->db->bind(':generoLibro', $data['generoLibro']);
        $this->db->bind(':estado', $data['estado']);
        $this->db->bind(':Edicion', $data['Edicion']);
        $this->db->bind(':autor', $data['autor']);
        $this->db->bind(':stock', $data['stock']);
        $this->db->bind(':editorial_idEditorial', $data['editorial_idEditorial']);

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
        $this->db->query('DELETE FROM libros WHERE idLibro = :idLibro');
        //vinculacion de los datos
        $this->db->bind(':idLibro', $data['idLibro']);

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
        $this->db->query("SELECT * FROM libros WHERE nombreLibro LIKE CONCAT(:generoLibro,'%')");
        $valor = $data['valor'];
        $this->db->bind(':generoLibro', $valor);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }

    
 




















    //llamo la funcion de contar si no existe el campo en la base de datos 
  /*   public function contara()
    {
        $this->db->query("SELECT COUNT(*) FROM libros");
        $resultSet = $this->db->getOne();
        return $resultSet;
    } */
}