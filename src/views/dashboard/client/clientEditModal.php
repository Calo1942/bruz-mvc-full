 <!-- Modal para Editar Cliente -->
 <div class="modal fade" id="editarClienteModal" tabindex="-1" aria-labelledby="editarClienteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarClienteModalLabel">Editar Cliente</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="formEditarCliente">
                        <div class="mb-3">
                            <label for="editarCedula" class="form-label">Cédula</label>
                            <input type="text" class="form-control" id="editarCedula" value="123456789" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarNombre" class="form-label">Nombre</label>
                            <input type="text" class="form-control" id="editarNombre" value="Juan" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarApellido" class="form-label">Apellido</label>
                            <input type="text" class="form-control" id="editarApellido" value="Pérez" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarCorreo" class="form-label">Correo Electrónico</label>
                            <input type="email" class="form-control" id="editarCorreo" value="juan@example.com" required>
                        </div>
                        <div class="mb-3">
                            <label for="editarTelefono" class="form-label">Teléfono</label>
                            <input type="tel" class="form-control" id="editarTelefono" value="555-1234">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>