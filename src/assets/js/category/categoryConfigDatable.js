// CONFIGURACIÓN DEL MÓDULO
const MODULE_CONFIG = {
  tableId: "#categoryTable", // ID de la tabla HTML
  entityName: "categoría", // Nombre de la entidad (en minúsculas, singular)
  entityNamePlural: "categorías", // Nombre de la entidad (en minúsculas, plural)
  columns: [
    // Columnas de la DataTable
    { data: "id_categoria", className: "tabla" },
    { data: "nombre", className: "tabla" },
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
    primaryKey: "id_categoria", // Clave primaria
    formFields: ["nombre"], // Campos del formulario (sin la PK)
  },
  modalIds: {
    // IDs de los modales
    view: "#verCategoriaModal",
    add: "#agregarCategoriaModal",
    edit: "#editarCategoriaModal",
  },
  formIds: {
    // IDs de los formularios
    add: "#formAgregarCategoria",
    edit: "#formEditarCategoria",
  },
  fieldSelectors: {
    // Selectores de campos específicos
    viewId: "#verCategoriaId",
    viewField: "#verNombreCategoria",
    editId: "#editarCategoriaId",
    editField: "#editarNombreCategoria",
    addField: "#nombreCategoria",
  },
};
