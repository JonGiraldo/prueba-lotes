## Instalación del proyecto

Base de datos:

en el archivo "base de datos SQL" se encuentra el codigo para la creacion y uso de la base de datos 
que se utilizo en la prueba

Clonar el repositorio:

```bash
git clone https://github.com/JonGiraldo/prueba-lotes.git
```

Entrar al proyecto:

```bash
cd prueba-lotes
```

Instalar dependencias de PHP:

```bash
composer install
```

Instalar dependencias de frontend:

```bash
npm install
```

Crear archivo de entorno:

```bash
cp .env.example .env
```

Generar clave de la aplicación:

```bash
php artisan key:generate
```

Configurar la base de datos en el archivo `.env`.

Ejecutar migraciones:

```bash
php artisan migrate
```

Correr el servidor:

```bash
php artisan serve
```

Compilar los assets de Vue:

```bash
npm run dev
```

Abrir en el navegador:

```
http://127.0.0.1:8000
```

