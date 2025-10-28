<!-- Modal para editar categoría -->
<div class="modal fade" id="editarCategoriaModal" tabindex="-1" aria-labelledby="editarCategoriaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Encabezado del modal -->
            <div class="modal-header">
                <h4 class="modal-title" id="editarCategoriaModalLabel">Editar Pedido</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <!-- Cuerpo del modal con el formulario -->
            <div class="modal-body">
                <form id="formEditarCategoria" action="" method="POST">
                    <div class="mb-3">
                        <label for="nombreOrder" class="form-label texto">Nombre del Cliente:</label>
                        <input type="text" class="form-control validar-texto" id="nombreOrder" name="nombre" data-validar="texto"required>
                    </div>
                    <div class="mb-3">
                        <label for="tipoVenta" class="form-label">Tipo de Venta:</label>
                        <select class="form-control" id="tipoVenta" name="TipoVenta" required>
                            <option value="">Seleccione una opción</option>
                            <option value="contado">Contado</option>
                            <option value="online">Online</option>
                            <option value="mayorista">Mayorista</option>
                            <option value="minorista">Minorista</option>
                        </select>
                        <span class="text-danger d-none" id="errorTipoVenta">Este campo es obligatorio.</span>
                    </div>
                    <div class="mb-3">
                        <label for="estadoEnvio" class="form-label">Estado de Envío:</label>
                        <select class="form-control" id="estadoEnvio" name="EstadoEnvio" required>
                            <option value="">Seleccione una opción</option>
                            <option value="pendiente">Pendiente</option>
                            <option value="enviado">Enviado</option>
                            <option value="entregado">Entregado</option>
                            <option value="cancelado">Cancelado</option>
                        </select>
                        <span class="text-danger d-none" id="errorEstadoEnvio">Este campo es obligatorio.</span>
                    </div>
                    <!-- Botones de acción -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-cancelar" data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" name="update" class="btn btn-guardar">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>