<?php
require_once '../Model/conexion.php';
require_once '../Model/aprendiz.php';

$model = new Aprendices();
$roles = $model->obtenerRoles(); // Debes tener este método implementado
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center text-primary">Registrar Nueva Persona</h2>

        <form action="../Controllers/ControllerAprendices.php?action=store" method="POST" class="bg-white p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="rol" class="form-label">Asignación de Rol</label>
                <select name="id_rol" id="rol" class="form-select" required>
                    <option value="">Seleccionar Rol</option>
                    <?php foreach ($roles as $rol): ?>
                        <<option value="<?= htmlspecialchars($rol['id'] ?? '') ?>"><?= htmlspecialchars($rol['nombre'] ?? 'Sin nombre') ?></option>
                        <?php endforeach; ?>
                </select>
            </div>

            <div class="row mb-3">
                <div class="col-3 mb-3">
                    <label for="primer_nombre" class="form-label">Primer Nombre</label>
                    <input type="text" class="form-control" id="primer_nombre" name="primer_nombre" required>
                </div>

                <div class="col-3">
                    <label for="segundo_nombre" class="form-label">Segundo Nombre</label>
                    <input type="text" class="form-control" id="segundo_nombre" name="segundo_nombre">
                </div>

                <div class="col-3">
                    <label for="primer_apellido" class="form-label">primer apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                </div>

                <div class="col-3">
                    <label for="segundo_apellido" class="form-label">Segundo apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3 mb-3">
                    <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                    <input type="text" class="form-control" id="tipo_documento" name="tipo_documento" required>
                </div>

                <div class="col-3 mb-3">
                    <label for="documento" class="form-label">N° Documento</label>
                    <input type="text" class="form-control" id="documento" name="documento" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save"></i> Guardar
            </button>
            <a href="../index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
</body>

</html>