<?php 
require_once 'conexion.php';

class aprendices
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function ObtenerAprendices()
    {
        $sql = "SELECT * FROM aprendices";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerAprendizConID($id)
    {
        $sql = "SELECT * FROM aprendices WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearAprendiz()
    {

    }


}
