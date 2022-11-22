# Administrador De Campos Dinamicos
### Instalación Y Uso Del Proyecto

[![N|Solid](https://laravel.com/img/logotype.min.svg)](https://laravel.com)

[![Build Status](https://travis-ci.org/joemccann/dillinger.svg?branch=master)](https://github.com/DeuxMachin/TI2_2022/tree/Dev)

## Herramientas Requeridas 🔧:

- Instalar XAMPP con la versión de [PHP](https://www.php.net/downloads.php) 7.4.29
- Laravel 7
- Instalar [Composer](https://getcomposer.org/download/) version 2.4.4
- Instalar [NodeJS](https://nodejs.org/es/download/) desde la version 16.16.0 adelante.
- [SQL Server Management studio](https://learn.microsoft.com/en-us/sql/ssms/download-sql-server-management-studio-ssms?view=sql-server-ver16)  para gestión de la base de datos a través de interfaz gráfica desde la versión 18.
- SMSS - Setup
- Instalar drivers [ODBC 17](https://learn.microsoft.com/en-us/sql/connect/odbc/download-odbc-driver-for-sql-server?view=sql-server-ver16)

# Step 1
### Instalación de Xampp y creacion de proyecto
Realizar la descarga a travez de la pagina [Xampp](https://www.apachefriends.org/download.html). 
Una vez ya realizada la descarga se debera descargar [Composer](https://getcomposer.org/download/).
Al tener instalado Composer se puede crear el proyecto con el que se trabajara. 
Para la creación del proyecto es necesario que se entre por la CMD y ingresar los siguientes comandos 
```sh
1) cd DirectorioDondeSeCreara
2) composer global require laravel/installer
3) composer create-project laravel/laravel NombreProyecto “7” 
```  
 **composer global require laravel/installer** creará un ambiente para laravel.
 **composer create-project laravel/laravel NombreProyecto “7”**  Se encargara de crear el proyecto y donde esta el numero se puede ingresar la versión que se quiera usar.
De esta manera se puede hacer la creación de un proyecto en laravel. 
Para iniciar el servidor local del proyecto es necesario entrar al directorio del proyecto a través de la CMD, al ya estar dentro de esta se deberá ingresar el **comando:** 
```sh
1) cd DirectorioDelProyecto
2) php artisan serv
```  
**php artisan serv** iniciara el servidor, con esto aparecera una direccion URL que es nuestra dirección local que se utilizara para poder hacer uso de este de manera localhost. 
```sh
127.0.0.1:8000
```

Con estos pasos ya realizados contamos con entorno capaz de trabajar dentro de este proyecto, pero aun asi faltan herramientas por instalar.

# Step 2
### Instalacion de SQL Server 2019 y NodeJS
Se debe realizar la descarga de esta versión en el [GitHub](https://learn.microsoft.com/es-mx/sql/sql-server/?view=sql-server-ver15). 
Se debera iniciar la instalacion Basica, al realizar esto despues apareceran las opciones de instalar el SSMS (SQL Server Management Studio) cuando esto succeda se debera seleccionar la opcion close, debido a que se usara otra versión de entorno de trabajo, esta es la 2018.
Se debe instalar [NodeJS](https://nodejs.org/en/) de manera default.

# Step 3
### Arreglo De Drivers

Se debe instalar OBDS 17 debido a que para poder trabajar en la base de datos es necesario contar con estos drivers ya que si no apareceran errores al hacer solicitudes de la base de datos. La versión necesaria para la instalación se encuentra en el [GitHub](https://learn.microsoft.com/en-us/sql/connect/odbc/download-odbc-driver-for-sql-server?view=sql-server-ver16). Esta instalación debe ser por defecto.

# Step 4
### Configuración de variables de entorno de Laravel ⌨️
Para configurar de entorno de este proyecto basta con modificar el archivo con el nombre “.env” en la carpeta raíz del proyecto. Cambiando los siguientes datos:

```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:y71LSEMp+W+65HRSXgrMN5Go/NtdVgvWlPU9bRfhwFA=
APP_DEBUG=true
APP_URL=http://localhost
LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug
DB_CONNECTION=sqlsrv
DB_HOST=localhost
DB_PORT=1433 #3306 - 1433
DB_DATABASE=camposdin
DB_USERNAME=admin
DB_PASSWORD=12345
BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120
MEMCACHED_HOST=127.0.0.1
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379
MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"
AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false
PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1
MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```
Variables importantes:
* La variable DB_CONNECTION es la conexion a base de datos elegida para el proyecto
* La variable DB_HOST es el lugar donde se hospedará el proyecto.
* La variable DB_PORT especifica el puerto donde se ejecutará un servidor
* La variable DB_DATABASE especifica el nombre de la base de datos que se usara para el proyecto
* La variable DB_USERNAME es la credencial que refiere al nombre de usuario para conectar a la base de datos
* La variable DB_PASSWORD es la credencial que refiere a la contraseña del usuario para conectar a la base de datos

#### Configuracion DB ⌨️
Lo primero que se debe de hacer, es la de habilitar los "Protocols" de SQL Server, para ello deberemos de abrir "Sql Server Configuration Manager" y dirigirnos a:
```
SQL Server Network Configuration -> Protocols for MSSQLSERVER
```
estando aqui, debemos de fijarnos que Shared Memory, Named Pipes y TCP/IP esten Habilitados o Enabled, luego procedemos a ir a:
```
SQL Server Services y reiniciamos SQL Server(MSSQLSERVER).
```
Teniendo esto configurado, procedemos a ejecutar o cargar el archivo BD_CompletaF.sql con Microsoft SQL Server Management Studio que se encuentra en la carpeta raiz del proyecto.

#### Ejecución de comandos del proyecto ⌨️
Una vez configurado todo el entorno de desarrollo, a continuación se presentan los comandos disponibles para ejecutar el proyecto.
```
php artisan serve
```
## Estructura de directorios ⚙️
### Directorio Raíz

#### Directorio App
El directorio app es el encargado de almacenar todo el código principal de nuestra aplicación. 
#### Directorio Bootstrap
El directorio bootstrap contiene contendra el archivo app.php, el cual es necesario para poder ser capaces de obtener una maqueta del framework. Este directorio también almacena un directorio cache que contiene archivos generados por el framework para optimización.
#### Directorio Config
El directorio config, como el nombre implica, contiene todos los archivos de configuración de tu aplicación. Es una buena idea leer todos estos archivos debido a que este directorio cuenta con bastantes funcionalidades que se trabajan a futuro.
#### Directorio Database
El directorio database contiene las migraciones de tu base de datos, model factories y seeders. Si lo deseas.
#### Directorio Public
El directorio public contiene nuestros archivos de la pagina, como los index, css y los js. Este directorio cuenta con un detalle para poder realizar llamadas de JS, CSS o imagenes, para poder hacer una solicitud bien de estos archivos almacenados es necesario agregar assets o mix en los url"assets{{}}".
#### Directorio Resources
El directorio resources contiene las vistas así como también tus assets sin compilar tales como LESS, Sass o JavaScript. Este directorio también almacena todos tus archivos de idiomas.
#### Directorio Routes
El directorio routes es un directorio bastante importante igual debido a que este contendra todas las definiciones de rutas para tu aplicación. Por defecto, algunos archivos de rutas son incluidos con Laravel: web.php, api.php, console.php y channels.php.
#### Directorio App
La mayoría de la aplicación está almacenada en el directorio app. Por defecto.
El directorio app contiene una variedad de directorios adicionales tales como Console, Http y Providers. Estos como son los directorios Console y Http se encargan de ayudarnos a proporcionaran una API de tu aplicación, pero no contienen lógica de la aplicación como tal. En otras palabras, son dos formas de emitir comandos a tu aplicación. El directorio Console contiene todos tus comandos de Artisan, mientras que el directorio Http contiene tus controladores, middleware y solicitudes.
#### El Directorio Console
El directorio Console almacena todos los comandos personalizados que tendremos atraves de Artisan para la aplicación. Estos comandos pueden ser generados usando el comando make:command. Este directorio también almacena el kernel de tu consola, que es donde tus comandos personalizados de Artisan son registrados y tus tareas programadas son definidas.
#### Directorio Exceptions
El directorio Exceptions contiene el manejador de excepciones de tu aplicación y también es un buen lugar para colocar cualquier excepción lanzada por tu aplicación. Si te gustaría personalizar cómo las excepciones son mostradas o renderizadas, debes modificar la clase Handler en este directorio.
#### Directorio Http
El directorio Http contiene tus controladores, middleware y form requests. Casi toda la lógica para manejar las solicitudes que llegan a tu aplicación serán colocadas en este directorio.


# Autores
##### Taller De Integracion 2
-  **Edward Contreras** - Scrum Master - [DeuxMachin](https://github.com/DeuxMachin)
-  **Joaquin Aguilar** - Desarrollador - [Juaker1](https://github.com/Juaker1)
-  **Roberto Nieves** - Desarrollador - [cowerino](https://github.com/cowerino)
-  **Benjamin Sanchez** - Desarrollador - [pansito2](https://github.com/pansito2)

##### Taller De Integracion 4
-  **Enrique Cayupan** - Scrum Master - [CatPsycho](https://github.com/CatPsycho)
-  **Brayan Silva** - Desarrollador - [BryanSnowth](https://github.com/BryanSnowth)


## License ©

Departamento De Ingeneria Civil En Informatica - Univerisdad Catolica De Temuco.

**Todos los derechos de autor pertenecen a Joaquin Aguilar, Edward Contreras, Roberto Nieves y Benjamin Sanchez.**




