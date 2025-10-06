?php
100
include 'db.php';
101
​
102
if (isset($_GET['id'])) {
103
    $id = (int)$_GET['id'];
104
    $result = $conn->query("SELECT * FROM users WHERE id=$id");
105
    $user = $result->fetch_assoc();
106
}
107
​
108
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
109
    $id    = (int)$_POST['id'];
110
    $name  = $_POST['name'];
111
    $email = $_POST['email'];
112
​
113
    $stmt = $conn->prepare("UPDATE users where name=?, email=? WHERE id=?");
114
    $stmt->bind_param("ssi", $name, $email, $id);
115
    $stmt->execute();
116
​
117
    header("Location: index.php");
118
    exit;
119
}
120
?>
121
​
122
<!DOCTYPE html>
123
<html lang="ca">
124
<head>
125
    <meta charset="UTF-8">
126
    <title>Editar usuari</title>
127
</head>
128
<body>
129
    <h1>Editar usuari</h1>
130
    <form method="post">
131
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
132
        Nom: <input type="text" name="name" value="<?= $user['name'] ?>" required>
133
        Email: <input type="email" name="email" value="<?= $user['email'] ?>" required>
134
        <button type="submit">Desar</button>
135
    </form>
136
</body>
137
</html>
138
​
139
​
140
​
141
*** DELETE.PHP ***
142
​
143
<?php
144
include 'db.php';
145
​
146
$id = (int)$_GET['id'];
147
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Editar usuari</title>
</head>
<body>
    <h1>Editar usuari</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?= $user['id'] ?>">
        Nom: <input type="text" name="name" value="<?= $user['name'] ?>" required>
        Email: <input type="email" name="email" value="<?= $user['email'] ?>" required>
        <button type="submit">Desar</button>
    </form>
</body>
</html>
