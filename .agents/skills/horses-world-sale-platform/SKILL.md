---
name: horses-world-sale-platform
description: >-
  Especialización en la arquitectura de HorsesWorldSale: gestión multidominio (portal público vs app ganadera),
  roles de usuario (Admin, Ganadero, Asociado), catálogo de caballos, y publicación de anuncios.
---

# HorsesWorldSale Platform Architecture Skill

## 1. Topología de Dominios
- **Dominio Principal (`horsesworldsale.com`):**
  - **Propósito:** Portal público de venta, catálogo de caballos y sementales.
  - **Controlador:** `App\Http\Controllers\PortalController@index`
  - **Vista:** `resources/views/portal/landing.blade.php`
- **Subdominio de la App (`app.horsesworldsale.com`):**
  - **Propósito:** Presentación de la plataforma de gestión de ganaderías, registro y acceso.
  - **Controlador:** `App\Http\Controllers\HomeController@indexlanding`
  - **Vista:** `resources/views/fake/index.blade.php`

---

## 2. Matriz de Roles y Redirecciones
- **Administrador Global (`User::type === 0`):**
  - **Acceso:** `https://horsesworldsale.com/login`
  - **Destino Post-Login:** `/admin/LogAs`
  - **Controlador:** `AdministradorController`
- **Asociado (`User::type === 2`):**
  - **Destino Post-Login:** `/associated/LogAs`
  - **Controlador:** `AsociadosController`
- **Ganadero / Usuario Regular (`User::type === 1` o estándar):**
  - **Destino Post-Login:** `/panel/Caballos`
  - **Controlador:** `HorseController@index`
  - **Publicar Caballo:** `/panel/Caballos/Nuevo` (`HorseController@create2`)

---

## 3. Blindaje de Rutas Comodín
- Las rutas de ganaderías individuales `/{slug}` deben protegerse con expresión regular para evitar colisiones:
  ```php
  Route::get('/{slug}', 'StudController@ClientDetail')
      ->where('slug', '^(?!admin|panel|associated|login|register|logout|api|debug).*$');
  ```
