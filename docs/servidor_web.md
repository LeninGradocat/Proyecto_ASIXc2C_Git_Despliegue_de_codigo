# Despliegue del Servidor Web (Apache + PHP)

## 2.1. Instalación y Configuración

Completamos la instalación de la pila LAMP (Linux, Apache, MySQL, PHP) en el Ubuntu Server.

| Componente | Paquete Instalado | Estado de Verificación |
| :--- | :--- | :--- |
| **Servidor Web** | `apache2` | Correcto (`active (running)`) |
| **PHP** | `php libapache2-mod-php php-mysql` | Correcto (Verificado con `info.php`) |

Se configuró la red con IP estática ***(`192.168.122.2/22`)***

## 2.2. Despliegue del Código Base

El código del proyecto `app/` fue clonado y copiado a la raíz del servidor (`/var/www/html/`) con los permisos ajustados al usuario `www-data`.

## 2.3. Verificación Inicial de Fallo (Issue #1)

Al intentar acceder a la aplicación después del despliegue, se confirma un fallo de conexión a la base de datos a causa de un error en el archivo index.php:

![](../images/error_index_php.png)

Original: method="posts"

Correcto: method="post"

![Nuestro código: ](../images/Solucio_index_php.png)

**Comando de Prueba:**

```bash
curl http://localhost/

