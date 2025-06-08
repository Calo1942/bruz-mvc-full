<!-- Modal para Agregar Catálogo -->
<div class="modal fade" id="agregarCatalogoModal" tabindex="-1" aria-labelledby="agregarCatalogoModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarCatalogoModalLabel">Agregar Nuevo Elemento al Catálogo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarCatalogo">
                    <div class="mb-3">
                        <label for="nombreCatalogo" class="form-label">Nombre del Elemento</label>
                        <input type="text" class="form-control" id="nombreCatalogo" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionCatalogo" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcionCatalogo" rows="3"></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Elemento</button>
            </div>
        </div>
    </div>
</div> 