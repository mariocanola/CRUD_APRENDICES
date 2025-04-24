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
        $sql = "SELECT * FROM persona WHERE id_persona = :id_persona";
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function crearPersona($datos)
    {
        $sql = "INSERT INTO persona (primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, id_tipo_documento, documento, fecha_nacimiento, id_sanguineo, id_sexo) VALUES (:primer_nombre, :segundo_nombre, :primer_apellido, :segundo_apellido, :id_tipo_documento, :documento, :fecha_nacimiento, :id_sanguineo, :id_sexo)";

        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':primer_nombre', $datos['primer_nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_nombre', $datos['segundo_nombre'], PDO::PARAM_STR);
        $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
        $stmt->bindParam(':id_tipo_documento', $datos['id_tipo_documento'], PDO::PARAM_INT);
        $stmt->bindParam(':documento', $datos['documento'], PDO::PARAM_STR);
        $stmt->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento'], PDO::PARAM_STR);
        $stmt->bindParam(':id_sanguineo', $datos['id_sanguineo'], PDO::PARAM_INT);
        $stmt->bindParam(':id_sexo', $datos['id_sexo'], PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function eliminarAprendiz($id_persona)
    {
        try {
            // Eliminar aprendiz
            $sql = "DELETE FROM aprendiz WHERE id_persona = :id_persona";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Error al eliminar aprendiz: " . $e->getMessage();
            return false;
        }
    }

    public function insertarAprendiz($id_persona)
    {
        try {
            $sql = "INSERT INTO aprendiz (id_persona) VALUES (:id_persona)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':id_persona', $id_persona, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al insertar aprendiz: " . $e->getMessage();
            return false;
        }
    }

    public function actualizarAprendiz($datos)
    {
        try {
            $sql = "UPDATE persona 
                SET 
                    primer_nombre = :primer_nombre, 
                    segundo_nombre = :segundo_nombre, 
                    primer_apellido = :primer_apellido,
                    segundo_apellido = :segundo_apellido, 
                    id_tipo_documento = :id_tipo_documento, 
                    documento = :documento, 
                    fecha_nacimiento = :fecha_nacimiento, 
                    id_sanguineo = :id_sanguineo, 
                    id_sexo = :id_sexo,
                    actualizado = CURRENT_TIMESTAMP
                WHERE id_persona = :id_persona";

            $stmt = $this->db->prepare($sql);

            $stmt->bindParam(':id_persona', $datos['id_aprendiz'], PDO::PARAM_INT);
            $stmt->bindParam(':primer_nombre', $datos['primer_nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_nombre', $datos['segundo_nombre'], PDO::PARAM_STR);
            $stmt->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
            $stmt->bindParam(':id_tipo_documento', $datos['id_tipo_documento'], PDO::PARAM_INT);
            $stmt->bindParam(':documento', $datos['documento'], PDO::PARAM_STR);
            $stmt->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento'], PDO::PARAM_STR);
            $stmt->bindParam(':id_sanguineo', $datos['id_sanguineo'], PDO::PARAM_INT);
            $stmt->bindParam(':id_sexo', $datos['id_sexo'], PDO::PARAM_INT);

            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Error al actualizar aprendiz: " . $e->getMessage();
            return false;
        }
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

    public function obtenerSexo()
    {
        $sql = "SELECT id_sexo, nombre FROM sexo ORDER BY nombre ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTipoDocumento()
    {
        $sql = "SELECT id_tipo_documento, nombre FROM tipo_documento ORDER BY nombre ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerTipoSanguineo()
    {
        $sql = "SELECT id_sanguineo, nombre FROM tipo_sangre ORDER BY nombre ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obtenerProgramas()
    {
        $sql = "SELECT id_programa, nombre FROM programa ORDER BY nombre ASC";
        $stmt = $this->db->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function asociarAprendizPrograma($id_aprendiz, $id_programa)
    {
        try {
            $sql = "INSERT INTO aprendiz_programa (id_aprendiz, id_programa) VALUES (:id_aprendiz, :id_programa)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':id_aprendiz' => $id_aprendiz,
                ':id_programa' => $id_programa
            ]);
        } catch (PDOException $e) {
            echo "Error al asociar aprendiz con programa: " . $e->getMessage();
            exit;
        }
    }

    public function asociarRolPersona($id_aprendiz, $id_rol)
    {
        try {
            $sql = "INSERT INTO rol_persona (id_rol, id_persona) VALUES (:id_rol, :id_persona)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([
                ':id_rol' => $id_rol,
                ':id_persona' => $id_aprendiz
            ]);
        } catch (PDOException $e) {
            echo "Error al asociar rol a persona: " . $e->getMessage();
            exit;
        }
    }

    public function obtenerInformacionAprendiz($id)
    {
        $sql = "SELECT
                    per.id_persona,
                    a.id_aprendiz,
                    per.documento,
                    per.primer_nombre,
                    per.segundo_nombre,
                    per.primer_apellido,
                    per.segundo_apellido,
                    per.fecha_nacimiento,
                    td.nombre AS tipo_documento,
                    s.nombre AS sexo,
                    ts.nombre AS tipo_sangre,
                    p.nombre AS programa,
                    r.nombre AS rol
                FROM aprendiz a
                INNER JOIN persona per ON a.id_persona = per.id_persona
                INNER JOIN rol_persona rp ON per.id_persona = rp.id_persona
                INNER JOIN tipo_documento td ON per.id_tipo_documento = td.id_tipo_documento
                INNER JOIN sexo s ON per.id_sexo = s.id_sexo
                INNER JOIN tipo_sangre ts ON per.id_sanguineo = ts.id_sanguineo
                INNER JOIN aprendiz_programa ap ON a.id_aprendiz = ap.id_aprendiz
                INNER JOIN programa p ON ap.id_programa = p.id_programa
                INNER JOIN rol r ON rp.id_rol = r.id_rol
                WHERE a.id_aprendiz = ?";
    
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function obtenerUltimoId()
    {
        try {
            $sql = "SELECT MAX(id_persona) AS ultimo_id FROM persona";
            $stmt = $this->db->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['ultimo_id'] ?? null;
        } catch (PDOException $e) {
            echo "Error al obtener el último ID: " . $e->getMessage();
            return null;
        }
    }

    public function obtenerUltimoIdAprendiz()
    {
        try {
            $sql = "SELECT MAX(id_aprendiz) AS ultimo_id FROM aprendiz";
            $stmt = $this->db->query($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['ultimo_id'] ?? null;
        } catch (PDOException $e) {
            echo "Error al obtener el último ID: " . $e->getMessage();
            return null;
        }
    }

    public function modificarAprendiz($datos)
    {
            try {
                // Actualizar los datos de la persona
                $sqlPersona = "UPDATE persona 
                    SET primer_nombre = :primer_nombre, 
                        segundo_nombre = :segundo_nombre, 
                        primer_apellido = :primer_apellido, 
                        segundo_apellido = :segundo_apellido, 
                        id_tipo_documento = :tipo_documento, 
                        documento = :documento, 
                        fecha_nacimiento = :fecha_nacimiento, 
                        id_sanguineo = :id_sanguineo, 
                        id_sexo = :id_sexo 
                    WHERE id_persona = :id_persona";

                $stmtPersona = $this->db->prepare($sqlPersona);
                $stmtPersona->bindParam(':primer_nombre', $datos['primer_nombre'], PDO::PARAM_STR);
                $stmtPersona->bindParam(':segundo_nombre', $datos['segundo_nombre'], PDO::PARAM_STR);
                $stmtPersona->bindParam(':primer_apellido', $datos['primer_apellido'], PDO::PARAM_STR);
                $stmtPersona->bindParam(':segundo_apellido', $datos['segundo_apellido'], PDO::PARAM_STR);
                $stmtPersona->bindParam(':tipo_documento', $datos['id_tipo_documento'], PDO::PARAM_INT);
                $stmtPersona->bindParam(':documento', $datos['documento'], PDO::PARAM_STR);
                $stmtPersona->bindParam(':fecha_nacimiento', $datos['fecha_nacimiento'], PDO::PARAM_STR);
                $stmtPersona->bindParam(':id_sanguineo', $datos['id_sanguineo'], PDO::PARAM_INT);
                $stmtPersona->bindParam(':id_sexo', $datos['id_sexo'], PDO::PARAM_INT);
                $stmtPersona->bindParam(':id_persona', $datos['id_persona'], PDO::PARAM_INT);
                $stmtPersona->execute();

                return true;
            } catch (PDOException $e) {
            return true;
        } catch (PDOException $e) {
            echo "Error al modificar aprendiz: " . $e->getMessage();
            return false;
        }
    }
}