<!-- Modal para Editar Venta -->
<div class="modal fade" id="editarVentaModal" tabindex="-1" aria-labelledby="editarVentaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarVentaModalLabel">Editar Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formEditarVenta">
                    <input type="hidden" id="editarVentaId"> <!-- Campo oculto para el ID de la venta -->
                    <div class="mb-3">
                        <label for="editarClienteVenta" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="editarClienteVenta" value="Nombre del Cliente" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarProductoVenta" class="form-label">Producto</label>
                        <input type="text" class="form-control" id="editarProductoVenta" value="Nombre del Producto" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarCantidadVenta" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="editarCantidadVenta" value="1" required>
                    </div>
                    <div class="mb-3">
                        <label for="editarTotalVenta" class="form-label">Total</label>
                        <input type="text" class="form-control" id="editarTotalVenta" value="0.00" readonly>
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