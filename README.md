# Instrucciones de Instalación

## Requisitos

Antes de comenzar, asegúrate de tener instalados los siguientes requisitos:

- **PHP** (recomendado PHP 8.2 o superior)
- **Composer** (gestor de dependencias para PHP)
- **MySQL** o **MariaDB** (para la base de datos)
- **Servidor Web** como **Apache** o **Nginx** (generalmente parte de XAMPP, WAMP o MAMP)

## Descargar el Proyecto

1. **Clonar el Repositorio:**

   Clona el repositorio desde GitHub usando GitHub desktop o descargalo y pegalo en donde tengas tu servidor (XAMPP, WAMP o MAMP)

2. **Configuración del Entorno**
Instalar Dependencias PHP:
Navega a la carpeta del proyecto y ejecuta Composer para instalar las dependencias PHP:
cd /path/to/xampp/htdocs/prueba-tecnica-claudia
composer install

Generar la Clave de la Aplicación:

Genera una clave de aplicación que Laravel necesita para la seguridad, para ello dentro del proyecto ejecuta el siguiente codigo:
php artisan key:generate

3. **Configurar el Archivo .env**

    Copia el archivo .env.example, pegalo en el mismo directorio y cambia su nombre a .env

4. **Configurar la base de datos**

Edita el archivo .env y configura los detalles de tu base de datos. 
Asegúrate de que las siguientes variables estén configuradas correctamente:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_de_base_de_datos
DB_USERNAME=usuario_de_base_de_datos (usualmente root)
DB_PASSWORD=contraseña_de_base_de_datos (usualmente vacía)

5. **Crear la base de datos**

Crea una nueva base de datos en MySQL o MariaDB con el nombre especificado en el archivo .env. 
Puedes hacerlo desde la línea de comandos o usando una herramienta de administración de bases de datos como phpMyAdmin.

Desde la línea de comandos de MySQL:
CREATE DATABASE nombre_de_base_de_datos;

6. **Ejecutar las Migraciones:**

Abre una terminal dentro del proyecto y ejecuta la siguiente linea de codigo:
php artisan migrate

7. **Ejecutar el servidor**

Para iniciar el servidor de desarrollo de Laravel, usa el siguiente comando:
php artisan serve

Esto iniciará un servidor local en http://localhost:8000. Puedes acceder a tu aplicación desde esta URL.

**USO**

Navega a http://localhost:8000 para acceder a la aplicación.
Usa el formulario de registro para crear una cuenta y verificar que todo funcione correctamente.