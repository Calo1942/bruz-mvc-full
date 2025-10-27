$(document).ready(function () {
  // Datatable
  const table = $(MODULE_CONFIG.tableId).DataTable({
    ajax: {
      url: "", // Misma URL del controlador
      method: "POST",
      data: {
        getAll: true,
      },
      dataSrc: "data",
    },
    columns: MODULE_CONFIG.columns,
    autoWidth: false,
    columnDefs: [
      { orderable: false, targets: MODULE_CONFIG.columns.length - 1 },
    ],
    language: {
      url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
      search: "",
      searchPlaceholder: "Buscar...",
    },
    dom:
      '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
      '<"row"<"col-sm-12"tr>>' +
      '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
    initComplete: function () {
      $(".dataTables_filter input").attr("placeholder", "Buscar...");
    },
  });

  // Función genérica para obtener ID de la fila
  function getRowId(button) {
    return $(button).closest("tr").find("td:first").text();
  }

  // Evento para Ver
  $(document).on("click", ".btn-ver", function () {
    const id = getRowId(this);

    $.ajax({
      url: "",
      method: "POST",
      dataType: "JSON",
      data: { show: id },
      success: function (response) {
        if (response.status === "success") {
          $(MODULE_CONFIG.fieldSelectors.viewId).text(
            response.data[MODULE_CONFIG.fields.primaryKey]
          );
          $(MODULE_CONFIG.fieldSelectors.viewField).text(
            response.data[MODULE_CONFIG.fields.formFields[0]]
          );
          $(MODULE_CONFIG.modalIds.view).modal("show");
        } else {
          alert("Error al cargar los datos: " + response.message);
        }
      },
      error: function () {
        alert("Error de conexión");
      },
    });
  });

  // Evento para Editar
  $(document).on("click", ".btn-editar", function () {
    const id = getRowId(this);

    $.ajax({
      url: "",
      method: "POST",
      dataType: "JSON",
      data: { show: id },
      success: function (response) {
        if (response.status === "success") {
          $(MODULE_CONFIG.fieldSelectors.editId).val(
            response.data[MODULE_CONFIG.fields.primaryKey]
          );
          $(MODULE_CONFIG.fieldSelectors.editField).val(
            response.data[MODULE_CONFIG.fields.formFields[0]]
          );
          $(MODULE_CONFIG.modalIds.edit).modal("show");
        } else {
          alert("Error al cargar los datos: " + response.message);
        }
      },
      error: function () {
        alert("Error de conexión");
      },
    });
  });

  // Evento para Eliminar
  $(document).on("click", ".btn-eliminar", function () {
    const id = getRowId(this);

    if (confirm(`¿Está seguro de eliminar esta ${MODULE_CONFIG.entityName}?`)) {
      $.ajax({
        url: "",
        method: "POST",
        dataType: "JSON",
        data: { delete: id },
        success: function (response) {
          if (response.status === "success") {
            alert(
              `${
                MODULE_CONFIG.entityName.charAt(0).toUpperCase() +
                MODULE_CONFIG.entityName.slice(1)
              } eliminada correctamente`
            );
            table.ajax.reload();
          } else {
            alert("Error al eliminar: " + response.message);
          }
        },
        error: function () {
          alert("Error de conexión");
        },
      });
    }
  });

  // Formulario Agregar
  $(MODULE_CONFIG.formIds.add).on("submit", function (e) {
    e.preventDefault();

    const formData = {
      store: true,
      [MODULE_CONFIG.fields.formFields[0]]: $(
        MODULE_CONFIG.fieldSelectors.addField
      ).val(),
    };

    $.ajax({
      url: "",
      method: "POST",
      dataType: "JSON",
      data: formData,
      success: function (response) {
        if (response.status === "success") {
          alert(
            `${
              MODULE_CONFIG.entityName.charAt(0).toUpperCase() +
              MODULE_CONFIG.entityName.slice(1)
            } agregada correctamente`
          );
          $(MODULE_CONFIG.modalIds.add).modal("hide");
          $(MODULE_CONFIG.formIds.add)[0].reset();
          table.ajax.reload();
        } else {
          alert("Error al agregar: " + response.message);
        }
      },
      error: function () {
        alert("Error de conexión");
      },
    });
  });

  // Formulario Editar
  $(MODULE_CONFIG.formIds.edit).on("submit", function (e) {
    e.preventDefault();

    const formData = {
      update: true,
      [MODULE_CONFIG.fields.primaryKey]: $(
        MODULE_CONFIG.fieldSelectors.editId
      ).val(),
      [MODULE_CONFIG.fields.formFields[0]]: $(
        MODULE_CONFIG.fieldSelectors.editField
      ).val(),
    };

    $.ajax({
      url: "",
      method: "POST",
      dataType: "JSON",
      data: formData,
      success: function (response) {
        if (response.status === "success") {
          alert(
            `${
              MODULE_CONFIG.entityName.charAt(0).toUpperCase() +
              MODULE_CONFIG.entityName.slice(1)
            } actualizada correctamente`
          );
          $(MODULE_CONFIG.modalIds.edit).modal("hide");
          table.ajax.reload();
        } else {
          alert("Error al actualizar: " + response.message);
        }
      },
      error: function () {
        alert("Error de conexión");
      },
    });
  });

  // Recargar tabla al cerrar modales
  $(MODULE_CONFIG.modalIds.add + ", " + MODULE_CONFIG.modalIds.edit).on(
    "hidden.bs.modal",
    function () {
      table.ajax.reload();
    }
  );
});
