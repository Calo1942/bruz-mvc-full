<div class="d-flex justify-content-between align-items-center mb-3">
    <h2 class="mb-4">Tabla de Productos</h2>
    <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#agregarProductoModal">
        <i class="bi bi-plus-lg me-2"></i> Agregar Producto
    </button>
</div>

<div class="container mt-4">
<div class="table-responsive">
        <table class="table table-striped table-hover">
        <thead class="table-dark">
            <tr>
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Talla</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
                <?php if (!empty($products)): ?>
                    <?php foreach ($products as $product): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($product['IdProducto']); ?></td>
                            <td>
                                <img src="<?php echo htmlspecialchars($product['Imagen']); ?>" 
                                     alt="<?php echo htmlspecialchars($product['Nombre']); ?>" 
                                     class="img-thumbnail" style="width: 50px; height: 50px;">
                </td>
                            <td><?php echo htmlspecialchars($product['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($product['CategoriaNombre']); ?></td>
                            <td><?php echo htmlspecialchars($product['Talla']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Precio']); ?></td>
                            <td><?php echo htmlspecialchars($product['Stock']); ?></td>
                            <td>
                                <button type="button" class="btn btn-sm btn-primary me-1 view-product-btn"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#verProductoModal"
                                        data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                        data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                        data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                        data-precio="<?php echo htmlspecialchars($product['Precio']); ?>"
                                        data-stock="<?php echo htmlspecialchars($product['Stock']); ?>"
                                        data-categoria="<?php echo htmlspecialchars($product['CategoriaNombre']); ?>"
                                        data-talla="<?php echo htmlspecialchars($product['Talla']); ?>"
                                        data-imagen="<?php echo htmlspecialchars($product['Imagen']); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <button type="button" class="btn btn-sm btn-secondary me-1 edit-product-btn"
                                        data-bs-toggle="modal" 
                                        data-bs-target="#editarProductoModal"
                                        data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                        data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                        data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                        data-precio="<?php echo htmlspecialchars($product['Precio']); ?>"
                                        data-stock="<?php echo htmlspecialchars($product['Stock']); ?>"
                                        data-categoria="<?php echo htmlspecialchars($product['IdCategoria']); ?>"
                                        data-talla="<?php echo htmlspecialchars($product['Talla']); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <form action="" method="POST" class="d-inline">
                                    <button type="submit" name="delete" value="<?php echo htmlspecialchars($product['IdProducto']); ?>" 
                                            class="btn btn-sm btn-danger" 
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar este producto?');">
                                        <i class="bi bi-trash"></i>
                                    </button>
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="text-center">No hay productos disponibles.</td>
                    </tr>
                <?php endif; ?>
        </tbody>
    </table>
</div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Modal de Ver
        var viewProductModal = document.getElementById('verProductoModal');
        viewProductModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-name');
            var descripcion = button.getAttribute('data-descripcion');
            var precio = button.getAttribute('data-precio');
            var stock = button.getAttribute('data-stock');
            var categoria = button.getAttribute('data-categoria');
            var talla = button.getAttribute('data-talla');
            var imagen = button.getAttribute('data-imagen');

            document.getElementById('verProductoId').textContent = id;
            document.getElementById('verNombreProducto').textContent = nombre;
            document.getElementById('verDescripcionProducto').textContent = descripcion;
            document.getElementById('verPrecioProducto').textContent = precio;
            document.getElementById('verStockProducto').textContent = stock;
            document.getElementById('verCategoriaProducto').textContent = categoria;
            document.getElementById('verTallaProducto').textContent = talla;
            document.getElementById('verProductoImagen').src = imagen;
        });

        // Modal de Editar
        var editProductModal = document.getElementById('editarProductoModal');
        editProductModal.addEventListener('show.bs.modal', function (event) {
            var button = event.relatedTarget;
            var id = button.getAttribute('data-id');
            var nombre = button.getAttribute('data-name');
            var descripcion = button.getAttribute('data-descripcion');
            var precio = button.getAttribute('data-precio');
            var stock = button.getAttribute('data-stock');
            var categoria = button.getAttribute('data-categoria');
            var talla = button.getAttribute('data-talla');

            document.getElementById('editarProductoId').value = id;
            document.getElementById('editarNombreProducto').value = nombre;
            document.getElementById('editarDescripcionProducto').value = descripcion;
            document.getElementById('editarPrecioProducto').value = precio;
            document.getElementById('editarStockProducto').value = stock;
            document.getElementById('editarCategoriaProducto').value = categoria;
            document.getElementById('editarTallaProducto').value = talla;
        });
    });
</script>