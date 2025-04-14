<?php 
require_once 'conexion.php';

class Aprendices
{
    private $db;

    public function __construct()
    {
        $this->db = (new Database())->connect();
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

    public function obtenerAprendices() 
    {
        $sql = "
            SELECT 
                p.id_persona, 
                CONCAT(p.primer_nombre, ' ', IFNULL(p.segundo_nombre, ''), ' ', p.primer_apellido, ' ', IFNULL(p.segundo_apellido, '')) AS nombre_completo, 
                pr.nombre AS programa 
            FROM persona p 
            JOIN aprendiz a ON p.id_persona = a.id_persona 
            JOIN aprendiz_programa ap ON a.id_aprendiz = ap.id_aprendiz 
            JOIN programa pr ON ap.id_programa = pr.id_programa;
        ";

        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerRoles() 
    {
        $sql = "SELECT id_rol, nombre FROM rol ORDER BY nombre ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
