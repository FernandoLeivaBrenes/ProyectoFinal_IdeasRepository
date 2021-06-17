# Tabla de Contenidos
+ [Descripción](#descripcion)
+ [Instrucciones de despliegue](#instrucciones)
  - [Usando Docker](#usandodocker)
    - [Ubuntu](#ubuntu)
    - [Windows](#windows)
+ [Si **NO** haces uso de docker](#nodocker)
+ [Base de datos y migraciones](#mysql)
+ [Galería de errores](#errores)

<a name="descripcion"></a>
# Ideas Repository 
###### Proyecto de final de módulo de [Fernando Leiva Brenes](https://github.com/FernandoLeivaBrenes "Mi github")

El proyecto está alojado en un VPS (Servidor virtual privado) de [OVH](https://laravel.com/ "OVHcloud") y este está virtualizando una máquina [Ubuntu 20.04](https://ubuntu.com/ "Download Ubuntu").

> [vps-ff5ddb79.vps.ovh.net](http://vps-ff5ddb79.vps.ovh.net/ "Ideas Repository")

Proyecto desarrollado sobre contenedores [Docker :whale:](https://www.docker.com/ "Docker") y se ha usado [Laravel](https://laravel.com/ "Laravel") versión 8 como framework de trabajo. Para que pueda desplegarse en diferentes sistemas, se añaden una serie de instrucciones de uso.

<a name="instrucciones"></a>
## Instrucciones de despliegue

Podemos alojar el proyecto de varias formas, contando con los contenedores de Docker o no. Pero ambos sistemas requerirán que descarguemos este proyecto.
Para ello ejecutaremos el siguiente comando en el directorio donde queremos almacenar nuestro proyecto.

```shell
$ git clone https://github.com/FernandoLeivaBrenes/ProyectoFinal.git
```

<a name="usandodocker"></a>
### Usando Docker (ejecución inicial)

1. Descargar e instalar Docker como se explica en su documentación según que sistema operativo vayas a usar.

<a name="ubuntu"></a>
#### Ubuntu
2. Ejecutamos el servidor con el siguiente comando estando en la ruta ProyectoFinal/
###### Si quieres dejar ejecutando en **primer** plano.
```shell
$ docker-compose up
```
###### Si quieres ejecutarlo en **segundo** plano.
```shell
$ docker-compose up -d
```
<a name="windows"></a>
#### Windows
> ##### Como estamos manipulando directorios de Linux desde Windows, habrá que tener instalado el controlador indicado en la documentación de Docker y deberemos hacer unos cuantos cambios más para que el proyecto funcione como se espera.

2. Tras instalar Docker debemos cambiar un poco el Dockerfile contenido .docker/,ya que el archivo ./IdeasRepository/initial_install/install.sh no podrá ejecutarse por defecto en este sistema operativo. La línea que debe ser comentada se indica en el propio archivo **[Dockerfile](.docker/Dockerfile)**

3. Ejecutamos el servidor con el siguiente comando estando en la ruta ProyectoFinal/
###### Si quieres dejar ejecutando en **primer** plano.
```shell
$ docker-compose up
```
###### Si quieres ejecutarlo en **segundo** plano.
```shell
$ docker-compose up -d
```
* Tendremos que ejecutar una terminal dentro del docker para lanzar los comandos del archivo install.sh.
> Debe estar ejecutándose los servicios del docker.
```shell
$ docker exec -it ideasrepository-app bash
```

###### (Esta terminal se abre con permisos de administrador lo que podría general problemas en un futuro.)

4. Ejecutar los comandos del archivo [install.sh](./IdeasRepository/initial_install/install.sh) uno a uno.

Hay que tener en cuenta que al terminar la instalación hasta este punto algunos de los comandos se han ejecutado en modo root.
Para evitar errores o comportamientos no esperados puede cambiarle los permisos al proyecto con este comando:

```shell
$ chown -R _usuario_:_grupo_ ./IdeasRepository
```

<a name="nodocker"></a>
### **No** Usando Docker

Si bien, **no tienes instalado** ningún sistema de virtualización o quieres usar otro servicio diferente.

Una vez descargado el proyecto solo debes mover el directorio _IdeasRepository/_ al directorio del sistema que estés usando.
_( En el caso de WAMP u otro servicio similar sería **htdocs** )_
Pero las instrucciones de despliegue de la aplicación serían muy parecidos.

1. Instalar PHP 7.4 y Composer.
2. Actualizar Composer al lanzar el proyecto.
3. Crear una copia del archivo **IdeasRepository/.env.example** y llamarla _.env_. (En este nuevo archivo deberá contener las credenciales de uso y de la base de datos.)
    1. Para definir las credenciales de uso deberá ejecutar.
      ```shell
      $ php artisan key:generate
      ```
4. Cambiar permisos de los directorios.
  ```shell
  $ chmod -R o+w ./storage/framework/sessions/ ./storage/framework/testing/ ./storage/framework/views/ ./storage/framework/cache/ ./storage/logs/
  ```
5. Realizar modificaciones del servidor adecuadas al .vhost de Docker.

<a name="mysql"></a>
### Base de datos y migraciones

Una vez inicias el servidor, ya sea docker o propio, debes ejecutar las migraciones incluidas en Laravel.

> Si estás ejecutando un servicio con docker debes realizar estos cambios en la terminal del proyecto.
> ```shell
> $ docker exec -it ideasrepository-app bash
> ```

```shell
# Este comando ejecutará las migraciones del proyecto.
$ php artisan migrate
```

<a name="errores"></a>
## Errores comunes
Se adjunta una [galería de imágenes](./README_imgs) que indican errores más comunes.
Los títulos de estas imágenes son autoresolutivos.
