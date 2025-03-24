<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Sistema de Gestión de Noticias

## Descripción

Sistema de gestión de noticias desarrollado con Laravel y Livewire que permite crear y visualizar noticias con información detallada sobre sus autores. La aplicación consume APIs externas para generar datos aleatorios tanto para autores como para las noticias.

## Proyecto Desplegado

Puedes ver la versión en vivo de este proyecto en: [https://news.jjsn.es](https://news.jjsn.es)

## Modelos

### Modelo Author

El modelo `Author` gestiona la información de los creadores de noticias con los siguientes campos:

- `id`: Identificador único del autor
- `gender`: Género del autor (male/female)
- `name`: Nombre completo del autor
- `location`: Ubicación geográfica del autor
- `email`: Correo electrónico del autor
- `cell`: Número de teléfono del autor
- `picture`: URL de la imagen de perfil del autor
- `nat`: Nacionalidad del autor

Relaciones:
- Tiene muchas noticias (`hasMany` con el modelo `News`)

### Modelo News

El modelo `News` gestiona la información de las noticias con los siguientes campos:

- `id`: Identificador único de la noticia
- `name`: Nombre de la fuente de la noticia
- `author_id`: ID del autor relacionado (clave foránea)
- `title`: Título de la noticia
- `description`: Breve descripción del contenido
- `url`: Enlace a la noticia original
- `urlToImage`: URL de la imagen destacada
- `publishedAt`: Fecha y hora de publicación
- `content`: Contenido completo de la noticia

Relaciones:
- Pertenece a un autor (`belongsTo` con el modelo `Author`)

## Funcionamiento del Sistema

### Creación de Noticias

El componente `NewsCreateComponent` permite:

1. **Generar datos de autor aleatorios**: Consume la API de [RandomUser](https://randomuser.me/) para obtener información de autores ficticios.

2. **Generar noticias aleatorias**: Consume la API de [NewsAPI](https://newsapi.org/) para obtener noticias reales aleatorias sobre diversos temas.

3. **Validación de datos**: Todos los campos son validados antes de guardar, asegurando la integridad de la información.

4. **Almacenamiento en base de datos**: Al guardar, primero se crea el autor y luego la noticia relacionada.

### Visualización de Noticias

El componente `NewsComponent` permite:

1. **Noticias destacadas**: Muestra las 3 noticias más recientes en la parte superior.

2. **Listado de noticias**: Muestra todas las noticias con paginación de 10 elementos por página.

3. **Navegación entre páginas**: Sistema de paginación personalizado que permite navegar entre todas las noticias disponibles.

## Tecnologías Utilizadas

- **Laravel**: Framework PHP para el backend
- **Livewire**: Para la interactividad sin necesidad de escribir JavaScript
- **APIs externas**: RandomUser y NewsAPI
- **Bootstrap**: Para el diseño adaptativo

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
