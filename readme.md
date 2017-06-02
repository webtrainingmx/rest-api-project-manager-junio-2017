# Project Manager API

Un ejemplo de RESTful API creado con Laravel Lumen.

## Pre-requisitos

Este RESTful API fue creado con Laravel Lumen, que nos exige una versión moderna de PHP y algunas de sus extensiones instaladas:

```
PHP >= 5.6.4
OpenSSL PHP Extension
PDO PHP Extension
Mbstring PHP Extension
Tokenizer PHP Extension
XML PHP Extension
```

Para desarrollo y configuración rápida te recomendamos instalar un meta-paquete como XAMPP 
[descargar aquí](https://www.apachefriends.org/download.html). Sólo hay que estar seguros de descargar
XAMPP con PHP 7.1 (recomendado). Esto te instalará MySQL, PHPMyAdmin, Apache y claro un PHP moderno.

## Instalación para Desarrollo

1) Instalar dependencias de Composer (ejecutar desde el directorio raiz de este proyecto).
```
composer install
```
2) Configurar base de datos:

Para tu comodidad hemos creado un *MySQL dump* en este archivo `<REPO>/database/sql/project_manager_api.sql`.
Este archivo contiene dos usuarios, un proyecto y una tarea de demostración.

2.1) Importa esta base de datos usando algún cliente web como PHPMyAdmin o Sequel Pro.
2.2) Crea un usuario que se pueda conectar a esta base de datos, por ejemplo:
```
Base de datos:  project_manager_api
Usuario:        project_mgr_user
Constraseña:    D5xNL5LpHPVTxwz4
```
2.3) Crea un archivo llamado `.env` en la raíz de este proyecto, con los siguientes datos:
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=QpN1zSwDEyrRwuWabUKIboskIlIm3nC8
APP_TIMEZONE=UTC

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=project_manager_api
DB_USERNAME=project_mgr_user
DB_PASSWORD=D5xNL5LpHPVTxwz4

CACHE_DRIVER=file
QUEUE_DRIVER=sync
```
Lo importante en este caso son los datos de conexión a la base de datos.

3) Iniciar tu servidor en el puerto 8085
```
php -S localhost:8085 -t public
```

## Preguntas Frecuentes

**¿Por qué cuando visito un *end-point*, por ejemplo `/users` veo un código JSON de "Unauthorized"?**

Recuerda que todos los *end-points* de nuestro RESTful API sólo pueden ser llamados utilizando
el *header* **Content-Type** como **application/json** (es decir, con llamados AJAX
debería funcionar correctamente).


**Cuando intento arrancar el servidor en el puerto 8085 me dice que el puerto ya está ocupado ¿cómo lo soluciono?**
Simplemente cambia el puerto de conexión, por ejemplo si queremos arrancar el servidor en el puerto 8089:
```
php -S localhost:8089 -t public
```


## Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/lumen-framework/v/unstable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

### Official Documentation

Documentation for the framework can be found on the [Lumen website](http://lumen.laravel.com/docs).

### Security Vulnerabilities

If you discover a security vulnerability within Lumen, please send an e-mail to Taylor Otwell at taylor@laravel.com. All security vulnerabilities will be promptly addressed.

### License

The Lumen framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
