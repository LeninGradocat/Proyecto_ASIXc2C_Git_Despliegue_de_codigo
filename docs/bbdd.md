# Guía de Instalación y Pruebas de Base de Datos MySQL

Esta guía explica cómo instalar MySQL, crear y probar usuarios, y conectar tu aplicación web. Se incluyen imágenes clave y explicaciones detalladas del código.

---

## 1. Instalación de MySQL

Instala MySQL en tu servidor.instalador oficial y seguir el asistente de instalación.

![Instalación MySQL](../images/installacion_mysql.png)

Una vez instalado, vamos verificando que el servicio esté activo:

![Estado del servicio MySQL](../images/status_mysql.png)

En el código, la conexión se realiza normalmente así:

```php
$conn = new mysqli('localhost', 'root', 'tu_contraseña', 'nombre_bd');
if ($conn->connect_error) {
    die('Error de conexión: ' . $conn->connect_error);
}
```
Este fragmento asegura que la aplicación se detenga si la conexión falla, mostrando el error.

---

## 2. Configuración de Red y Firewall

Abre el puerto 3306 en el firewall para permitir conexiones externas a MySQL:

![Abriendo puerto](../images/abriendo_puerto.png)

Permite el acceso a través del firewall para el servicio MySQL:

![Permitir firewall](../images/permitir_firewall.png)

---

## 3. Creación de la Base de Datos

Crea la base de datos usando la consola MySQL o phpMyAdmin. Por ejemplo:

```sql
CREATE DATABASE crud_db;
```

![Creando base de datos](../images/creando_bd.png)

---

## 4. Creación y Prueba de Usuario

Para crear un usuario, ejecuta:

```sql
CREATE USER 'juan'@'localhost' IDENTIFIED BY 'Password123';
GRANT ALL PRIVILEGES ON crud_db.* TO 'juan'@'localhost';
FLUSH PRIVILEGES;
```

![Usuario creado](../images/usuario_creado.png)

Para probar la edición del usuario, cambia el apellido de "juan".

![Usuario editado](../images/usuario_editado.png)

Con esto vamos verificando que el usuario tiene permisos de edición y que los cambios se reflejan correctamente en la base de datos.

---

## 5. Conexión y Pruebas desde la Aplicación Web

Accede a la web e iremos verificando la conexión con la base de datos. Deberías poder ver la lista de usuarios y realizar operaciones CRUD:

![Vista inicial web](../images/vista_inical_web.png)

Agrega un usuario desde la web para comprobar la inserción:

![Agregar datos](../images/addphp.png)

Edita el usuario "juan" para asegurarte de que los cambios se guardan:

![Editar datos](../images/vista_edit.png)

---

## 6. Diseño y Configuración del Servidor Web

Ubica los archivos PHP en la carpeta correspondiente de tu servidor Apache, por ejemplo `/var/www/html`.

![Diseño Apache](../images/Diseno_apache.png)


---


