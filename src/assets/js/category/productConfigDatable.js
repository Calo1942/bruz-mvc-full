const MODULE_CONFIG = {
  tableId: "#ProductoTable", // ID de la tabla HTML
  entityName: "producto", // Nombre de la entidad (singular)
  entityNamePlural: "productos", // Nombre de la entidad (plural)
    columns: [
    // Columnas de la DataTable
    { data: "id_producto", className: "tabla" },
    { data: "nombre", className: "tabla" },
    { data: "descripcion", className: "tabla" },
    { data: "stock", className: "tabla text-end" },
    { data: "precio_detal", className: "tabla text-end" },
    { data: "precio_mayor", className: "tabla text-end" },
    { data: "id_categoria", className: "tabla" },
    {
    data: null,
        className: "acciones",
        render: function (data, type, row) {
        return `
            <button type="button" class="btn btn-sm btn-primary me-1 btn-ver" title="Ver ${MODULE_CONFIG.entityName}">
            <i class="bi bi-eye"></i>
            </button>
            <button type="button" class="btn btn-sm btn-secondary me-1 btn-editar" title="Editar ${MODULE_CONFIG.entityName}">
            <i class="bi bi-pencil-square"></i>
            </button>
            <button type="button" class="btn btn-sm btn-danger btn-eliminar" title="Eliminar ${MODULE_CONFIG.entityName}">
            <i class="bi bi-trash"></i>
            </button>
        `;
        },
    },
    ],
    fields: {
    // Campos del formulario
    primaryKey: "id_producto", // Clave primaria
    formFields: [
        "nombre",
        "descripcion",
        "stock",
        "precio_detal",
        "precio_mayor",
        "id_categoria"
    ],
    },
    modalIds: {
    // IDs de los modales
    view: "#verProductoModal",
    add: "#agregarProductoModal",
    edit: "#editarProductoModal",
    },
    formIds: {
    // IDs de los formularios
    add: "#formAgregarProducto",
    edit: "#formEditarProducto",
    },
    fieldSelectors: {
    // Selectores de campos específicos
    viewId: "#verProductoId",
    viewField: {
        nombre: "#verProductoNombre",
        descripcion: "#verProductoDescripcion",
        stock: "#verProductoStock",
        precio_detal: "#verProductoPrecioDetal",
        precio_mayor: "#verProductoPrecioMayor",
        id_categoria: "#verProductoIdCategoria",
    },
    editId: "#editarProductoId",
    editField: {
      nombre: "#editarProductoNombre",
      descripcion: "#editarProductoDescripcion",
      stock: "#editarProductoStock",
      precio_detal: "#editarProductoPrecioDetal",
      precio_mayor: "#editarProductoPrecioMayor",
      id_categoria: "#editarProductoIdCategoria",
    },
    addField: {
      nombre: "#productoNombre",
      descripcion: "#productoDescripcion",
      stock: "#productoStock",
      precio_detal: "#productoPrecioDetal",
      precio_mayor: "#productoPrecioMayor",
      id_categoria: "#productoIdCategoria",
    },
  },
};
