<title>Adm. de Producto</title>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-10">
                    <h1>Administración de Productos</h1>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">Agregar Producto</button>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">En esta sección se podra agregar, editar y desactivar un producto.</h3>
                        </div>
                        <div class="card-body">
                            <table id="tableSystem" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>ID Producto</th>
                                        <th>ID Cat. Producto</th>
                                        <th>ID Color</th>
                                        <th>Nombre de Producto</th>
                                        <th>XXS</th>
                                        <th>XS</th>
                                        <th>S</th>
                                        <th>M</th>
                                        <th>L</th>
                                        <th>XL</th>
                                        <th>XXL</th>
                                        <th>Precio</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    foreach ($this->productDao->listProducts() as $c) {
                                    ?>
                                        <tr>
                                            <th scope="row"><?php echo $c->PRODUCT_ID ?></th>
                                            <td><?php echo $c->PRODUCT_CATEGORY_ID ?></td>
                                            <td><?php echo $c->COLOR_ID ?></td>
                                            <td><?php echo $c->PRODUCT_NAME ?></td>
                                            <td><?php echo $c->STOCK_SIZE_XXS ?></td>
                                            <td><?php echo $c->STOCK_SIZE_XS ?></td>
                                            <td><?php echo $c->STOCK_SIZE_S ?></td>
                                            <td><?php echo $c->STOCK_SIZE_M ?></td>
                                            <td><?php echo $c->STOCK_SIZE_L ?></td>
                                            <td><?php echo $c->STOCK_SIZE_XL ?></td>
                                            <td><?php echo $c->STOCK_SIZE_XXL ?></td>
                                            <td><?php echo $c->PRODUCT_PRICE ?></td>
                                            <td>
                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter1" onclick="addToForm()">Editar</button>
                                            </td>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar Color</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=Product&a=addProduct" enctype="multipart/form-data" method="post">
                    <div class="modal-body">
                        <?php
                        $last_id = $this->getNextId(implode($this->productDao->getLastId()));
                        ?>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductId">Id de producto</label>
                                    <input type="text" class="form-control" name="inputProductId" id="inputProductId" placeholder="Id de producto" value=<?php echo $last_id ?> disabled>
                                    <input type="hidden" name="inputProductId" value=<?php echo $last_id ?>>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductCategory">Categoria de producto</label>
                                    <select class="form-control" name="inputProductCategory" id="inputProductCategory">
                                        <option value="defaut">Elige categoria de producto</option>
                                        <?php
                                        foreach ($this->productCategoryDao->listNecessaryDataFromProductCategories() as $c) {
                                        ?>
                                            <option value="<?php echo $c->PRODUCT_CATEGORY_ID ?>"><?php echo $c->PRODUCT_CATEGORY_NAME ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputColorName">Color</label>
                                    <select class="form-control" name="inputColor" id="inputColor">
                                        <option value="defaut">Elige color</option>
                                        <?php
                                        foreach ($this->colorDao->listNecesaryDataFromColors() as $c) {
                                        ?>
                                            <option value="<?php echo $c->COLOR_ID ?>"><?php echo $c->COLOR_NAME ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>

                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductName">Nombre de producto</label>
                                    <input type="text" class="form-control" name="inputProductName" id="inputProductName" placeholder="Ingrese nombre de producto">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductPrice">Precio de producto</label>
                                    <input type="text" class="form-control" name="inputProductPrice" id="inputProductPrice" placeholder="Ingrese precio de producto">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descripción de producto</label>
                            <textarea name="inputProductDescription" class="form-control" id="inputProductDescription" rows="2"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeXxs">Talla XXS</label>
                                    <input type="number" class="form-control" name="inputStockSizeXxs" id="inputStockSizeXxs" placeholder="Ingrese talla XXS">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeXs">Talla XS</label>
                                    <input type="number" class="form-control" name="inputStockSizeXs" id="inputStockSizeXs" placeholder="Ingrese talla XS">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeS">Talla S</label>
                                    <input type="number" class="form-control" name="inputStockSizeS" id="inputStockSizeS" placeholder="Ingrese talla S">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeM">Talla M</label>
                                    <input type="number" class="form-control" name="inputStockSizeM" id="inputStockSizeM" placeholder="Ingrese talla M">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeL">Talla L</label>
                                    <input type="number" class="form-control" name="inputStockSizeL" id="inputStockSizeL" placeholder="Ingrese talla L">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeXl">Talla XL</label>
                                    <input type="number" class="form-control" name="inputStockSizeXl" id="inputStockSizXl" placeholder="Ingrese talla XL">
                                </div>
                            </div>
                            <div class="co">
                                <div class="form-group">
                                    <label for="inputStockSizeXxl">Talla XXL</label>
                                    <input type="number" class="form-control" name="inputStockSizeXxl" id="inputStockSizeXxl" placeholder="Ingrese talla XXL">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage1">Imagen de producto 1</label>
                                    <input type="file" class="form-control" name="inputProductImage1" id="inputProductImage1" placeholder="Ingrese imagen de producto 1" accept="image/*">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage2">Imagen de producto 2</label>
                                    <input type="file" class="form-control" name="inputProductImage2" id="inputProductImage2" placeholder="Ingrese imagen de producto 2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage3">Imagen de producto 3</label>
                                    <input type="file" class="form-control" name="inputProductImage3" id="inputProductImage3" placeholder="Ingrese imagen de producto 3">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage4">Imagen de producto 4</label>
                                    <input type="file" class="form-control" name="inputProductImage4" id="inputProductImage4" placeholder="Ingrese imagen de producto 4">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar registro</button>
                        <button type="submit" class="btn btn-primary" name="add">Enviar registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Editar Aula</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="?c=Product&a=addOrUpdateProduct" method="post">
                    <div class="modal-body">
                        <?php
                        $last_id = implode($this->productDao->getLastId());
                        ?>
                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductId">Id de producto</label>
                                    <input type="text" class="form-control" name="inputProductId" id="inputProductIdE" placeholder="Id de producto" disabled>
                                    <input type="hidden" name="inputProductId" id="inputProductIdHiddenE">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductCategory">Categoria de producto</label>
                                    <input type="text" class="form-control" name="inputProductCategory" id="inputProductCategoryE" placeholder="Ingrese categoria de producto">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputColorName">Color</label>
                                    <input type="text" class="form-control" name="inputColorName" id="inputColorNameE" placeholder="Ingrese color">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductName">Nombre de producto</label>
                                    <input type="text" class="form-control" name="inputProductName" id="inputProductNameE" placeholder="Ingrese nombre de producto">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductPrice">Precio de producto</label>
                                    <input type="text" class="form-control" name="inputProductPrice" id="inputProductPriceE" placeholder="Ingrese precio de producto">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Descripción de producto</label>
                            <textarea name="inputProductDescription" class="form-control" id="inputProductDescriptionE" rows="2"></textarea>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeXxs">Talla XXS</label>
                                    <input type="number" class="form-control" name="inputStockSizeXxs" id="inputStockSizeXxsE" placeholder="Ingrese talla XXS">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeXs">Talla XS</label>
                                    <input type="number" class="form-control" name="inputStockSizeXs" id="inputStockSizeXsE" placeholder="Ingrese talla XS">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeS">Talla S</label>
                                    <input type="number" class="form-control" name="inputStockSizeS" id="inputStockSizeSE" placeholder="Ingrese talla S">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeM">Talla M</label>
                                    <input type="number" class="form-control" name="inputStockSizeM" id="inputStockSizeME" placeholder="Ingrese talla M">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeL">Talla L</label>
                                    <input type="number" class="form-control" name="inputStockSizeL" id="inputStockSizeLE" placeholder="Ingrese talla L">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputStockSizeXl">Talla XL</label>
                                    <input type="number" class="form-control" name="inputStockSizeXl" id="inputStockSizXlE" placeholder="Ingrese talla XL">
                                </div>
                            </div>
                            <div class="co">
                                <div class="form-group">
                                    <label for="inputStockSizeXxl">Talla XXL</label>
                                    <input type="number" class="form-control" name="inputStockSizeXxl" id="inputStockSizeXxlE" placeholder="Ingrese talla XXL">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage1">Imagen de producto 1</label>
                                    <input type="file" class="form-control" name="inputProductImage1" id="inputProductImage1E" placeholder="Ingrese imagen de producto 1">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage2">Imagen de producto 2</label>
                                    <input type="file" class="form-control" name="inputProductImage2" id="inputProductImage2E" placeholder="Ingrese imagen de producto 2">
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage3">Imagen de producto 3</label>
                                    <input type="file" class="form-control" name="inputProductImage3" id="inputProductImage3E" placeholder="Ingrese imagen de producto 3">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group">
                                    <label for="inputProductImage4">Imagen de producto 4</label>
                                    <input type="file" class="form-control" name="inputProductImage4" id="inputProductImage4E" placeholder="Ingrese imagen de producto 4">
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar edición</button>
                        <button type="submit" class="btn btn-primary" name="update">Editar registro</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function addToForm(colorId, colorName) {
            $("#inputColorIdE").val(colorId);
            $("#inputColorIdHiddenE").val(colorId);
            $("#inputColorNameE").val(colorName);
        }
    </script>

</div>