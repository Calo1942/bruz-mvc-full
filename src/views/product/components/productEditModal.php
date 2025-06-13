<!-- Modal para Editar Producto -->
<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="?url=product/update" method="POST" enctype="multipart/form-data">
                <!-- Encabezado del modal -->
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <!-- Cuerpo del modal -->
                <div class="modal-body">
                    <div class="row g-3">
                        <!-- ID oculto -->
                        <input type="hidden" id="editarProductoId" name="id">

                        <!-- Nombre -->
                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <input type="text" class="form-control rounded-1" id="editarNombreProducto" name="nombre" placeholder="Nombre" required>
                                <label for="editarNombreProducto">Nombre</label>
                            </div>
                        </div>

                        <!-- Categoría -->
                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <select class="form-select rounded-1" id="editarCategoriaProducto" name="categoria" required>
                                    <option value="">Seleccione una categoría</option>
                                    <option value="Camiseta">Camiseta</option>
                                    <option value="Pantalón">Pantalón</option>
                                </select>
                                <label for="editarCategoriaProducto">Categoría</label>
                            </div>
                        </div>

                        <!-- Talla -->
                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <select class="form-select rounded-1" id="editarTallaProducto" name="talla" required>
                                    <option value="">Seleccione una talla</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <label for="editarTallaProducto">Talla</label>
                            </div>
                        </div>

                        <!-- Descripción -->
                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <textarea class="form-control rounded-1" id="editarDescripcionProducto" name="descripcion" style="height: 100px" required></textarea>
                                <label for="editarDescripcionProducto">Descripción</label>
                            </div>
                        </div>

                        <!-- Precio -->
                        <div class="col-12">
                            <div class="input-group border-dark rounded-1 w-75 mx-auto">
                                <span class="input-group-text bg-transparent rounded-start">$</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control rounded-0" id="editarPrecioProducto" name="precio" step="0.01" min="0" placeholder="Precio" required>
                                    <label for="editarPrecioProducto">Precio</label>
                                </div>
                            </div>
                        </div>

                        <!-- Stock -->
                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <input type="number" class="form-control rounded-1" id="editarStockProducto" name="cantidad" placeholder="Stock disponible" min="0" required>
                                <label for="editarStockProducto">Stock disponible</label>
                            </div>
                        </div>

                        <!-- Imagen -->
                        <div class="col-12 w-75 mx-auto">
                            <label for="editarImagenProducto" class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control rounded-1" id="editarImagenProducto" name="imgProduct1" accept="image/*">
                            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                        </div>
                    </div>
                </div>

                <!-- Pie del modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div> 