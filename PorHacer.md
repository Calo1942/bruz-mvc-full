#### Presiona **Ctrl+Mayus+v** para visualizar

- Desarrollar el modulo de Producto
- Corregir todo lo que tenga con la Variante en lugar Inventario
- Implementar vista de Error 404

Modificaciones Un_Carlos:
- implementación del patrón de diseño "Composición sobre Herencia" en DBConnect
- Corrección de Implementacion de la carga de ConfigSystem en el Composer para la carga automática de las constantes del sistema

Correciones del Case Sensitive Un_Carlos:
- Convenciones de Nomenclatura en PHP MVC
Controladores (Controllers) y Modelos (Models)
Los nombres de los archivos para Controladores y Modelos siempre deben ir en PascalCase (también conocido como StudlyCaps), comenzando con mayúscula. Esto se debe a que representan clases, y es una práctica común en la programación orientada a objetos que los nombres de las clases empiecen con mayúscula.

Ejemplos de Controladores: CategoryController.php, ClientController.php.
Ejemplos de Modelos: CategoryModel.php, ClientModel.php.



**NOTA:** Estudiar todos los patrones de diseño implementandos en el código

# DB:

Aunque MySQL no impone reglas estrictas sobre cómo nombrar columnas y tablas, sí existen **convenciones recomendadas** que ayudan a mantener tu base de datos organizada, legible y fácil de mantener. Aquí te dejo las más importantes:

---

### 📦 Convenciones para nombres de tablas

- **Minúsculas y guiones bajos**: Usa minúsculas y separa palabras con guiones bajos (`_`)  
  Ejemplo: `clientes_activos`, `ordenes_pendientes`

- **Plural vs. singular**:  
  - *Plural* si la tabla representa una colección de entidades: `usuarios`, `productos`  
  - *Singular* si prefieres consistencia con modelos de objetos: `usuario`, `producto`  
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
