<!-- Modal para Agregar Producto -->
<div class="modal fade" id="agregarProductoModal" tabindex="-1" aria-labelledby="agregarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarProductoModalLabel">Agregar Nuevo Producto</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarProducto">
                    <div class="mb-3">
                        <label for="nombreProducto" class="form-label">Nombre del Producto</label>
                        <input type="text" class="form-control" id="nombreProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="descripcionProducto" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcionProducto" rows="3"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="precioProducto" class="form-label">Precio</label>
                        <input type="number" class="form-control" id="precioProducto" step="0.01" required>
                    </div>
                    <div class="mb-3">
                        <label for="stockProducto" class="form-label">Stock</label>
                        <input type="number" class="form-control" id="stockProducto" required>
                    </div>
                    <div class="mb-3">
                        <label for="categoriaProducto" class="form-label">Categoría</label>
                        <select class="form-select" id="categoriaProducto" required>
                            <option selected disabled value="">Seleccionar Categoría</option>
                            <option>Electrónicos</option>
                            <option>Ropa</option>
                            <option>Hogar</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Guardar Producto</button>
            </div>
        </div>
    </div>
</div> 