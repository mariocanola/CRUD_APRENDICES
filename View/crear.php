<?php
require_once '../Model/conexion.php';
require_once '../Model/aprendices.php';

$model = new Aprendices();
$roles = $model->obtenerRoles();
$sexo = $model->obtenerSexo();
$tipo_documento = $model->obtenerTipoDocumento();
$tipo_sangre = $model->obtenerTipoSanguineo();
$programas = $model->obtenerProgramas();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Crear Persona</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">
        <h2 class="mb-4 text-center text-primary">Registrar Nueva Persona</h2>

        <form action="../Controller/ControllerAprendices.php?action=almacenar" method="POST" class="bg-white p-4 rounded shadow-sm">
            <div class="mb-3">
                <label for="rol" class="form-label">Asignación de Rol</label>
                <select name="id_rol" id="rol" class="form-select" required>
                    <option value="">Seleccionar Rol</option>
                    <?php if (!empty($roles)): ?>
                        <?php foreach ($roles as $rol): ?>
                            <option value="<?= htmlspecialchars($rol['id_rol'] ?? '') ?>"><?= htmlspecialchars($rol['nombre'] ?? 'Sin nombre') ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay roles disponibles</option>
                    <?php endif; ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="programa" class="form-label">Programa</label>
                <select name="id_programa" id="programa" class="form-select" required>
                    <option value="">Seleccionar Programa</option>
                    <?php if (!empty($programas)): ?>
                        <?php foreach ($programas as $programa): ?>
                            <option value="<?= htmlspecialchars($programa['id_programa'] ?? '') ?>"><?= htmlspecialchars($programa['nombre'] ?? 'Sin nombre') ?></option>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <option value="">No hay programas disponibles</option>
                    <?php endif; ?>
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
                    <label for="primer_apellido" class="form-label">Primer Apellido</label>
                    <input type="text" class="form-control" id="primer_apellido" name="primer_apellido" required>
                </div>

                <div class="col-3">
                    <label for="segundo_apellido" class="form-label">Segundo Apellido</label>
                    <input type="text" class="form-control" id="segundo_apellido" name="segundo_apellido">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-3 mb-3">
                    <label for="tipo_documento" class="form-label">Tipo de Documento</label>
                    <select name="tipo_documento" id="tipo_documento" class="form-select" required>
                        <option value="">Seleccionar Tipo de Documento</option>
                        <?php if (!empty($tipo_documento)): ?>
                            <?php foreach ($tipo_documento as $documento): ?>
                                <option value="<?= htmlspecialchars($documento['id_tipo_documento'] ?? '') ?>">
                                    <?= htmlspecialchars($documento['nombre'] ?? 'Sin nombre') ?>
                                </option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay tipos de documento disponibles</option>
                        <?php endif; ?>
                    </select>
                </div>
                <div class="col-3 mb-3">
                    <label for="documento" class="form-label">N° Documento</label>
                    <input type="text" class="form-control" id="documento" name="documento" required pattern="\d+" title="Solo se permiten números">
                </div>
            </div>

            <div class="mb-3">
                <label for="fecha_nacimiento" class="form-label">Fecha de Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" required>
            </div>

            <div class="row mb-3">
                <div class="col-3 mb-3">
                    <label for="sexo" class="form-label">Sexo</label>
                    <select name="id_sexo" id="sexo" class="form-select" required>
                        <option value="">Seleccionar Sexo</option>
                        <?php if (!empty($sexo)): ?>
                            <?php foreach ($sexo as $sexos): ?>
                                <option value="<?= htmlspecialchars($sexos['id_sexo'] ?? '') ?>"><?= htmlspecialchars($sexos['nombre'] ?? 'Sin nombre') ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay opciones de sexo disponibles</option>
                        <?php endif; ?>
                    </select>
                </div>

                <div class="col-3">
                    <label for="tipo_sangre" class="form-label">Tipo de Sangre</label>
                    <select name="id_sanguineo" id="tipo_sangre" class="form-select" required>
                        <option value="">Seleccionar Tipo de Sangre</option>
                        <?php if (!empty($tipo_sangre)): ?>
                            <?php foreach ($tipo_sangre as $sangre): ?>
                                <option value="<?= htmlspecialchars($sangre['id_sanguineo'] ?? '') ?>"><?= htmlspecialchars($sangre['nombre'] ?? 'Sin nombre') ?></option>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <option value="">No hay tipos de sangre disponibles</option>
                        <?php endif; ?>
                    </select>
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