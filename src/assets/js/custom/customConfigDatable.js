const MODULE_CONFIG = {
  tableId: "#PersonalizacionTable", // ID de la tabla HTML
  entityName: "personalización", // Nombre de la entidad (singular)
  entityNamePlural: "personalizaciones", // Nombre de la entidad (plural)
  columns: [
    { data: "id_personalizacion", className: "tabla" },
    { data: "descripcion", className: "tabla" },
    { data: "id_categoria", className: "tabla" },
    { data: "imagen", className: "tabla" },
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
    primaryKey: "id_personalizacion",
    formFields: ["descripcion", "id_categoria", "imagen"],
  },
  modalIds: {
    view: "#verPersonalizacionModal",
    add: "#agregarPersonalizacionModal",
    edit: "#editarPersonalizacionModal",
  },
  formIds: {
    add: "#formAgregarPersonalizacion",
    edit: "#formEditarPersonalizacion",
  },
  fieldSelectors: {
    viewId: "#verPersonalizacionId",
    viewFields: {
      descripcion: "#verPersonalizacionDescripcion",
      id_categoria: "#verPersonalizacionIdCategoria",
      imagen: "#verPersonalizacionImagen",
    },
    editId: "#editarPersonalizacionId",
    editFields: {
      descripcion: "#editarPersonalizacionDescripcion",
      id_categoria: "#editarPersonalizacionIdCategoria",
      imagen: "#editarPersonalizacionImagen",
    },
    addFields: {
      descripcion: "#personalizacionDescripcion",
      id_categoria: "#personalizacionIdCategoria",
      imagen: "#personalizacionImagen",
    },
  },
};
