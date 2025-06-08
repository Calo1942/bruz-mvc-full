<!-- Modal para Editar Catálogo -->
<div class="modal fade" id="editarCatalogoModal" tabindex="-1" aria-labelledby="editarCatalogoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarCatalogoModalLabel">Editar Elemento del Catálogo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarCatalogo">
                    <input type="hidden" id="editarCatalogoId"> <!-- Campo oculto para el ID del elemento de catálogo -->
                    <div class="mb-3">
                        <label for="editarNombreCatalogo" class="form-label">Nombre del Elemento</label>
                        <input type="text" class="form-control" id="editarNombreCatalogo" value="Nombre Actual" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarDescripcionCatalogo" class="form-label">Descripción</label>
                        <textarea class="form-control" id="editarDescripcionCatalogo" rows="3">Descripción actual del elemento.</textarea>
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