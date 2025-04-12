<?php 
require_once 'conexion.php';

class Aprendices
{
    private $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function ObtenerPersonas()
    {
        $sql = "SELECT * FROM persona";
        $result = $this->db->query($sql);
        return $result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerPersonaConID($id_persona)
    {
        $sql = "SELECT * FROM persona WHERE id_persona = :id_id_persona";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearPersona($primer_nombre, $segundo_nombre, $primer_apellido, $segundo_apellido, $id_tipo_documento, $documento, $fecha_nacimiento, $id_sanguineo, $id_sexo)
    {
        $sql = "INSERT INTO persona (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_documento, documento, fecha_nacimiento, id_sanguineo, id_sexo) VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_tipo_documento, :documento, :fecha_nacimiento, :id_sanguineo, :id_sexo)";

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
       
        return $stmt->execute();
    }

    public function eliminarPersona($id_persona)
    {
        $sql = "DELETE FROM persona WHERE id_persona = :id_persona";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function actualizarPersona()
    {
        $sql = "UPDATE persona SET primer_nombre = :primer_nombre, segundo_nombre = :segundo_nombre, primer_apellido = :primer_apellido, segundo_apellido = :segundo_apellido, id_tipo_documento = :id_tipo_documento, documento = :documento, fecha_nacimiento = :fecha_nacimiento, id_sanguineo = :id_sanguineo, id_sexo = :id_sexo WHERE id_persona = :id_persona";

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
        return $stmt->execute();
    }

}
