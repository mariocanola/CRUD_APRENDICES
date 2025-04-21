<?php

require_once 'model/aprendices.php';
require_once 'model/conexion.php';

$aprendizModel = new Aprendices();
$aprendices = $aprendizModel->obtenerAprendices();
?>

<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista || aprendices || Sena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="text-center alert alert-primary">Lista de aprendices</div>
        <div class="mb-3 text-center">
            <a href="/CRUD_APRENDICES/view/crear.php"  target="_blank" class="btn btn-success">
                <i class="fas fa-user-plus"></i> Crear nueva persona
            </a>
        </div>

        <table class="table table-striped table-bordered">
            <thead class="table-dark text-center">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre completo</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody class="text-center">
            
                <?php 
                    if (!empty($aprendices))
                    foreach ($aprendices as $datos): ?>
                        <tr>
                            <td><?php echo $datos['id_persona']; ?></td>
                            <td><?php echo $datos['nombre_completo']; ?></td>
                            <td><?php echo $datos['programa']; ?></td>
                            <td>
                                <a href="view/ver.php?id=<?= $datos['id_persona'] ?>" target="_blank" class="btn btn-success">
                                    <i class="fas fa-eye"></i> Ver
                                </a>

                                <a href="../view/actualizar.php?id=<?= $datos['id_persona'] ?>" target="_blank" class="btn btn-warning">
                                    <i class="fas fa-user-edit"></i> Editar
                                </a>

                                <a href="controllers/ControllerAprendiz.php?action=delete&id=<?= $datos['id_persona'] ?>"
                                    onclick="return confirm('¿Seguro que deseas eliminar este aprendiz?')"
                                    class="btn btn-danger">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                            </td>
                        </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>