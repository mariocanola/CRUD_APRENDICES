<!doctype html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lista || aprendices || Sena</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/03a89292db.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="container mt-4">
        <div class="text-center alert alert-primary">Lista de aprendices</div>
        <div class="mb-3">
            <button class="btn btn-success text-center">
                <i class="fas fa-user-plus"></i> Crear nueva persona
            </button>
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
                include("model/conexion.php");
                $conexion = (new Database())->connect();
                $consulta = $conexion->query("
                    SELECT 
                        p.id_persona, 
                        CONCAT(p.primer_nombre, ' ', IFNULL(p.segundo_nombre, ''), ' ', p.primer_apellido, ' ', IFNULL(p.segundo_apellido, '')) AS nombre_completo, 
                        pr.nombre AS programa 
                    FROM persona p 
                    JOIN aprendiz a ON p.id_persona = a.id_persona 
                    JOIN aprendiz_programa ap ON a.id_aprendiz = ap.id_aprendiz 
                    JOIN programa pr ON ap.id_programa = pr.id_programa;
                ");

                while ($datos = $consulta->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <tr>
                        <td><?php echo $datos['id_persona']; ?></td>
                        <td><?php echo $datos['nombre_completo']; ?></td>
                        <td><?php echo $datos['programa']; ?></td>
                        <td>
                            <button class="btn btn-success">
                            <i class="fas fa-eye"></i> Ver
                            </button>

                            <button class="btn btn-warning">
                                <i class="fas fa-edit"></i> Editar
                            </button>

                            <button class="btn btn-danger">
                                <i class="fas fa-trash-alt"></i> Eliminar
                            </button>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>