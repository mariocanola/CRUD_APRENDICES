<?php
require_once '../Model/aprendices.php';
require_once '../Model/conexion.php';
$aprendiz = null;
$id_aprendiz = $_GET['id'] ?? null;

$modelo = new Aprendices();
$aprendiz = $modelo->obtenerInformacionAprendiz($id_aprendiz);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Aprendiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="mb-4 text-center">Información del Aprendiz</h2>

        <?php if (!empty($aprendiz)): ?>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>Tipo de Documento</th>
                        <td><?= htmlspecialchars($aprendiz['tipo_documento']) ?></td>
                    </tr>
                    <tr>
                        <th>Número de Documento</th>
                        <td><?= htmlspecialchars($aprendiz['documento']) ?></td>
                    </tr>
                    <tr>
                        <th>Primer Nombre</th>
                        <td><?= htmlspecialchars($aprendiz['primer_nombre']) ?></td>
                    </tr>
                    <tr>
                        <th>Segundo Nombre</th>
                        <td><?= htmlspecialchars($aprendiz['segundo_nombre']) ?></td>
                    </tr>
                    <tr>
                        <th>Primer Apellido</th>
                        <td><?= htmlspecialchars($aprendiz['primer_apellido']) ?></td>
                    </tr>
                    <tr>
                        <th>Segundo Apellido</th>
                        <td><?= htmlspecialchars($aprendiz['segundo_apellido']) ?></td>
                    </tr>
                    <tr>
                        <th>Sexo</th>
                        <td><?= htmlspecialchars($aprendiz['sexo']) ?></td>
                    </tr>
                    <tr>
                        <th>Tipo Sanguíneo</th>
                        <td><?= htmlspecialchars($aprendiz['tipo_sangre']) ?></td>
                    </tr>
                    <tr>
                        <th>Fecha Nacimiento</th>
                        <td><?= htmlspecialchars($aprendiz['fecha_nacimiento']) ?></td>
                    </tr>
                    <tr>
                        <th>Programa</th>
                        <td><?= htmlspecialchars($aprendiz['programa']) ?></td>
                    </tr>
                    <tr>
                        <th>Rol</th>
                        <td><?= htmlspecialchars($aprendiz['rol']) ?></td>
                    </tr>
                </tbody>
            </table>

            <div class="text-center">
                <a href="../index.php" class="btn btn-secondary">Volver</a>
            </div>
        <?php else: ?>
            <div class="alert alert-danger">No se encontró información del aprendiz.</div>
        <?php endif; ?>
    </div>
</body>

</html>