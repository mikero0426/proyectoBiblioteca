<?php
//modelo correspondiente a cada controlador
class PrestamoModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    public function listar()
    {
        $this->db->query("SELECT * FROM prestamolibros");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }


    //llamo la funcion de contar si no existe el campo en la base de datos 
    public function contar()
    {
        $this->db->query("SELECT * FROM prestamolibros");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }


    
    // busca un prestamista en especifico 
    public function search($data)
    {
        $this->db->query("SELECT * FROM usuario WHERE apellidosU LIKE CONCAT(:nombreU,'%')");
        $valor = $data['valor'];
        $this->db->bind(':nombreU', $valor);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }

    

}



