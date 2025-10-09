# Documentación del Proyecto

Bienvenido a la documentación técnica del proyecto. Esta carpeta contiene todos los manuales y guías necesarias para comprender, configurar y desplegar la aplicación web con su base de datos.

---

## Estructura de la documentación

| Archivo | Descripción |
|---------|-------------|
| [repositorio.md](repositorio.md) | Explica la creación y configuración del repositorio Git, ramas, permisos y el primer commit del código base. |
| [servidor_web.md](servidor_web.md) | Detalla la instalación y configuración del servidor web Apache con PHP, creación de virtual hosts, permisos y verificación del funcionamiento. |
| [bbdd.md](bbdd.md) | Contiene instrucciones para instalar MySQL/MariaDB, crear bases de datos y usuarios, importar scripts y conectar la aplicación web. |
| [diseno_web.md](diseno_web.md) | Describe el diseño y funcionamiento de cada archivo `.php`, los errores encontrados y las correcciones aplicadas. |

---

## Uso de la documentación

1. Leer cada archivo según la etapa del proyecto que se desea consultar.
2. Orden recomendado para comprensión completa:
   1. `repositorio.md`  
   2. `servicio.md`  
   3. `bbdd.md`
3. Revisar los bloques de código y ejemplos antes de aplicarlos en el entorno de producción.

---

## Notas importantes

- **Actualización constante:** Mantener la documentación actualizada ante cualquier cambio en el código, configuración del servidor o base de datos.  
- **Compatibilidad:** Verificar que las versiones de PHP, Apache y MySQL/MariaDB sean compatibles con los ejemplos proporcionados.  
- **Seguridad:** Nunca subir contraseñas reales ni claves privadas al repositorio público. Usar variables de entorno o archivos de configuración `.env` cuando sea posible.  
- **Referencias:** Para ver el índice general del proyecto y enlaces a otras secciones, consultar el `README.md` de la raíz.

---

## Consejos de uso

- Puedes abrir cada `.md` directamente en GitHub/GitLab para aprovechar el renderizado de Markdown.  
- Resalta cambios importantes o notas para futuros colaboradores usando emojis o **negritas**.  
- Aprovecha los bloques de código para copiar comandos de instalación o configuración sin errores.  

[⬅ Volver al índice principal](../README.md)
