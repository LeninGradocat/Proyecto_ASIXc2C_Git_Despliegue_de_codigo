<?php include('db.php'); ?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios - CRUD PHP</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid #444;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #fafafa;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>Gestión de Usuarios</h1>

    <!-- Formulario para añadir nuevo usuario -->
    <section>
        <h2>Añadir nuevo usuario</h2>
        <form action="add.php" method="post">
            <input type="text" name="name" placeholder="Nombre" required>
            <input type="email" name="email" placeholder="Correo electrónico" required>
            <button type="submit">Agregar</button>
        </form>
    </section>

    <!-- Listado de usuarios -->
    <section>
        <h2>Usuarios registrados</h2>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT * FROM users ORDER BY id DESC");
                while ($row = $result->fetch_assoc()):
                ?>
                <tr>
                    <td><?= htmlspecialchars($row['id']) ?></td>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['email']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['id'] ?>">Editar</a> |
                        <a href="delete.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?');">Eliminar</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </section>
</body>
</html>