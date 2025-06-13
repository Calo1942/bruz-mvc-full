<!-- Modal para Agregar Venta -->
<div class="modal fade" id="agregarVentaModal" tabindex="-1" aria-labelledby="agregarVentaModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarVentaModalLabel">Registrar Nueva Venta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="formAgregarVenta">
                    <div class="mb-3">
                        <label for="clienteVenta" class="form-label">Cliente</label>
                        <input type="text" class="form-control" id="clienteVenta" required>
                    </div>
                    <div class="mb-3">
                        <label for="productoVenta" class="form-label">Producto</label>
                        <input type="text" class="form-control" id="productoVenta" required>
                    </div>
                    <div class="mb-3">
                        <label for="cantidadVenta" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidadVenta" required>
                    </div>
                    <div class="mb-3">
                        <label for="totalVenta" class="form-label">Total</label>
                        <input type="text" class="form-control" id="totalVenta" readonly>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-primary">Registrar Venta</button>
            </div>
        </div>
    </div>
</div> 