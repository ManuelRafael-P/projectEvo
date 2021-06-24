<div class="content">
    <div class="container">
        <?php
        if (isset($_SESSION['cart'])) {
            if (count($_SESSION['cart']) >= 1) {        ?>
                <table class="table text-center">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">CODIGO</th>
                            <th scope="col">NOMBRE</th>
                            <th scope="col">TALLA</th>
                            <th scope="col">IMAGEN</th>
                            <th scope="col">CANTIDAD</th>
                            <th scope="col">PRECIO</th>
                            <th scope="col">SUBTOTAL</th>
                            <th scope="col">OPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['cart'] as $index => $product) { ?>
                            <tr>
                                <?php
                                $id = $product['productId'];
                                $image = implode($this->productDao->getImage01ById($id));
                                ?>
                                <th scope="row" class="align-middle"><?php echo $product['productId'] ?></th>
                                <td class="align-middle"><?php echo $product['name'] ?></td>
                                <td class="align-middle"><?php echo $product['size'] ?></td>
                                <td class="align-middle"><img src="assets/productImages/<?php echo $image ?>" alt="" class="img-thumbnail" style="height:15vh"></td>
                                <td class="align-middle"><?php echo $product['quantity'] ?></td>
                                <td class="align-middle"><?php echo $product['price'] ?></td>
                                <td class="align-middle"><?php echo number_format($product['price'] * $product['quantity'], 2) ?></td>

                                <?php $total = $total + ($product['price'] * $product['quantity']); ?>
                                <form action="?c=Session&a=Delete" method="post">
                                    <input type="hidden" name="id" value="<?php echo $product['productId'] ?>">
                                    <input type="hidden" name="pos" value="<?php echo $index ?>">
                                    <td class="align-middle"><button type="submit" class="btn btn-danger">X</button></td>
                                </form>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
        <?php
            } else {
                echo "<h2>No tiene productos en el carrito</h2>";
            }
        } else {
            echo "<h2>No tiene productos en el carrito</h2>";
        }
        ?>

        <?php
        if (isset($_SESSION['cart'])) {
        ?>
            <h2>Total</h2>
            <p><?php echo number_format($total, 2) ?></p>
            <form action="?c=payment&a=pay" method="post">
                <input type="hidden" name="total" value="<?php echo $total ?>">
                <button type="submit" name="pagar" class="btn btn-warning">PAGAR</button>
            </form>
        <?php
        } else {
            echo "";
        }
        ?>
    </div>
</div>

<div class="modal" tabindex="-1" id="myModal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php
                if ($message != "") {
                    echo ("<p id='message'>" . $message . "</p>");
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="button">Close</button>
            </div>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        var text = $('#message').text();
        var size = text.length;
        var myModal = new bootstrap.Modal(document.getElementById('myModal'));
        console.log(size);
        if (size > 0) {
            myModal.show();
        } else {
            console.log("No")
        }
        document.getElementById("button").onclick = function() {
            myModal.hide();
        };
    });
</script>