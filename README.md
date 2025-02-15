# 📌 Gestión de Artículos  

![Imagen del inicio de artículos.](/public/images/articles-index.png)
![Imagen del inicio de tags.](/public/images/tags-index.png)
![Imagen del inicio de tags.](/public/images/contacto.png)

## 📖 Descripción  

Este proyecto permite a los usuarios gestionar sus propios artículos, los cuales están organizados por categorías. Solo los administradores pueden acceder a la gestión de categorías.

## 🛠 Tecnologías utilizadas  

- **Laravel Jetstream + Mailer** – Autenticación y gestión de usuarios.  
- **Plantillas Blade** – Motor de plantillas de Laravel.  
- **Tailwind CSS** – Estilos y diseño responsivo.
- **Mailtrap** - Para auntenticar el inicio de sesión y enviar un email de contacto

## 🗂 Estructura de la Base de Datos  

### 📌 Tabla: `articles`  
| ID | TAG_ID | Title | Content |  
|----|--------|-------|---------|  

### 📌 Tabla: `tags`  
| ID | Name | Description |  
|----|------|------------|  

## 🚀 Instalación y configuración  

### 1️⃣ Clonar el repositorio  
```bash
git clone https://github.com/MSBYSergio/CRUD-gestion-articulos.git
cd GestionArticulos
```

### 2️⃣ Instalar dependencias  
```bash
composer install
npm install
```

### 3️⃣ Configurar variables de entorno  
```bash
cp .env.example .env
php artisan key:generate
```

### 4️⃣ Ejecutar migraciones y seeders  
```bash
php artisan migrate:fresh --seed
```

### 5️⃣ Levantar el servidor  
```bash
php artisan serve
```
> Ya puede acceder a [localmente](https://localhost:8000/).