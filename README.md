# Documentación de desarrollo

## Guia para uso de Git

### 🔤 Tipos de Prefijos

| Prefijo    | Descripción                                                                 |
|------------|------------------------------------------------------------------------------|
| `feat`     | Agrega una nueva característica o funcionalidad al proyecto.                |
| `fix`      | Corrige un error o bug existente.                                           |
| `docs`     | Cambios relacionados con la documentación (README, comentarios, etc.).      |
| `style`    | Cambios de formato o estilo que no afectan la lógica (indentación, espacios).|
| `refactor` | Reestructuración del código sin modificar su comportamiento.                |
| `test`     | Agrega o modifica pruebas automatizadas.                                    |
| `chore`    | Tareas de mantenimiento que no afectan el código de producción.             |
| `build`    | Cambios en el sistema de compilación o dependencias.                        |

### 📝 Ejemplos de Mensajes de Commit

- `feat: agregar componente de búsqueda`
- `fix: corregir error en validación de formulario`
- `style: aplicar formato con Prettier`
- `refactor: simplificar lógica de autenticación`
- `docs: actualizar guía de instalación`
- `test: agregar pruebas para el componente de login`
- `chore: actualizar dependencias del proyecto`
- `build: configurar Webpack para producción`

### 📌 Recomendaciones

- Usar el **modo imperativo** en el resumen (ej. "agregar", no "agregado").
- Mantener el resumen **conciso y claro** (máximo 50 caracteres).
- Si el cambio requiere explicación adicional, agregarla en el cuerpo del mensaje.
- Evitar commits genéricos como "cambios varios" o "actualización".
