<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Clientes</title>
    <!-- Bootstrap CSS (CDN) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome para iconos -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Lista de Clientes</h2>
            <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarClienteModal">
                <i class="fas fa-plus"></i> Agregar Cliente
            </button>
        </div>
        
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>Cédula</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Correo</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($clientes)): ?>
                        <?php foreach ($clientes as $cliente): ?>
                            <tr>
                                <td><?= htmlspecialchars($cliente['Cedula']) ?></td>
                                <td><?= htmlspecialchars($cliente['Nombre']) ?></td>
                                <td><?= htmlspecialchars($cliente['Apellido']) ?></td>
                                <td><?= htmlspecialchars($cliente['Correo']) ?></td>
                                <td><?= htmlspecialchars($cliente['Telefono']) ?></td>
                                <td>
                                    <!-- Botón Editar -->
                                    <button 
                                        class="btn btn-sm btn-primary btn-editar"
                                        data-bs-toggle="modal"
                                        data-bs-target="#editarClienteModal"
                                        data-cedula="<?= htmlspecialchars($cliente['Cedula']) ?>"
                                        data-nombre="<?= htmlspecialchars($cliente['Nombre']) ?>"
                                        data-apellido="<?= htmlspecialchars($cliente['Apellido']) ?>"
                                        data-correo="<?= htmlspecialchars($cliente['Correo']) ?>"
                                        data-telefono="<?= htmlspecialchars($cliente['Telefono']) ?>"
                                    >
                                        <i class="fas fa-edit"></i> Editar
                                    </button>
                                    <!-- Botón Eliminar -->
                                    <form method="post" action="" class="d-inline" onsubmit="return confirm('¿Seguro que desea eliminar este cliente?');">
                                        <input type="hidden" name="eliminar" value="<?= htmlspecialchars($cliente['Cedula']) ?>">
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Eliminar
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center">No hay clientes registrados.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Modal para Agregar Cliente -->
    <div class="modal fade" id="agregarClienteModal" tabindex="-1" aria-labelledby="agregarClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="agregarClienteModalLabel">Agregar Nuevo Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="cedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="cedula" name="Cedula" required maxlength="11">
                        </div>
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="Nombre" required maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="apellido" name="Apellido" required maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="correo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="Correo" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="Telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="crear">Guardar Cliente</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal para Editar Cliente -->
    <div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editarClienteModalLabel">Editar Cliente</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="editarCedula" name="Cedula">
                        <div class="mb-3">
                            <label for="editarNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editarNombre" name="Nombre" required maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="editarApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="editarApellido" name="Apellido" required maxlength="80">
                        </div>
                        <div class="mb-3">
                            <label for="editarCorreo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="editarCorreo" name="Correo" maxlength="100">
                        </div>
                        <div class="mb-3">
                            <label for="editarTelefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="editarTelefono" name="Telefono" maxlength="20">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary" name="modificar">Guardar Cambios</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS y dependencias -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Rellenar el modal de edición con los datos del cliente seleccionado
        document.querySelectorAll('.btn-editar').forEach(function(btn) {
            btn.addEventListener('click', function() {
                document.getElementById('editarCedula').value = this.getAttribute('data-cedula');
                document.getElementById('editarNombre').value = this.getAttribute('data-nombre');
                document.getElementById('editarApellido').value = this.getAttribute('data-apellido');
                document.getElementById('editarCorreo').value = this.getAttribute('data-correo');
                document.getElementById('editarTelefono').value = this.getAttribute('data-telefono');
            });
        });
    </script>
</body>
</html>