<!-- Modal para crear nueva categoría -->
<div class="modal fade" id="agregarCategoriaModal" tabindex="-1" aria-labelledby="agregarCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCategoriaModalLabel">Agregar Nueva Categoría</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del modal con el formulario -->
            <div class="modal-body">
                <form id="formAgregarCategoria" action="" method="POST">
                    <div class="mb-3">
                        <label for="nombreCategoria" class="form-label">Nombre de la Categoría</label>
                        <input type="text" class="form-control" id="nombreCategoria" name="Nombre" required>
                    </div>
                    <!-- Botones de acción -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="store" class="btn btn-primary">Guardar Categoría</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>