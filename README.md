# WAYNI MOVIL

Desarrollo de aplicativo de importación de archivos del BCRA para la empresa Wayni Movil

### Comentarios iniciales

Esta aplicación está desarrollada en Laravel 5.5, utilizando como base de datos SQLite

### Pre-requisitos

- PHP 7+
- SQLite
- Text Editor (Visual Studio Code)

### Instalación

Antes de comenzar se deberá contar con el driver de SQLite en su computadora para que la aplicación funcione correctamente
Ubuntu/Debian ejecute el siguiente comando: "sudo apt-get install php7.x-sqlite3" (donde la x es la versión de su PHP)

### Ejecutando pruebas

Una vez configurado correctamente la aplicación, se deberá registrar un usuario para poder ingresar
Dentro se encontrará con una única pantalla donde estará el formulario de carga del archivo a importar y 3 datatables que contendrán la siguiente información:
- Datos de la importación
- Datos consolidados del deudor (según consigna)
- Datos consolidados de la entidad (según consigna)

### Construido con

* [LARAVEL 5.5](https://laravel.com/) - Framework usado
* [LARAVEL DATATABLE](https://github.com/yajra/laravel-datatables) - Usado para generar las tablas de registros

### Comentarios extras

El tiempo de desarrollo del producto fue alrededor de 6hs.
Se considera a la aplicación desarrollada un prototipo, ya que se podría ser mejorada para la salida a producción.
Consideraciones que se podría tener en cuenta:
- Utilizar Postgres como base de datos
- 

### Autor

- **ARiel Fernández** - [LinkedIn](https://www.linkedin.com/in/jarif78/)

### Licencia

This project is licensed under the MIT License - see the [LICENSE.md](LICENSE.md) file for details


