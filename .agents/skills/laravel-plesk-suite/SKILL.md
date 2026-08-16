---
name: laravel-plesk-suite
description: >-
  Guía y herramientas para diagnosticar, configurar, desplegar y solucionar incidencias
  en aplicaciones Laravel 11 alojadas en servidores Plesk Obsidian con PHP 8.4 y Git.
---

# Laravel 11 & Plesk Deployment & Diagnostic Skill

## Propósito
Esta habilidad proporciona flujos de trabajo probados para depurar y mantener proyectos Laravel 11 en servidores con Plesk Obsidian, asegurando compatibilidad con PHP 8.4, despliegues sin tiempo de inactividad vía Git y resolución rápida de errores de enrutamiento y sesión.

---

## Flujo de Despliegue en Plesk
1. **Pull & Deploy:**
   - Hacer Pull en `Plesk > Repositorios Git`.
   - Ejecutar el script de despliegue (`Desplegar ahora`).
2. **Limpieza de Caché de Producción:**
   ```bash
   php artisan optimize:clear
   php artisan config:clear
   php artisan route:clear
   php artisan view:clear
   ```
3. **Migraciones y Base de Datos (si aplica):**
   ```bash
   php artisan migrate --force
   ```

---

## Reglas de Arquitectura Laravel 11
1. **Punto de Entrada (`public/index.php`):**
   - Siempre debe mantener el arranque estándar de Laravel 11:
   ```php
   (require_once __DIR__.'/../bootstrap/app.php')
       ->handleRequest(Request::capture());
   ```
2. **Grupos de Middleware:**
   - `web` es un grupo global automático. No inyectar `Route::middleware('web')` en cadenas `then:` de `bootstrap/app.php` para evitar `Target class [web] does not exist`.
3. **Comandos Artisan de Diagnóstico:**
   - Registrar comandos directos en `routes/console.php` para diagnósticos rápidos de salud de base de datos, sesiones y rutas.
