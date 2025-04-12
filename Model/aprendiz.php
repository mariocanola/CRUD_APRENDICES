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

    public function crearPersona()
    {
        $sql = "INSERT INTO aprendices (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_documento, documento, fecha_nacimiento, id_sanguineo, id_sexo, fecha_creacion, actualizacion) VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :documento, :fecha_nacimiento, :id_sanguineo, :id_sexo, :fecha_creacion, :actualizacion)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':primer_nombre', $primer_nombre);
        $stmt->bindParam(':segundo_nombre', $segundo_nombre);
        $stmt->bindParam(':primer_apellido', $primer_apellido);
        $stmt->bindParam(':segundo_apellido', $segundo_apellido);
        $stmt->bindParam(':id_tipo_documento', $id_tipo_documento);
        $stmt->bindParam(':documento', $documento);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':id_sanguineo', $id_sanguineo);
        $stmt->bindParam(':id_sexo', $id_sexo);
        $stmt->bindParam(':fecha_actualizacion', $fecha_actualizacion);
        $stmt->bindParam(':actualizacion', $actualizacion);
       
        return $stmt->execute();
    }

    public function eliminarAprendiz($id)
    {
        $sql = "DELETE FROM aprendices WHERE id = :id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

}
