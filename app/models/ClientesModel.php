    <?php
//modelo correspondiente a cada controlador
class ClientesModel{
    private $db;

    public function __construct(){
        $this->db = new Dbase;
    }
    public function listar()
    {
        $this->db->query("SELECT * FROM estudiante");
        $resultSet = $this->db->getAll();
        return $resultSet;
    }

    public function contar()
    {
        $this->db->query("SELECT * FROM estudiante");
        $resultSet = $this->db->rowCount();
        return $resultSet;
    }
    // llamo el idEstudiante
    public function getOne($id)
    {
        $this->db->query("SELECT * FROM estudiante where idEstudiante=:id");
        $this->db->bind(':id', $id);
        $resultSet = $this->db->getOne();
        return $resultSet;
    }


    // agrega un registro
    public function add($data)
    {
        $this->db->query("INSERT INTO estudiante(idEstudiante, nombreEstudiante, apellidoEstudiante, correoEstudiante, numeroEsudiante) VALUES (:idEstudiante, :nombreEstudiante,:apellidoEstudiante,:correoEstudiante,:numeroEsudiante)");
        //bindiamos
        $this->db->bind(':idEstudiante', $data['idEstudiante']);
        $this->db->bind(':nombreEstudiante', $data['nombreEstudiante']);
        $this->db->bind(':apellidoEstudiante', $data['apellidoEstudiante']);
        $this->db->bind(':correoEstudiante', $data['correoEstudiante']);
        $this->db->bind(':numeroEsudiante', $data['numeroEsudiante']);


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
        $this->db->query('UPDATE estudiante SET nombreEstudiante=:nombreEstudiante,
        apellidoEstudiante=:apellidoEstudiante,correoEstudiante=:correoEstudiante,
        numeroEsudiante=:numeroEsudiante WHERE idEstudiante =:idEstudiante    
        ');
        //vinculacion de los datos
        $this->db->bind(':idEstudiante', $data['idEstudiante']);
        $this->db->bind(':nombreEstudiante', $data['nombreEstudiante']);
        $this->db->bind(':apellidoEstudiante', $data['apellidoEstudiante']);
        $this->db->bind(':correoEstudiante', $data['correoEstudiante']);
        $this->db->bind(':numeroEsudiante', $data['numeroEsudiante']);

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
        $this->db->query('DELETE FROM estudiante WHERE idEstudiante = :idEstudiante');
        //vinculacion de los datos
        $this->db->bind(':idEstudiante', $data['idEstudiante']);

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
        $this->db->query("SELECT * FROM estudiante WHERE apellidoEstudiante LIKE CONCAT(:nombreEstudiante,'%')");
        $valor = $data['valor'];
        $this->db->bind(':nombreEstudiante', $valor);
        $resultSet = $this->db->getAll();
        return $resultSet;
    }
    

}