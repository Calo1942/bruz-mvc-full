// CONFIGURACIÓN DEL MÓDULO
const MODULE_CONFIG = {
  tableId: "#SizeTable", // ID de la tabla HTML
  entityName: "size", // Nombre de la entidad (en minúsculas, singular)
  entityNamePlural: "sizes", // Nombre de la entidad (en minúsculas, plural)
  columns: [
    // Columnas de la DataTable
    { data: "id_size", className: "tabla" },
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
    primaryKey: "id_size", // Clave primaria
    formFields: ["nombre"], // Campos del formulario (sin la PK)
  },
  modalIds: {
    // IDs de los modales
    view: "#versizeModal",
    add: "#agregarsizeModal",
    edit: "#editarsizeModal",
  },
  formIds: {
    // IDs de los formularios
    add: "#formAgregarsize",
    edit: "#formEditarsize",
  },
  fieldSelectors: {
    // Selectores de campos específicos
    viewId: "#versizeId",
    viewField: "#verNombresize",
    editId: "#editarsizeId",
    editField: "#editarNombresize",
    addField: "#nombresize",
  },
};
