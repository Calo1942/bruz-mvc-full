const MODULE_CONFIG = {
  tableId: "#VarianteTable", // ID de la tabla HTML
  entityName: "variante", // Nombre de la entidad (singular)
  entityNamePlural: "variantes", // Nombre de la entidad (plural)
  columns: [
    { data: "id_variante", className: "tabla" },
    { data: "stock", className: "tabla text-end" },
    { data: "id_producto", className: "tabla" },
    { data: "id_talla", className: "tabla" },
    { data: "color", className: "tabla" },
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
    primaryKey: "id_variante",
    formFields: ["stock", "id_producto", "id_talla", "color"],
  },
  modalIds: {
    view: "#verVarianteModal",
    add: "#agregarVarianteModal",
    edit: "#editarVarianteModal",
  },
  formIds: {
    add: "#formAgregarVariante",
    edit: "#formEditarVariante",
  },
  fieldSelectors: {
    viewId: "#verVarianteId",
    viewFields: {
      stock: "#verVarianteStock",
      id_producto: "#verVarianteIdProducto",
      id_talla: "#verVarianteIdTalla",
      color: "#verVarianteColor",
    },
    editId: "#editarVarianteId",
    editFields: {
      stock: "#editarVarianteStock",
      id_producto: "#editarVarianteIdProducto",
      id_talla: "#editarVarianteIdTalla",
      color: "#editarVarianteColor",
    },
    addFields: {
      stock: "#varianteStock",
      id_producto: "#varianteIdProducto",
      id_talla: "#varianteIdTalla",
      color: "#varianteColor",
    },
  },
};
