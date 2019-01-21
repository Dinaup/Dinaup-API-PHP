
## Antes de empezar

Puede encontrar el repositorio de Dinaup PHP API en:
	https://github.com/Dinaup/Dinaup-PHP-API

Debe instalar en Dinaup el módulo Servicio REST JSON:
	https://www.dinaup.com/modulo/351/servicio-rest-json 

Para poder utilizar las funciones de ejemplo, debe instalar el siguiente módulo, que contiene las definiciones APIs necesarias:
  https://www.dinaup.com/modulo/386/seccion-test-para-api-rest-json



## Lo que debemos configurar en Dinaup Terminal

En Dinaup Terminal, dentro de la sección *Áreas de acceso web* encontrará un registro que se ha creado automáticamente llamado *Área REST JSON*, el cual debe configurar.

- ​**API Key** 

  La Clave API es utilizada para autorizar las solicitudes API, debe pulsar sobre el botón ‘Generar’ para crear una Clave única.

  No comporta esta clave, no la utilice en entornos donde pueda ser vista por terceros, esta clave es secreta y únicamente debe usarse en la Aplicación Servidor, si cree que esta clave ha podido ser expuesta, por favor, genere una clave nueva.

- **Firewall, Lista blanca de direcciones IP**

  Se recomienda activar la lista blanca de direcciones IP y agregar las direcciones IP que puedan tener acceso al servicio.

- **Ubicación y Usuario**

  Todas las solicitudes que realice mediante el servicio de API deben ir relacionadas con una ubicación y un usuario, estos datos se deben indicar en el Área de REST JSON.

  Ámbitos en los que afecta el usuario:
  - Permisos. 

    Se recomienda seleccionar un usuario con ‘Todos los permisos’ en el Área REST JSON.

  - Histórico de acciones. 

    Opcionalmente se puede indicar un empleado o cliente en cada petición, que será utilizado para el histórico de acciones.

  Ámbitos en los que afecta la ubicación:

  - Acceso a datos que varían según la ubicación (Ej: Stock)

  



## Lo que debemos configurar en esta Web

En el archivo `aplicacion/configuracion.php` debe rellenar las siguientes variables.

- **DinaupURLAPI** 

  Dirección donde se encuentra el servidor de Dinaup
  Ejemplo: http://localhost:4444/
  Ejemplo (SSL): https://localhost:55555/

- **DinaupAPIKey**

  API Key que haya generado en el registro *Área REST JSON*.

- **FechaYHora_ZonaHoraria**

  Zona horaria local para la aplicación.

  [^Zona horaria]: Todos los valores con formato Fecha y hora (datetime) Dinaup los administra en formato UTC.

  

## Como agregar nueva funcionalidad

Esta área de ejemplo es dinámica, lo cual le permitirá agregar funcionalidades nuevas con poco esfuerzo.

En Dinaup Terminal, buscamos la sección ‘Funciones JSON’, en esta sección crearemos las funciones a las que posteriormente podrá llamar esta plataforma.

Para utilizar la plataforma de ejemplo, debe crear 2 funciones por cada sección que desea administrar.

- **Función de tipo Lista** 

  Esta función permitirá crear el listado principal de los datos.

- **Función de tipo Detalles**

  Esta función permite *acceder los datos*, *modificar*,*editar*.

##### Paso 1, Función Listar.

Crear la función de "Listar".

1. En Dinaup Terminal, busque la sección "*Funciones JSON*" , agregue una función y pulsamos el botón de Configurar.
2. Seleccione tipo “Lista”.
3. En el campo “Sección” indique la sección sobre la cual trabajará esta función.
4. En la parte inferior podrá ver un selector y un botón de agregar, utilice esta herramienta para agregarla información que desea exponer en el JSON.
5. Opcionalmente, puede utilizar la opción de filtrado para filtrar el contenido que expondrá este JSON, por ejemplo, para recibir únicamente los productos con Stock, las ventas de un cliente…
6. Acepte la configuración y guarde el registro.

##### Paso 2, Función detalles.

Crear función "Detalles", para ver/editar/agregar.

1.	Agregue una Función JSON y pulsamos el botón de Configurar.
2.	Seleccione tipo “Detalles”.
3.	En el campo “Sección” indique la sección sobre la cual trabajará esta función.
4.	En la parte inferior podrá ver un selector y un botón de agregar, utilice esta herramienta para agregarla información que desea exponer/editar/agregar en el JSON.
5.	Opcionalmente, puede utilizar la opción de filtrado para filtrar el contenido que expondrá este JSON. 
6.	Acepte la configuración y guarde el registro.

##### Paso 3, Implementar funcionalidad.

Implementar funcionalidad en la plataforma.

1. Abra la función tipo detalles que ha creado anteriormente y pulsamos sobre el botón de "Generar página".

2. Se abrirá una ventana con los campos rellenado, revise los datos y confirme pulsando el botón ‘Aceptar’.

   [^*]: La KeyWord (KEYWORD_FUNCIONALIDAD) se utiliza para el nombre de archivos y para URL.

3. Se abrirá una ventana, en la que debe seleccionar donde desea guardar el documento que gestionará las llamadas API,  seleccione la ruta del Proyecto de ejemplo `/aplicación/paginas/`. 

   [^*]: Si no está accesible la ruta `/aplicación/paginas/`, puede seleccionar cualquier otro directorio y copiar los archivos manualmente.

Archivos generados:
o	`/aplicacion/paginas/{KEYWORD_FUNCIONALIDAD}.php`
o	`/aplicacion/iconos/{KEYWORD_FUNCIONALIDAD}.png`

##### Paso 4, hacer accesible la funcionalidad.

Agregar al menú de la Web.

​	Si ha realizado los pasos anteriores, la nueva funcionalidad ya está correctamente implementada en la plataforma, únicamente falta hacer accesible la opción, para ello vaya a `aplicacion/configuracion.php` y en la función `Paginas()` agregue la siguiente línea.

```php
$R[] = new ContenidoC(INDIQUE_AQUI_EL_TITULO, INDIQUE_AQUI_LA_KEYWORD, INDIQUE_AQUI_SI_SE_PUEDE_AGREGAR);
```



## Como eliminar contenido de ejemplo

-	Si utiliza la opción automática de Menú/DashBorad elimine en `aplicacion/configuracion.php` la línea que agregar `ContenidoC ` en la función `Paginas()`.
-	Elimine `/aplicacion/paginas/{KEYWORD_FUNCIONALIDAD}.php`
-	Elimine `/aplicacion/iconos/{KEYWORD_FUNCIONALIDAD}.png`

