# Diseño y Configuración Web

## 4.1. Estructura del Proyecto y Fallos Iniciales

El código base del proyecto CRUD contenía intencionalmente un total de **8 fallos** que impedían el correcto funcionamiento o introducían vulnerabilidades. Estos fallos han sido documentados como Issues de GitHub para su seguimiento y gestión por parte del equipo.

| Archivo | Tipo de Operación | Problema Documentado (Issue #) | Detalle del Fallo |
| :--- | :--- | :--- | :--- |
| `db.php` | Conexión | **Issue #1: Hostname Incorrecto** | Error tipográfico en `$servername`: `"locahost"` en lugar de `"localhost"`. |
| `Script SQL` | Despliegue DB | **Issue #2: Sentencia 'CREATE' Inválida** | Error de sintaxis SQL: uso incorrecto de `Where false` en la sentencia `CREATE DATABASE`. |
| `index.php` | Formulario | **Issue #3: Método de Formulario Inválido** | Error tipográfico en el HTML: `method="posts"` en lugar del método HTTP correcto `method="post"`. |
| `add.php` | Inserción | **Issue #4: Sintaxis SQL en 'INSERT'** | La sentencia preparada usa comodines `*` en lugar de los marcadores de posición `?`. |
| `edit.php` | Actualización | **Issue #5: Sintaxis SQL en 'UPDATE'** | Sentencia `UPDATE` incompleta; omisión de la cláusula `SET`. |
| `index.php` | Seguridad UX | **Issue #6: Vulnerabilidad XSS** | **Mejora:** Falta el uso de `htmlspecialchars()` en la impresión de datos. |
| `delete.php` | Eliminación | **Issue #7: Sintaxis SQL en 'DELETE'** | Uso de `DELETE * FROM` en lugar del comando correcto `DELETE FROM`. |
| `delete.php` | Seguridad Crítica | **Issue #8: Riesgo de Inyección SQL** | **Mejora Crítica:** Uso directo de `$_GET['id']` sin sentencias preparadas. |

---

## 4.2. Correcciones de Sintaxis y Lógica (Issues #1, #3, #4, #5, #7)

Se han resuelto los errores de sintaxis y tipografía que impedían la funcionalidad base del CRUD.

| Issue | Archivo | Línea Original (Problema) | Línea Corregida (Solución) |
| :--- | :--- | :--- | :--- |
| **#1** | `db.php` | `$servername = "locahost";` | `$servername = "localhost";` |
| **#3** | `index.php` | `<form action="add.php" method="posts">` | `<form action="add.php" method="post">` |
| **#4** | `add.php` | `$sql = "INSERT ... VALUES (*, *)";` | `$sql = "INSERT ... VALUES (?, ?)";` |
| **#5** | `edit.php` | `$sql = "UPDATE users where name=?, ...";` | `$sql = "UPDATE users SET name=?, ...";` |
| **#7** | `delete.php` | `$conn->query("DELETE * FROM users WHERE id=$id");` | Refactorizado para usar `prepare("DELETE FROM users WHERE id=?")`. |

---

## 4.3. Correcciones de Seguridad y Buenas Prácticas (Issues #6 y #8)

Las últimas Issues se enfocan en refactorizar el código para prevenir ataques de seguridad y mejorar la robustez.

### Issue #6: Prevención de XSS en `index.php`

**Descripción:** La impresión de datos de usuario sin filtrar en la tabla (`echo $user['name']`) crea una vulnerabilidad de *Cross-Site Scripting (XSS)*, permitiendo la inyección de código malicioso.

**Acción:** Se implementa **`htmlspecialchars()`** en toda salida de datos del usuario, asegurando que el contenido malicioso sea tratado como texto plano.

### Issue #8: Eliminación de Inyección SQL en `delete.php`

**Descripción:** El código original utilizaba una consulta `query()` con concatenación de variables (`$id`), exponiendo la base de datos a ataques de inyección SQL.

**Acción:** La función de eliminación ha sido completamente refactorizada para utilizar **sentencias preparadas** (`$stmt = $conn->prepare(...)`), asegurando que la entrada del usuario (`$_GET['id']`) se trate como un dato seguro y no como parte de la instrucción SQL.

Una vez corregidos esos errores, ubicamos todos los archivos en la carpeta /var/www/html de nuestro servidor Apache:

![Diseño Apache](../images/Diseno_apache.png)

Tras ello la web funcionó de forma correcta y pudimos empezar a añadir usuarios.

[⬅ Volver a Documentación](README.md)
