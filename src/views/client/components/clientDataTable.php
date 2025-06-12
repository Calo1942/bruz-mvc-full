<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Tabla de Clientes</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarClienteModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Cliente
    </button>
</div>
<div class="container mt-4">
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
                            <td><?php echo htmlspecialchars($cliente['Cedula']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Apellido']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Correo']); ?></td>
                            <td><?php echo htmlspecialchars($cliente['Telefono']); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary me-1 view-client-btn"
                                        data-bs-toggle="modal" data-bs-target="#verClienteModal"
                                        data-cedula="<?php echo htmlspecialchars($cliente['Cedula']); ?>"
                                        data-nombre="<?php echo htmlspecialchars($cliente['Nombre']); ?>"
                                        data-apellido="<?php echo htmlspecialchars($cliente['Apellido']); ?>"
                                        data-correo="<?php echo htmlspecialchars($cliente['Correo']); ?>"
                                        data-telefono="<?php echo htmlspecialchars($cliente['Telefono']); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary me-1 edit-client-btn"
                                        data-bs-toggle="modal" data-bs-target="#editarClienteModal"
                                        data-cedula="<?php echo htmlspecialchars($cliente['Cedula']); ?>"
                                        data-nombre="<?php echo htmlspecialchars($cliente['Nombre']); ?>"
                                        data-apellido="<?php echo htmlspecialchars($cliente['Apellido']); ?>"
                                        data-correo="<?php echo htmlspecialchars($cliente['Correo']); ?>"
                                        data-telefono="<?php echo htmlspecialchars($cliente['Telefono']); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <form action="" method="POST" class="d-inline">
                                    <button type="submit" name="delete" value="<?php echo htmlspecialchars($cliente['Cedula']); ?>" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de que quieres eliminar a este cliente?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No hay clientes disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Handle View Modal
        var viewClientModal = document.getElementById('verClienteModal');
        viewClientModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var cedula = button.getAttribute('data-cedula');
            var nombre = button.getAttribute('data-nombre');
            var apellido = button.getAttribute('data-apellido');
            var correo = button.getAttribute('data-correo');
            var telefono = button.getAttribute('data-telefono');

            viewClientModal.querySelector('#verCedula').textContent = cedula;
            viewClientModal.querySelector('#verNombre').textContent = nombre;
            viewClientModal.querySelector('#verApellido').textContent = apellido;
            viewClientModal.querySelector('#verCorreo').textContent = correo;
            viewClientModal.querySelector('#verTelefono').textContent = telefono;
        });

        // Handle Edit Modal
        var editClientModal = document.getElementById('editarClienteModal');
        editClientModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var cedula = button.getAttribute('data-cedula');
            var nombre = button.getAttribute('data-nombre');
            var apellido = button.getAttribute('data-apellido');
            var correo = button.getAttribute('data-correo');
            var telefono = button.getAttribute('data-telefono');

            editClientModal.querySelector('#editarCedula').value = cedula;
            editClientModal.querySelector('#editarNombre').value = nombre;
            editClientModal.querySelector('#editarApellido').value = apellido;
            editClientModal.querySelector('#editarCorreo').value = correo;
            editClientModal.querySelector('#editarTelefono').value = telefono;
        });
    });
</script>