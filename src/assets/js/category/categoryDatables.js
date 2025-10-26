$(document).ready(function() {
    const tblClient = $('#categoryTable').DataTable({
        ajax: {
            url: '', // Misma URL del controlador
            method: 'POST',
            data: {
                getAll: true
            },
            dataSrc: 'data' // IMPORTANTE: Apunta a la propiedad 'data' del JSON
        },
        columns: [
            {data: 'id_categoria'},    
            {data: 'nombre'},
            {
                data: null, 
                render: function(data, type, row) {
                    const btnVer = `<button type="button" class="btn btn-sm btn-primary me-1 btn-ver" title="Ver categoría">
                        <i class="bi bi-eye"></i>
                    </button>`;
                    const btnEditar = `<button type="button" class="btn btn-sm btn-secondary me-1 btn-editar" title="Editar categoría">
                        <i class="bi bi-pencil-square"></i>
                    </button>`;
                    const btnEliminar = `<button type="button" class="btn btn-sm btn-danger btn-eliminar" title="Eliminar categoría">
                        <i class="bi bi-trash"></i>
                    </button>`;

                    return `${btnVer} ${btnEditar} ${btnEliminar}`;
                }
            }
        ],
        autoWidth: false,
        "columnDefs": [
            {targets: [0, 1], className: 'tabla'},
            { orderable: false, className: 'acciones', targets: [2] }
        ],
        "language": {
            url: "https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json",
            search: "", 
            searchPlaceholder: "Buscar..." 
        },
        "dom": '<"row"<"col-sm-12 col-md-6"l><"col-sm-12 col-md-6"f>>' +
               '<"row"<"col-sm-12"tr>>' +
               '<"row"<"col-sm-12 col-md-5"i><"col-sm-12 col-md-7"p>>',
        "initComplete": function() {
            $('.dataTables_filter input').attr('placeholder', 'Buscar...');
        }
    });

    // Evento para Ver categoría
    $(document).on('click', '.btn-ver', function() {
        const id = $(this).closest('tr').find('td:first').text();
        
        $.ajax({
            url: '',
            method: 'POST',
            dataType: 'JSON',
            data: {
                show: id
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#verCategoriaId').text(response.data.id_categoria);
                    $('#verNombreCategoria').text(response.data.nombre);
                    $('#verCategoriaModal').modal('show');
                } else {
                    alert('Error al cargar los datos: ' + response.message);
                }
            },
            error: function() {
                alert('Error de conexión');
            }
        });
    });

    // Evento para Editar categoría
    $(document).on('click', '.btn-editar', function() {
        const id = $(this).closest('tr').find('td:first').text();
        
        $.ajax({
            url: '',
            method: 'POST',
            dataType: 'JSON',
            data: {
                show: id
            },
            success: function(response) {
                if (response.status === 'success') {
                    $('#editarCategoriaId').val(response.data.id_categoria);
                    $('#editarNombreCategoria').val(response.data.nombre);
                    $('#editarCategoriaModal').modal('show');
                } else {
                    alert('Error al cargar los datos: ' + response.message);
                }
            },
            error: function() {
                alert('Error de conexión');
            }
        });
    });

    // Evento para Eliminar categoría
    $(document).on('click', '.btn-eliminar', function() {
        const id = $(this).closest('tr').find('td:first').text();
        
        if (confirm('¿Está seguro de eliminar esta categoría?')) {
            $.ajax({
                url: '',
                method: 'POST',
                dataType: 'JSON',
                data: {
                    delete: id
                },
                success: function(response) {
                    if (response.status === 'success') {
                        alert('Categoría eliminada correctamente');
                        tblClient.ajax.reload();
                    } else {
                        alert('Error al eliminar: ' + response.message);
                    }
                },
                error: function() {
                    alert('Error de conexión');
                }
            });
        }
    });

    // Formulario Agregar Categoría
    $('#formAgregarCategoria').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            store: true,
            nombre: $('#nombreCategoria').val()
        };

        $.ajax({
            url: '',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    alert('Categoría agregada correctamente');
                    $('#agregarCategoriaModal').modal('hide');
                    $('#formAgregarCategoria')[0].reset();
                    tblClient.ajax.reload();
                } else {
                    alert('Error al agregar: ' + response.message);
                }
            },
            error: function() {
                alert('Error de conexión');
            }
        });
    });

    // Formulario Editar Categoría
    $('#formEditarCategoria').on('submit', function(e) {
        e.preventDefault();
        
        const formData = {
            update: true,
            id_categoria: $('#editarCategoriaId').val(),
            nombre: $('#editarNombreCategoria').val()
        };

        $.ajax({
            url: '',
            method: 'POST',
            dataType: 'JSON',
            data: formData,
            success: function(response) {
                if (response.status === 'success') {
                    alert('Categoría actualizada correctamente');
                    $('#editarCategoriaModal').modal('hide');
                    tblClient.ajax.reload();
                } else {
                    alert('Error al actualizar: ' + response.message);
                }
            },
            error: function() {
                alert('Error de conexión');
            }
        });
    });

    // Recargar tabla al cerrar modales
    $('#agregarCategoriaModal, #editarCategoriaModal').on('hidden.bs.modal', function() {
        tblClient.ajax.reload();
    });
});