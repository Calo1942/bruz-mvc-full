const MODULE_CONFIG = {
  tableId: "#ClientTable", // ID de la tabla HTML
  entityName: "cliente", // Nombre de la entidad (singular)
  entityNamePlural: "clientes", // Nombre de la entidad (plural)
  columns: [
    // Columnas de la DataTable
    { data: "cedula", className: "tabla" },
    { data: "nombre", className: "tabla" },
    { data: "apellido", className: "tabla" },
    { data: "correo", className: "tabla" },
    { data: "telefono", className: "tabla" },
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
    primaryKey: "cedula", // Clave primaria
    formFields: ["nombre", "apellido", "correo", "telefono"], // Campos del formulario (sin la PK)
  },
  modalIds: {
    // IDs de los modales
    view: "#verClienteModal",
    add: "#agregarClienteModal",
    edit: "#editarClienteModal",
  },
  formIds: {
    // IDs de los formularios
    add: "#formAgregarCliente",
    edit: "#formEditarCliente",
  },
  fieldSelectors: {
    // Selectores de campos específicos
    viewId: "#verClienteCedula",
    viewFields: {
      nombre: "#verClienteNombre",
      apellido: "#verClienteApellido",
      correo: "#verClienteCorreo",
      telefono: "#verClienteTelefono",
    },
    editId: "#editarClienteCedula",
    editFields: {
      nombre: "#editarClienteNombre",
      apellido: "#editarClienteApellido",
      correo: "#editarClienteCorreo",
      telefono: "#editarClienteTelefono",
    },
    addFields: {
      cedula: "#clienteCedula",
      nombre: "#clienteNombre",
      apellido: "#clienteApellido",
      correo: "#clienteCorreo",
      telefono: "#clienteTelefono",
    },
  },
};
