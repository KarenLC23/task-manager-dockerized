<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Listado de Tareas</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 2rem;
        }

        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f4f4f4;
        }

        a.btn {
            background: #28a745;
            color: white;
            padding: 8px 12px;
            text-decoration: none;
            border-radius: 4px;
        }

        a.btn:hover {
            background: #218838;
        }
    </style>
</head>

<body>
    <h1>📋 Listado de Tareas</h1>

    <a class="btn" href="/tarea/crear">➕ Nueva tarea</a>

    <br><br>
    <?php if (!empty($tareas)): ?>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Título</th>
                    <th>Descripción</th>
                    <th>Creado en</th>
                    <th>Eliminar</th>
                    <th>Editar</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                    <tr>
                        <td><?= $tarea['id'] ?></td>
                        <td><?= $tarea['titulo'] ?></td>
                        <td><?= $tarea['descripcion'] ?></td>
                        <td><?= $tarea['creado_en'] ?></td>
                        <td><a href="/tarea/eliminar/<?= $tarea['id'] ?>">🗑 Eliminar</a></td>
                        <td><a href="/tarea/editar/<?= $tarea['id'] ?>">✏️ Editar</a></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php else: ?>
        <p>🚫 No hay tareas registradas.</p>
    <?php endif ?>
</body>

</html>