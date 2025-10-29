// CONFIGURACIÓN DEL MÓDULO
const MODULE_CONFIG = {
  tableId: "#BankTable", // ID de la tabla HTML
  entityName: "banco", // Nombre de la entidad (en minúsculas, singular)
  entityNamePlural: "bancos", // Nombre de la entidad (en minúsculas, plural)
  columns: [
    // Columnas de la DataTable
    { data: "id_banco", className: "tabla" },
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
    primaryKey: "id_banco", // Clave primaria
    formFields: ["nombre"], // Campos del formulario (sin la PK)
  },
  modalIds: {
    // IDs de los modales
    view: "#verbancoModal",
    add: "#agregarbancoModal",
    edit: "#editarbancoModal",
  },
  formIds: {
    // IDs de los formularios
    add: "#formAgregarbanco",
    edit: "#formEditarbanco",
  },
  fieldSelectors: {
    // Selectores de campos específicos
    viewId: "#verbancoId",
    viewField: "#verNombrebanco",
    editId: "#editarbancoId",
    editField: "#editarNombrebanco",
    addField: "#nombrebanco",
  },
};
