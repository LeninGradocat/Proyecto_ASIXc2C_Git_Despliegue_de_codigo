<?php
include('db.php');

// Si se recibe ID por GET, se muestra el formulario
if (isset($_GET['id'])) {
    $id = (int) $_GET['id'];

    $stmt = $conn->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();
    $stmt->close();

    if (!$user) {
        die("Usuario no encontrado.");
    }
}

// Si se envía el formulario (POST), se actualizan los datos
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = (int) $_POST['id'];
    $name = trim($_POST["name"]);
    $email = trim($_POST["email"]);

    if (!empty($name) && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssi", $name, $email, $id);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.min.css">
</head>
<body>
    <h1>Editar usuario</h1>

    <form action="edit.php" method="post">
        <input type="hidden" name="id" value="<?= htmlspecialchars($user['id']) ?>">
        <input type="text" name="name" value="<?= htmlspecialchars($user['name']) ?>" required>
        <input type="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
        <button type="submit">Guardar cambios</button>
        <a href="index.php">Cancelar</a>
    </form>
</body>
</html>
