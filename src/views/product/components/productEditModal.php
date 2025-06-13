<div class="container mt-4">
    <div class="table-responsive">
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <!-- Encabezados de la tabla -->
                    <th>ID</th>
                    <th>Imagen</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Talla</th>
                    <th>Detal</th>
                    <th>Mayor</th>
                    <th>Stock</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($products)): ?>
                    <!-- Recorremos el arreglo de productos si no está vacío -->
                    <?php foreach ($products as $product): ?>
                        <?php
                        // Buscar el nombre de la categoría correspondiente al producto
                        $nombreCategoria = '';
                        if (!empty($categories) && is_array($categories)) {
                            foreach ($categories as $cat) {
                                // Comparamos el IdCategoria para obtener el nombre de la categoría
                                if ($cat['IdCategoria'] == $product['IdCategoria']) {
                                    $nombreCategoria = $cat['Nombre'];
                                    break;
                                }
                            }
                        }
                        ?>
                        <tr>
                            <!-- Datos de cada producto -->
                            <td><?php echo htmlspecialchars($product['IdProducto']); ?></td>
                            <td>
                                <!-- Imagen en miniatura -->
                                <img src="<?php echo htmlspecialchars($product['Imagen']); ?>"
                                    alt="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    class="img-thumbnail" style="width: 50px; height: 50px;">
                            </td>
                            <td><?php echo htmlspecialchars($product['Nombre']); ?></td>
                            <td><?php echo htmlspecialchars($nombreCategoria); ?></td>
                            <td><?php echo htmlspecialchars($product['Talla']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Detal']); ?></td>
                            <td>$<?php echo htmlspecialchars($product['Mayor']); ?></td>
                            <td><?php echo htmlspecialchars($product['Stock']); ?></td>
                            <td>
                                <!-- Botón para ver detalles del producto (abre modal) -->
                                <button type="button" class="btn btn-sm btn-primary me-1 view-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#verProductoModal"
                                    data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                    data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                    data-detal="<?php echo htmlspecialchars($product['Detal']); ?>"
                                    data-mayor="<?php echo htmlspecialchars($product['Mayor']); ?>"
                                    data-stock="<?php echo htmlspecialchars($product['Stock']); ?>"
                                    data-categoria="<?php echo htmlspecialchars($nombreCategoria); ?>"
                                    data-talla="<?php echo htmlspecialchars($product['Talla']); ?>"
                                    data-imagen="<?php echo htmlspecialchars($product['Imagen']); ?>">
                                    <i class="bi bi-eye"></i>
                                </button>

                                <!-- Botón para editar producto (abre modal) -->
                                <button type="button" class="btn btn-sm btn-secondary me-1 edit-product-btn"
                                    data-bs-toggle="modal"
                                    data-bs-target="#editarProductoModal"
                                    data-id="<?php echo htmlspecialchars($product['IdProducto']); ?>"
                                    data-name="<?php echo htmlspecialchars($product['Nombre']); ?>"
                                    data-descripcion="<?php echo htmlspecialchars($product['Descripcion']); ?>"
                                    data-detal="<?php echo htmlspecialchars($product['Detal']); ?>"
                                    data-mayor="<?php echo htmlspecialchars($product['Mayor']); ?>"
                                    data-stock="<?php echo htmlspecialchars($product['Stock']); ?>"
                                    data-categoria="<?php echo htmlspecialchars($product['IdCategoria']); ?>"
                                    data-talla="<?php echo htmlspecialchars($product['Talla']); ?>">
                                    <i class="bi bi-pencil-square"></i>
                                </button>

                                <!-- Formulario para eliminar producto -->
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
                    <!-- Mensaje cuando no hay productos -->
                    <tr>
                        <td colspan="9" class="text-center">No hay productos disponibles.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
