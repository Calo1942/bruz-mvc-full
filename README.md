# Documentación de desarrollo

## Guia para uso de Git

### 🔤 Tipos de Prefijos

| Prefijo    | Descripción                                                                   |
| ---------- | ----------------------------------------------------------------------------- |
| `feat`     | Agrega una nueva característica o funcionalidad al proyecto.                  |
| `fix`      | Corrige un error o bug existente.                                             |
| `docs`     | Cambios relacionados con la documentación (README, comentarios, etc.).        |
| `style`    | Cambios de formato o estilo que no afectan la lógica (indentación, espacios). |
| `refactor` | Reestructuración del código sin modificar su comportamiento.                  |
| `test`     | Agrega o modifica pruebas automatizadas.                                      |
| `chore`    | Tareas de mantenimiento que no afectan el código de producción.               |
| `build`    | Cambios en el sistema de compilación o dependencias.                          |

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

# DB:

Aunque MySQL no impone reglas estrictas sobre cómo nombrar columnas y tablas, sí existen **convenciones recomendadas** que ayudan a mantener tu base de datos organizada, legible y fácil de mantener. Aquí te dejo las más importantes:

---

### 📦 Convenciones para nombres de tablas

- **Minúsculas y guiones bajos**: Usa minúsculas y separa palabras con guiones bajos (`_`)  
  Ejemplo: `clientes_activos`, `ordenes_pendientes`

- **Plural vs. singular**:

  - _Plural_ si la tabla representa una colección de entidades: `usuarios`, `productos`
  - _Singular_ si prefieres consistencia con modelos de objetos: `usuario`, `producto`  
    (Ambas son válidas, lo importante es ser consistente)

- **Evita abreviaciones ambiguas**: Mejor `facturas` que `fctrs`

- **Sin espacios ni caracteres especiales**: Nada de `#`, `%`, `-`, ni espacios

- **Prefijos solo si son necesarios**: Por ejemplo, si tienes muchas tablas relacionadas con "ventas", podrías usar `ventas_clientes`, `ventas_facturas`

---

### 📊 Convenciones para nombres de columnas

- **Minúsculas y guiones bajos**: Igual que con las tablas  
  Ejemplo: `fecha_creacion`, `nombre_completo`

- **Evita nombres genéricos**: En lugar de `nombre`, usa `nombre_cliente` o `nombre_producto`

- **Consistencia en claves primarias y foráneas**:

  - Clave primaria: `id` o `nombre_tabla_id`
  - Clave foránea: `cliente_id`, `producto_id`

- **Prefijos útiles para fechas o estados**:
  - `fecha_` para campos de tiempo: `fecha_registro`, `fecha_entrega`
  - `es_` para booleanos: `es_activo`, `es_admin`

# Convenciones de repuestas del Back-End:

Formato petición exitosa

```json
// respuesta exitosa
{
  "status": "success",
  "code": 200,
  "message": "Dato creado exitosamente",
  "data": ""
}
```

Formato error en la petición

```json
// respuesta error
{
  "status": "error",
  "code": 404,
  "message": "Dato no encontrado",
  "data": ""
}
```

Métodos y Validaciones

### Validaciones Específicas por Campo

| Campo         | Validación               | Descripción                        |
| ------------- | ------------------------ | ---------------------------------- |
| IDs           | `validate_id()`          | Números enteros positivos          |
| Cédula        | `validate_cedula()`      | Hasta 10 dígitos                   |
| Nombres       | `validate_names()`       | Letras, espacios, acentos (mín. 2) |
| Textos cortos | `validate_text()`        | 2-15 caracteres alfanuméricos      |
| Textos largos | `validate_text_long()`   | 2-100 caracteres                   |
| Descripciones | `validate_description()` | Texto largo con puntuación         |
| Email         | `validate_email()`       | Formato email válido               |
| Teléfono      | `validate_telefono()`    | 11 dígitos exactos                 |
| Precios       | `validate_precio()`      | Decimal positivo (2 decimales)     |
| Stock         | `validate_stock()`       | Número entero no negativo          |
| Cantidad      | `validate_cantidad()`    | Número entero positivo             |
| Booleanos     | `validate_boolean()`     | true/false/1/0                     |
| Fechas        | `validate_fecha()`       | YYYY-MM-DD                         |
| DateTime      | `validate_datetime()`    | YYYY-MM-DD HH:MM:SS                |

### Esto es el nombre que va a tener cada módulo en inglés y en minúsculas:

```php
$cliente => $client
$categoria => $category
$banco => $bank
$talla => $size
$prod_personalizacion => $custom
$producto => $product
$variante => $variant
$pedido => $order
$comprobante_pago => $paymentReceipt        // La primera letra en minúsculas la segunda palabra en Mayús
$pedido_item => $orderItem      // La primera letra en minúsculas la segunda palabra en Mayús
$orden_fabricacion => $manufacturingOrder       // La primera letra en minúsculas la segunda palabra en Mayús
$orden_fabricacionItem => $manufacturingOrderItem       // La primera letra en minúsculas la segunda palabra en Mayús
$imagen => $image
```
