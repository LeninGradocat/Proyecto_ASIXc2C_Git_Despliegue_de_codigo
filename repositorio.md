# Creación del Repositorio Git

## Introducción

Se documenta el proceso realizado para la creación y configuración del repositorio Git utilizado en el proyecto. Esta sección detalla los pasos que permitieron gestionar el código fuente de manera colaborativa, incluyendo la organización de ramas, permisos de equipo y el primer commit con el código base.

## Creación del Repositorio

El equipo creó un repositorio en GitHub con los siguientes parámetros:

- **Nombre:** `Proyecto_ASIXc2C_Git_Despliegue_de_codigo`
- **Visibilidad:** Privado o público según los requerimientos del proyecto.
- **README:** Se decidió inicializarlo automáticamente.

> **Nota:** Se utilizó la conexión **SSH** para facilitar la autenticación sin necesidad de usuario y contraseña.

## Configuración de SSH

### -Generación de clave SSH
Se generó una clave SSH con el siguiente comando:

```bash
ssh-keygen -t ed25519 -C "correo_del_equipo@ejemplo.com"
