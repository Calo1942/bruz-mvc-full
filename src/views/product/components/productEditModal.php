<div class="modal fade" id="editarProductoModal" tabindex="-1" aria-labelledby="editarProductoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <form action="?url=product/update" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                    <h5 class="modal-title" id="editarProductoModalLabel">Editar Producto</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
                </div>

                <div class="modal-body">
                    <div class="row g-3">
                        <input type="hidden" id="editarProductoId" name="IdProducto">

                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <input type="text" class="form-control rounded-1" id="editarNombreProducto" name="Nombre" placeholder="Nombre" required>
                                <label for="editarNombreProducto">Nombre</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <select class="form-select rounded-1" id="editarCategoriaProducto" name="IdCategoria" required>
                                    <option value="">Seleccione una categoría</option>
                                    <?php
                                    if (isset($categories) && is_array($categories)) { // Verifica si $categories existe y es un array
                                        foreach ($categories as $category) { // Itera sobre las categorías
                                            echo '<option value="' . htmlspecialchars($category['IdCategoria']) . '">' . htmlspecialchars($category['Nombre']) . '</option>'; // Muestra cada opción
                                        }
                                    }
                                    ?>
                                </select>
                                <label for="editarCategoriaProducto">Categoría</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <select class="form-select rounded-1" id="editarTallaProducto" name="Talla" required>
                                    <option value="">Seleccione una talla</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                </select>
                                <label for="editarTallaProducto">Talla</label>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <textarea class="form-control rounded-1" id="editarDescripcionProducto" name="Descripcion" style="height: 100px" required></textarea>
                                <label for="editarDescripcionProducto">Descripción</label>
                            </div>
                        </div>

                        <!-- Precio Detal -->
                        <div class="col-12">
                            <div class="input-group border-dark rounded-1 w-75 mx-auto">
                                <span class="input-group-text bg-transparent rounded-start">$</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control rounded-0" id="editarDetalProducto" name="Detal" step="0.01" min="0" placeholder="Precio Detal" required>
                                    <label for="editarDetalProducto">Precio Detal</label>
                                </div>
                            </div>
                        </div>

                        <!-- Precio Mayor -->
                        <div class="col-12">
                            <div class="input-group border-dark rounded-1 w-75 mx-auto">
                                <span class="input-group-text bg-transparent rounded-start">$</span>
                                <div class="form-floating flex-grow-1">
                                    <input type="number" class="form-control rounded-0" id="editarMayorProducto" name="Mayor" step="0.01" min="0" placeholder="Precio Mayor" required>
                                    <label for="editarMayorProducto">Precio al por mayor</label>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-floating w-75 mx-auto">
                                <input type="number" class="form-control rounded-1" id="editarStockProducto" name="Stock" placeholder="Stock disponible" min="0" required>
                                <label for="editarStockProducto">Stock disponible</label>
                            </div>
                        </div>

                        <div class="col-12 w-75 mx-auto">
                            <label for="editarImagenProducto" class="form-label">Imagen del producto</label>
                            <input type="file" class="form-control rounded-1" id="editarImagenProducto" name="Imagen" accept="image/*">
                            <small class="text-muted">Formatos permitidos: JPG, PNG, GIF. Tamaño máximo: 2MB</small>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" name="update" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>
</div>