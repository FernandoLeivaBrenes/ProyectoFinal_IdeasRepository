<h1 align="center" >IdeasRepository</h1>

<a name="tecnologias"></a>
![System](https://img.shields.io/badge/System-Ubuntu%2020.10-brightgreen?style=flat&logo=ubuntu)
![Postman](https://img.shields.io/badge/Postman-8.6.2-blue?style=flat&logo=postman)
![Docker](https://img.shields.io/badge/Docker-3.8-blue?style=flat&logo=docker)
![GIT](https://img.shields.io/badge/Git-2.31.1-orange?style=flat&logo=git)
![PHP](https://img.shields.io/badge/PHP-7.4-blueviolet?style=flat&logo=php)
![MySQL](https://img.shields.io/badge/MySQL-8.0-4479a1?style=flat&logo=mysql)
![Laravel](https://img.shields.io/badge/Laravel-8.0-orange?style=flat&logo=laravel)
![Alpinejs](https://img.shields.io/badge/Alpinejs-2.8.2-77c1d2?style=flat&logo=alpinedotjs)
![TailwindCSS](https://img.shields.io/badge/TailwindCss-2.1.2-06b6d4?style=flat&logo=tailwindcss)
![Jetstream](https://img.shields.io/badge/Jetstream-2.3-brightgreen?style=flat)
![Livewire](https://img.shields.io/badge/Livewire-2.0-brightgreen?style=flat)

###### Proyecto de final de módulo de [Fernando Leiva Brenes](https://github.com/FernandoLeivaBrenes "Mi github")

IdeasRepository esta inspirado en los *Bullet journal*, diarios o libretas de apuntes creativas cuyo principal proposito es almacenar ideas o proyectos para un futuro, servir como agenda o mantener constancia de buenos hábitos. Lo que he querido representar con este proyecto es esa parte de creatividad y, ayudado por la funcionalidad de la redes, ser capaces de crear equipos de trabajo y desarrollo para todo tipo de projectos.

# Tabla de Contenidos
+ [Tecnologias](#tecnologias)
+ [Tecnologias y su uso](#tecnologias_logos)
+ [Instrucciones de despliegue](#instrucciones)
  - [Usando Docker](#usandodocker)
    - [Ubuntu](#ubuntu)
    - [Windows](#windows)
+ [Si **NO** haces uso de docker](#nodocker)
+ [Base de datos y migraciones](#mysql)
+ [Galería de errores](#errores)
+ [Proyecto IdeasRepository documentación](#doc)
  - [Tras el inicio de sesión](#inicioSesion)
  - [Funcionalidades del usuario](#userInit)
    - [Perfil del usuario](#userProfile)
    - [API Tokens](#userAPI)
    - [Gestión de equipos](#userTeams)
  - [Funcionalidades del administrador](#adminInit)
+ [Claves de acceso](#keys)

<a name="tecnologias_logos"></a>
## Tecnologias y su uso

Comienzo esta sección hablado del proveedor de máquinas virtualizadas [OVH](https://laravel.com/ "OVHcloud"). En este caso he contratado un servicio que aloja una máquina [Ubuntu 20.04](https://ubuntu.com/ "Download Ubuntu").

<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/0_ovh_server.PNG" alt="OVH service" width="500px"/>

La aplicación en concreto se encuentra aqui:

> [vps-ff5ddb79.vps.ovh.net](http://vps-ff5ddb79.vps.ovh.net/ "IdeasRepository")
<br>

<div>
  <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/dockerLogo.png" alt="Docker logo" width="200px"/>
</div>

Para que todo el desarrollo se realizase bajo las mismas características he usado [docker :whale:](https://www.docker.com/ "Docker") que, por su naturaleza propia, agiliza la construcción sin que debas preocuparte del sistema en sí mismo. La capacidad de crear y montar contenedores de software es de agradecer cuando planeas no instalar software y evitar así configuraciones engorrosas si necesitases cambiar de equipo o para que en la casuística en la que se trabaje en grupo todos compartan la configuración común.
En mi caso he usado docker porque es más sencillo el alojamiento allá donde este la aplicación. Solo necesitas instalar git y docker, hacer un pull del proyecto y levantar los contenedores de software, pero esto lo explico un poco más adelante.

> Se crean dos contenedores, uno contiene Apache con [PHP 7.4](https://www.php.net/ "PHP 7.4") y otro la base de datos relacional [MySQL](https://www.mysql.com/ "MySQL")

<br/>

<div>
  <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/logoLaravel.png" alt="Laravel logo" style="width:200px;"/>
  <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/laravelName.png" alt="Laravel logo" style="width:200px;"/>
</div>

Laravel es el framework que he elegido para el desarrollo de la aplicación, más concretamente la versión 8.0, y me apollo en los kits de inicio de [Livewire](https://laravel-livewire.com/ "Livewire") y [Jetstream](https://jetstream.laravel.com/2.x/introduction.html). Proveen de funcionalidades como el mantenimiento de usuarios y equipos, recuperación de contraseña via email, imagenes de perfil y autenticación entre otras muchas. Además incluye la libreria [alpinejs](https://alpinejs.dev/alpine-101/ "AlpineJS") que permite trabajar con las funcinalidades de javascript de forma más amigable.


<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/LivewireLogo.png" alt="Livewire logo" style="width:200px;"/>
<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/JetstreamLogo.png" alt="Jetstream Logo" width="300px"/>
<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/alpinejs.png" alt="Alpinejs logo" width="200px"/>

<br/>



Cerramos este apartado indicando que el framework de CSS que he usado es [TailwindCSS](https://tailwindcss.com/ "TailwindCSS"), me resultaba muy cómodo adaptarme a el y venía incluido con la configuración anterior (Laravel, Jetstream y Livewire), y el postprocesador de CSS también es el que se indica por defecto [PostCSS](https://postcss.org/ "Post Css").

<div>
  <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/tech_icons/TailwindCssLogo.png" alt="TailwindCss Logo" style="width:200px;"/>
</div>

<a name="instrucciones"></a>
## Instrucciones de despliegue

Podemos alojar el proyecto de varias formas, contando con los contenedores de Docker o no. Pero ambos sistemas requerirán que descarguemos este proyecto.
Para ello ejecutaremos el siguiente comando en el directorio donde queremos almacenar nuestro proyecto.

```shell
git clone https://github.com/FernandoLeivaBrenes/ProyectoFinal.git
```

<a name="usandodocker"></a>
### Usando Docker (ejecución inicial)

Comprobaremos los permisos en los siguientes archivos y directorios:

> [IdeasRepository/initial_install/intall.sh](https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/IdeasRepository/initial_install/install.sh "install.sh")
> 
> [IdeasRepository/bootstrap/cache](https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/IdeasRepository/bootstrap/cache "cache directory")

1. Descargar e instalar Docker como se explica en su documentación según que sistema operativo vayas a usar.

<a name="ubuntu"></a>
#### Ubuntu
2. Ejecutamos el servidor con el siguiente comando estando en la ruta ProyectoFinal/
###### Si quieres dejar ejecutando en **primer** plano.
```shell
docker-compose up
```
###### Si quieres ejecutarlo en **segundo** plano.
```shell
docker-compose up -d
```
<a name="windows"></a>
#### Windows
> ##### Como estamos manipulando directorios de Linux desde Windows, habrá que tener instalado el controlador indicado en la documentación de Docker y deberemos hacer unos cuantos cambios más para que el proyecto funcione como se espera.

2. Tras instalar Docker debemos cambiar un poco el Dockerfile contenido *.docker/* , ya que el archivo *./IdeasRepository/initial_install/install.sh* no podrá ejecutarse por defecto en este sistema operativo. La línea que debe ser comentada se indica en el propio archivo **[Dockerfile](.docker/Dockerfile)**

3. Ejecutamos el servidor con el siguiente comando estando en la ruta ProyectoFinal/
###### Si quieres dejar ejecutando en **primer** plano.
```shell
docker-compose up
```
###### Si quieres ejecutarlo en **segundo** plano.
```shell
docker-compose up -d
```
* Tendremos que ejecutar una terminal dentro del docker para lanzar los comandos del archivo install.sh.
> Debe estar ejecutándose los contenedores de docker.
###### Para abrir la terminal lanzamos el siguiente comando
```shell
docker exec -it ideasrepository-app bash
```

###### (Esta terminal se abre con permisos de administrador lo que podría general problemas en un futuro.)

4. Ejecutar los comandos del archivo [install.sh](./IdeasRepository/initial_install/install.sh) uno a uno.

Hay que tener en cuenta que al terminar la instalación hasta este punto algunos de los comandos se han ejecutado en modo root.
Para evitar errores o comportamientos no esperados puede cambiarle los permisos al proyecto con este comando:

```shell
chown -R _usuario_:_grupo_ ./IdeasRepository
```
> Tanto *_usuario_* como *_grupo_* deben seguir el formato de linux shellscript.

También podrias instalar el gestor de contenedores de docker para windows, aún tendrías que lanzar los comandos para un primer inicio pero la interfaz gráfica ayuda con la detención y la puesta en marcha además del manejo de volúmenes de docker.

<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/0_docker.PNG" alt="Docker App"/>

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
      php artisan key:generate
      ```
4. Cambiar permisos de los directorios.
  ```shell
  chmod -R o+w ./storage/framework/sessions/ ./storage/framework/testing/ ./storage/framework/views/ ./storage/framework/cache/ ./storage/logs/
  ```
5. Realizar modificaciones del servidor adecuadas al *vhost* .

<a name="mysql"></a>
### Base de datos y migraciones

Una vez inicias el servidor, ya sea docker o propio, debes ejecutar las migraciones incluidas en Laravel.

> Si estás ejecutando un servicio con docker debes realizar estos cambios en la terminal del proyecto.
> ```shell
>  docker exec -it ideasrepository-app bash
> ```

```shell
# Este comando ejecutará las migraciones del proyecto.
php artisan migrate
```

```shell
# Este otro comando ejecutará las migraciones del proyecto y, además, añadirá los datos generados por los sembradores integrados en Laravel.
php artisan migrate:fresh --seed
```

<a name="errores"></a>
## Errores comunes
Se adjunta una [galería de imágenes](./README_imgs) que indican errores más comunes.
Los títulos de estas imágenes son autoresolutivos.

<a name="doc"></a>
## Proyecto IdeasRepository documentación

<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/1_Inicio_tutorial.PNG" alt="Inicio" width="800px"/>

Aquí se presenta la página de inicio en la que podemos encontrar ,además de como se muestra en la imágen, los botones de Inicio de sesión o *Sign In* y Registro de nuevos usuarios y una serie de projectos públicos los cuales el no-usuario solo podría ver. Estos projectos están completamente randomizados para que si visitas la página más de una vez siempre se vea actualizada. También se incluye un enlace a un video musical que era requisito de la aplicación.

<img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/1.0_Inicio_tutorial_Gallery.PNG" alt="Galeria" width="800px"/>

En las siguientes se muestra el servicio de inicio de sesion y el de registro.

<div>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/3_Login.PNG" alt="Inicio" width="400px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/2_Register.PNG" alt="Registro" width="400px"/>
  </span>
</div>

<hr/>

<a name="inicioSesion"></a>
### Tras iniciar sesión

Cuando iniciamos sesión como usuario podremos tener acceso a diferentes características, la característica básica es visualizar los proyectos de los demás usuarios, esta permite ver los proyectos que otras personas estan desarrollando y los públicos. Si nos centramos un poco más en los proyectos, podremos ver que existen 3 tipos que varian según el nivel de acceso al recurso, es decir, quien puede verlos; privado es el más restictivo ya que solo pueden verlos los usuarios pertenecientes al mismo grupo en el que ha sido creado ese proyecto, por otro lado están los protegidos, que únicamente pueden ser visitados por usuarios de la aplicación y, como he comentado antes, los projectos públicos serán visibles desde cualquier parte de la palicación pero hay que tener encuenta que no se podrán leer desde fuera de la misma.

<div>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4_ProjectsShow.PNG" alt="Projectos e inicio" width="800px"/>
  </span>
</div>

El formato de las cartas de proyectos es el siguiente, foto de usuario la cual es pulsable y da acceso al nombre del usuario, nombre del equipo al que pertenece el proyecto y fecha de creación, si no la pulsamos (estado por defecto), podremos ver el estado de accesibilidad del proyecto a la izquierda, el titulo del proyecto, unas cuantas palabras que componen las primeras lineas del proyecto. En la esquina superior derecha podremos ver la diferencia de tiempo entre la fecha actual y la última actualización.
Muestro esto mismo en las siguientes imágenes:

<div>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.0.0_ProjectsDesign.PNG" alt="Default" width="400px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.0.1_ProjectsDesign.PNG" alt="Opened" width="400px"/>
  </span>
</div>

<hr/>

<a name="userInit"></a>
### Funcionalidades del usuario

<div>
  <p>Como usuario tenemos habilitado el uso de perfil, acceso a los API tokens y manejo de equipos, vamos a ver el ejemplo de actividades del perfil.</p>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.1_UserFeatures.PNG" alt="Default" width="350px"/>
  </span>
</div>

<a name="userProfile"></a>
#### Perfil de usuario

Podremos cambiar información, la imagen que tiene nuestra cuenta, cerrar la sesiones de otros equipos y eliminación de nuestra propia cuenta

<div>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.1.0_UserFeatures_Profile.PNG" alt="Default" width="600px"/>
  </span>
  <span>
    <p>Asi se muestra el cambio de imagen del usuario</p>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.1.3_UserFeatures_Profile.PNG" alt="Default" width="600px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.1.1_UserFeatures_Profile.PNG" alt="Default" width="600px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.1.2_UserFeatures_Profile.PNG" alt="Default" width="600px"/>
  </span>
</div>

<a name="userAPI"></a>
#### API Tokens

> Esta funcionalidad permite obtener 6 projectos aleatorios en formato Json.

<div>
  <p>Al clicar sobre API tokens seremos redirigidos hasta la siguinte página desde la que podremos pedir y eliminar los tokens para la API.</p>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.1.0_UserFeatures_APITokens.PNG" alt="Default" width="600px"/>
  </span>
</div>

<div>
  <p>El uso que tiene el API Token lo muestro apoyándome en PostMan. Hacemos uso del Bearer token para la autenticación y en este es donde se debe añadir la clave proporcionada por API Token en la aplicación.</p>
  <p>Prueba sin Bearer Token</p>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/6.0_PostmanAPI.PNG" alt="Default" width="600px"/>
  </span>
  <p>Prueba con Bearer Token</p>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/6.1_PostmanAPI.PNG" alt="Default" width="600px"/>
  </span>
</div>

<a name="userTeams"></a>
#### Gestión de equipos

Como se ha indicado previamente se pueden manejar equipos desde su creación y modificación, hasta la eliminación de usuarios que lo componen o la eliminación de í mismo. Como no se concibe un usuario sin equipos dentro de la aplicación siempre quedará el grupo del propio usuario.

A continuación se muestran las imágenes de estas funcionalidades:
<div>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.2_TeamFeatures.PNG" alt="Default" width="350px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.2.0_TeamFeatures_Create.PNG" alt="Default" width="500px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.2.0_TeamFeatures_Manage.PNG" alt="Default" width="500px"/>
  </span>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/4.2.1_TeamFeatures_Manage.PNG" alt="Default" width="500px"/>
  </span>
</div>

<a name="adminInit"></a>
### Funcionalidades del administrador

Contando con el administrador, que también forma parte de la aplicación como usuario y por lo tanto se beneficia de las funcionalidades de este, tendríamos el tercer grado de cliente (no usuario, usuario y administrador). Todos los usuarios de la aplicación podrían ser administradores de la misma ya que lo que los difiere del usuario medio es el grupo en el que se encuentra. Si el administrador añade a su grupo personal a algún usuario, éste pasa a ser administrador de la misma.

La funcionalidad especial del administrador es la del manejo de usuarios, su creación, visualización, actualización y eliminación (CRUD). En las siguientes imágenes se muestran estas funcionalidaes en detalle. Pero antes quiero que se entienda que la ruta de acceso a esta parte de la aplicación esta solo autorizada para el administrador o administradores, toda esta visualización queda bloqueada por un *Trait* de Laravel.

<span>
  <span>Esta es la vista principal del administrador</span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5_AdminProfile.PNG" alt="Default" width="500px"/>
</span>

Y aquí se muestra la ruta de gestión de usuarios a la que, aparte, se ha añadido un buscador para que el manejo sea mucho más sencillo. El buscador está online todo el tiempo pero puede verse afectado por la calidad de la red a la que estemos conectados.


<div>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5.0_AdminProfile_UsersTab.PNG" alt="Default" width="700px"/>
  </span>
  <p>Ejemplo del buscador, <b>no</b> es necesario pulsar intro para buscar</p>
  <span>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5.1_AdminProfile_UsersTab_LiveSearch.PNG" alt="Default" width="500px"/>
  </span>
  <span>
    <p>Vista del detalle, mostrando también fecha de creación</p>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5.0.0_AdminProfile_UsersTab_Show.PNG" alt="Default" width="500px"/>
  </span>
  <span>
    <p>La funcionalidad de eliminar también se realiza sobre la misma página.</p>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5.0.1_AdminProfile_UsersTab_Delete.PNG" alt="Default" width="500px"/>
  </span>
  <span>
    <p>Creación</p>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5.0.2_AdminProfile_UsersTab_Create.PNG" alt="Default" width="500px"/>
  </span>
  <span>
    <p>Modificación</p>
    <img src="https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/README_imgs/screenshots_guide/5.0.3_AdminProfile_UsersTab_Update.PNG" alt="Default" width="500px"/>
  </span>
</div>

<hr/>

<a name="keys"></a>
## Claves de acceso

Pueden revisarse en el archivo de [sembrado de usuarios](https://github.com/FernandoLeivaBrenes/ProyectoFinal_IdeasRepository/blob/master/IdeasRepository/database/seeders/UserSeeder.php "Aquí").

Aún así son estas:

| TIPO  | EMAIL  | PASSWORD |
|:---:|:---:|:---:|
| USER  |  fernando.leiva.brenes@gmail.com | 12345678  |
| ADMIN |  ideasRepositoryAdministrator@ideasrepository.es | ideasrepository |
