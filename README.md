# Aplicación de búsqueda de cursos y exámenes

Esta aplicación de consola en PHP permite buscar recursos (clases y exámenes) por nombre a partir de al menos 3 caracteres.

## Requisitos

- PHP 7.4 o superior
- MySQL
- Composer (para autoload)

## Instalación

1. Clona el repositorio.
2. Crea la base de datos ejecutando el archivo `sql/create_tables.sql` en tu servidor MySQL.
3. Configura las credenciales de la base de datos en `.env`.

## Uso

Ejecuta el comando en consola:

php main.php search ingles

