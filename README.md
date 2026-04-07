# Instalación del Proyecto Laravel

> Guía paso a paso para instalar y ejecutar el proyecto en tu ordenador local.

---

## Requisitos Previos

Antes de empezar, asegúrate de tener instalado lo siguiente:

| Herramienta | Versión mínima | 
|-------------|---------------|
| PHP | >= 8.2 |
| Composer | última |
| Node.js + npm | >= 18 |
| Git | última |
| Herd | última |

---

## Paso 1 — Clonar el repositorio

Abre una terminal en la carpeta donde quieras instalar el proyecto y ejecuta:

```bash
git clone https://github.com/danielgc81/ProyectoLaravelPracticas.git
cd ProyectoLaravelPracticas
```

---

## Paso 2 — Instalar dependencias de PHP

Este comando descarga todas las librerías PHP que necesita el proyecto (definidas en `composer.json`):

```bash
composer install
```

---

## Paso 3 — Instalar dependencias de JavaScript

Este comando descarga los paquetes de Node y luego compila los assets (CSS, JS):

```bash
npm install
npm run build
```

---

## Paso 4 — Configurar el archivo de entorno (.env)

El archivo `.env` contiene la configuración privada del proyecto (base de datos, claves, etc.).

**4.1** Copia el archivo de ejemplo:

```bash
cp .env.example .env
```

**4.2** Genera la clave de la aplicación (obligatorio):

```bash
php artisan key:generate
```

**4.3** Abre el archivo `.env` con cualquier editor de texto y busca la sección de base de datos. Modifica estas líneas:

```env
DB_CONNECTION=mysql
DB_HOST=host #127.0.0.1
DB_PORT=3306
DB_DATABASE=database_name
DB_USERNAME=database_user
DB_PASSWORD=database_password
```

---

## Paso 5 — Crear la base de datos y ejecutar migraciones

**5.1** Crea la base de datos manualmente en tu gestor (phpMyAdmin, TablePlus, DBeaver, etc.) con el **mismo nombre** que escribiste en `DB_DATABASE` del `.env`.

**5.2** Ejecuta las migraciones para crear todas las tablas:

```bash
php artisan migrate
```

**5.3** Ejecuta los datos de pruebas para los libros, géneros, usuarios y valoraciones

```bash
php artisan migrate --seed
```

---

## Paso 6 — Crear el enlace de almacenamiento

Este paso es necesario para que las imágenes y archivos subidos sean accesibles desde el navegador:

```bash
php artisan storage:link
```

---

## Paso 7 — Iniciar el servidor con Laravel Herd

Abre Laravel Herd y vete a Sites->Add Site->Link existing project y seleccionas el proyecto laravel y ya tendría que funcionar, pon en tu navegador esta URL:

```txt
   proyectolaravelpracticas.test
```

---

## Rutas de la Aplicación

| Ruta | Acceso | Descripción |
|------|--------|-------------|
| `/welcome` | Invitado | Página de bienvenida donde puedes viajar a `/login` o `/register` o hacia `/libros` |
| `/login` | Invitado | Formulario de inicio de sesión |
| `/register` | Invitado | Formulario de registro de usuario |
| `/libros` | Autenticado o Invitado | Lista todos los libros |
| `/libros/{id}` | Autenticado o Invitado | Detalle de un libro concreto: Se accede a través del boton "Ver Libro" |
| `/valoraciones/create?libro_id={id}` | Autenticado | Formulario para valorar un libro: Se accede a traves del boton "Dejar Mi Opinion" en `libros/{id}` |
| `/user/{id}` | Autenticado | Página donde el usuario puede ver sus datos y cambiar tanto su nombre, email y contraseña |
| `/admin/libros` | Autenticado | Página donde el usuario puede administrar los libros y acceder a los formularios para editar o añadir libros |
| `/admin/libros/{id}/edit` | Autenticado | Página donde el usuario puede editar un libro con los datos de este precargados |
| `/admin/libros/create` | Autenticado | Página donde el usuario puede crear un nuevo libro |

