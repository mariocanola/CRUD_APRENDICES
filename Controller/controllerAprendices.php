<?php
require_once __DIR__ . '/../Model/aprendices.php';
require_once __DIR__ . '/../Model/conexion.php';


class ControllerAprendices
{
    private $model;

    public function __construct()
    {
        $this->model = new Aprendices();
    }

    public function manejarSolicitud()
    {
        $allowedActions = ['listaAprendices', 'almacenar', 'delete', 'actualizar'];
        $action = $_GET['action'] ?? 'listaAprendices';

        if (!in_array($action, $allowedActions)) {
            header('Location: ControllerAprendices.php?action=listaAprendices');
            exit;
        }

        switch ($action) {
            case 'listaAprendices':
                $this->listarAprendices();
                break;

            case 'almacenar':
                $this->crearAprendiz();
                break;
            case 'actualizar':
                $this->actualizarAprendiz();
                break;

            case 'delete':
                $this->eliminarAprendiz();
                break;
        }
    }

    public function actualizarAprendiz()
    {
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $id = $_POST['id'] ?? null;
            $datos = [
                'primer_nombre' => $_POST['primer_nombre'] ?? '',
                'segundo_nombre' => $_POST['segundo_nombre'] ?? '',
                'primer_apellido' => $_POST['primer_apellido'] ?? '',
                'segundo_apellido' => $_POST['segundo_apellido'] ?? '',
                'id_tipo_documento' => $_POST['tipo_documento'] ?? '',
                'documento' => $_POST['documento'] ?? '',
                'id_sexo' => $_POST['id_sexo'] ?? '',
                'fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? '',
                'id_sanguineo' => $_POST['id_sanguineo'] ?? ''
            ];

            foreach ($datos as $key => $value) {
                if (empty($value)) {
                    echo "El campo $key es obligatorio.";
                    return;
                }
            }

            if (!is_numeric($datos['documento'])) {
                echo "El campo documento debe ser numérico.";
                return;
            }

            if (!strtotime($datos['fecha_nacimiento'])) {
                echo "El campo fecha de nacimiento no es válido.";
                return;
            }

            try {
                $this->model->actualizarAprendiz($id, $datos);
                header('Location: ../index.php');
                exit;
            } catch (Exception $e) {
                echo "Error al actualizar aprendiz: " . $e->getMessage();
            }
        } else {
            require '../View/actualizar.php';
        }
    }

    public function listarAprendices()
    {
        try {
            $aprendices = $this->model->obtenerAprendices();
            if (!$aprendices) {
                echo "No se encontraron aprendices.";
                return;
            }
            header('location: ../index.php');
            
        } catch (Exception $e) {
            echo "Error al listar aprendices: " . $e->getMessage();
        }
    }

    public function crearAprendiz()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $datos = [
                'primer_nombre' => $_POST['primer_nombre'] ?? '',
                'segundo_nombre' => $_POST['segundo_nombre'] ?? '',
                'primer_apellido' => $_POST['primer_apellido'] ?? '',
                'segundo_apellido' => $_POST['segundo_apellido'] ?? '',
                'id_tipo_documento' => $_POST['tipo_documento'] ?? '',
                'documento' => $_POST['documento'] ?? '',
                'id_sexo' => $_POST['id_sexo'] ?? '',
                'fecha_nacimiento' => $_POST['fecha_nacimiento'] ?? '',
                'id_sanguineo' => $_POST['id_sanguineo'] ?? '',
                'id_rol' => $_POST['id_rol'] ?? '',
                'id_programa' => $_POST['id_programa'] ?? ''
            ];

            foreach ($datos as $key => $value) {
                if (empty($value)) {
                    echo "El campo $key es obligatorio.";
                    return;
                }
            }

            if (!is_numeric($datos['documento'])) {
                echo "El campo documento debe ser numérico.";
                return;
            }

            if (!strtotime($datos['fecha_nacimiento'])) {
                echo "El campo fecha de nacimiento no es válido.";
                return;
            }

            try {
                $this->model->crearPersona($datos);
                $id_persona = $this->model->obtenerUltimoId();
                $this->model->insertarAprendiz($id_persona);
                $id_aprendiz = $this->model->obtenerUltimoIdAprendiz();
                $this->model->asociarRolPersona($id_aprendiz, $datos['id_rol']);
                $this->model->asociarAprendizPrograma($id_aprendiz, $datos['id_programa']);

                header('Location: ../index.php');
                exit;
            } catch (Exception $e) {
                echo "Error al crear aprendiz: " . $e->getMessage();
            }
        } else {
            require '../View/crear.php';
        }
    }

    public function eliminarAprendiz()
    {
        $id = $_GET['id'] ?? null;

        if (!is_numeric($id)) {
            echo "ID no válido.";
            return;
        }

        try {
            $this->model->eliminarAprendiz($id);
            header('Location: ../index.php');
        } catch (Exception $e) {
            echo "Error al eliminar aprendiz: " . $e->getMessage();
        }
    }

    public function verAprendiz($id)
    {
        $id = $_GET['id'] ?? null;
        if ($id) {
            $modelo = new Aprendices();
            return $modelo->obtenerInformacionAprendiz($id);
            require_once '../View/ver_aprendiz.php';
        }
    }
}

$controller = new ControllerAprendices();
$controller->manejarSolicitud();

