# Gestor de Tareas - Dockerizado 🐳

Aplicación web sencilla para gestionar tareas, creada con PHP puro, patrón MVC y Docker.

## 🚀 Tecnologías

- PHP 8.2
- Apache
- MySQL 5.7
- Docker & Docker Compose
- phpMyAdmin
- Patrón MVC
- Enrutador personalizado
- Variables de entorno con `.env`

## 🏗️ Estructura del Proyecto

mi-gestor-tareas/
- app/
  - controllers/
  - models/
  - views/
  - core/
    - Route.php
- db/
  - init.sql
- index.php
- .htaccess
- .env
- .gitignore
- Dockerfile
- docker-compose.yml
- README.md


## ⚙️ Instalación

```bash
git clone https://github.com/KarenLC23/task-manager-dockerized.git
cd task-manager-dockerized
docker compose up --build


🌐 Accede a:
Aplicación: http://localhost:8090
phpMyAdmin: http://localhost:8091
Usuario: root
Contraseña: tu_contraseña


✅ Funcionalidades
📌 Crear tareas
📋 Listar tareas
✏️ Editar tareas
🗑️ Eliminar tareas

📘 Aprendizajes Aplicados
Creación de entornos multi-contenedor con Docker Compose
Organización de aplicaciones PHP con MVC sin frameworks
Uso de volúmenes, redes y variables de entorno
Automatización del entorno con Docker
Visualización y gestión de base de datos con phpMyAdmin

📚 Autor
Karen Caicedo – DevOps Junior en formación
