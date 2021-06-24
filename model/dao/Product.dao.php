<?php

require_once 'model/entity/Product.entity.php';

class ProductDao
{
    private $pdo;
    public function __construct()
    {
        try {
            $this->pdo = Database::StartUp();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listProducts()
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM products");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listProductImagesById($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_IMAGE_1, PRODUCT_IMAGE_2, PRODUCT_IMAGE_3, PRODUCT_IMAGE_4 FROM products WHERE PRODUCT_ID = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listProductsForCatalog()
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_IMAGE_1 FROM products");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getProductDetailById($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * FROM products WHERE PRODUCT_ID = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function showStock($id, $size)
    {
        try {
            $temp = "STOCK_SIZE_" . $size;
            $stm = $this->pdo->prepare("SELECT $temp FROM products WHERE PRODUCT_ID = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateStock($size, $id, $quantity)
    {
        try {
            $temp = "STOCK_SIZE_" . $size;
            $sql = "UPDATE products SET $temp = ? WHERE PRODUCT_ID = ?";
            $this->pdo->prepare($sql)
                ->execute(
                    array($quantity, $id)
                );
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listProductsOfSale($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT * from sales_detail,products where sales_detail.PRODUCT_ID = products.PRODUCT_ID AND sales_detail.SALE_ID = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listProductsForCatalogByCategory($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_IMAGE_1 FROM products WHERE PRODUCT_CATEGORY_ID = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listProductsForCatalogByCategoryName($name)
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_ID, PRODUCT_NAME, PRODUCT_DESCRIPTION, PRODUCT_PRICE, PRODUCT_IMAGE_1  FROM products WHERE PRODUCT_CATEGORY_ID = (SELECT PRODUCT_CATEGORY_ID FROM product_category WHERE PRODUCT_CATEGORY_NAME = ? ) ORDER BY RAND() LIMIT 4");
            $stm->execute(array($name));
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getLastId()
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_ID FROM products ORDER BY DT_REGISTRY ");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function getImage01ById($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_IMAGE_1 FROM products WHERE PRODUCT_ID = ?");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listRecentlyAddedProducts()
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_ID,PRODUCT_CATEGORY_ID,PRODUCT_NAME,PRODUCT_IMAGE_1,PRODUCT_PRICE FROM products ORDER BY DT_REGISTRY LIMIT 9");
            $stm->execute();
            return $stm->fetchAll(PDO::FETCH_OBJ);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function listRandomProductsByCategory($id)
    {
        try {
            $stm = $this->pdo->prepare("SELECT PRODUCT_ID,PRODUCT_CATEGORY_ID,PRODUCT_NAME FROM products WHERE PRODUCT_CATEGORY_ID = ? ORDER BY RAND() LIMIT 9");
            $stm->execute(array($id));
            return $stm->fetchAll(PDO::FETCH_COLUMN);
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function addRecord(Product $c)
    {
        try {
            $stm = $this->pdo->prepare("INSERT INTO 
                products (
                PRODUCT_ID, 
                PRODUCT_CATEGORY_ID, 
                COLOR_ID, 
                PRODUCT_NAME, 
                PRODUCT_DESCRIPTION,
                STOCK_SIZE_XXS, 
                STOCK_SIZE_XS, 
                STOCK_SIZE_S, 
                STOCK_SIZE_M, 
                STOCK_SIZE_L, 
                STOCK_SIZE_XL, 
                STOCK_SIZE_XXL, 
                PRODUCT_IMAGE_1, 
                PRODUCT_IMAGE_2, 
                PRODUCT_IMAGE_3, 
                PRODUCT_IMAGE_4, 
                PRODUCT_PRICE
                ) 
                VALUES
                (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)");
            $stm->execute(array(
                $c->getProductId(),
                $c->getProductCategoryId(),
                $c->getColorId(),
                $c->getProductName(),
                $c->getProductDescription(),
                $c->getStockSizeXxs(),
                $c->getStockSizeXs(),
                $c->getStockSizeS(),
                $c->getStockSizeM(),
                $c->getStockSizeL(),
                $c->getStockSizeXl(),
                $c->getStockSizeXxl(),
                $c->getProductImage1(),
                $c->getProductImage2(),
                $c->getProductImage3(),
                $c->getProductImage4(),
                $c->getProductPrice()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function updateRecord(Product $c)
    {
        try {
            $stm = $this->pdo->prepare("UPDATE products SET 
            PRODUCT_CATEGORY_ID = ?,
            COLOR_ID = ?, 
            PRODUCT_NAME = ?,  
            STOCK_SIZE_XXS = ?, 
            STOCK_SIZE_XS = ?, 
            STOCK_SIZE_S = ?, 
            STOCK_SIZE_M = ?, 
            STOCK_SIZE_L = ?, 
            STOCK_SIZE_XL = ?, 
            STOCK_SIZE_XXL = ?, 
            PRODUCT_IMAGE_1 = ?, 
            PRODUCT_IMAGE_2 = ?, 
            PRODUCT_IMAGE_3 = ?, 
            PRODUCT_IMAGE_4 = ?, 
            PRODUCT_PRICE = ?, 
            DT_UPDATE = CURRENT_TIMESTAMP 
            WHERE PRODUCT_ID = ?");
            $stm->execute(array(
                $c->getProductCategoryId(),
                $c->getColorId(),
                $c->getProductName(),
                $c->getStockSizeXxs(),
                $c->getStockSizeXs(),
                $c->getStockSizeS(),
                $c->getStockSizeM(),
                $c->getStockSizeL(),
                $c->getStockSizeXl(),
                $c->getStockSizeXxl(),
                $c->getProductImage1(),
                $c->getProductImage2(),
                $c->getProductImage3(),
                $c->getProductImage4(),
                $c->getProductPrice(),
                $c->getProductId()
            ));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteRecord(Product $c)
    {
        try {
            $stm = $this->pdo->prepare("DELETE FROM products WHERE PRODUCT_ID = ?");
            $stm->execute(array($c->getProductId()));
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function uploadProductFile($imgFile, $tmpDir, $imgSize, $productId, $imageNumber)
    {

        $uploadDir = "assets/productImages/";
        $imgExt = strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
        $validExtensions = array('jpeg', 'jpg', 'png', 'gif');

        $imageNewName = $productId . '-' . $imageNumber . '.' . $imgExt;

        if (in_array($imgExt, $validExtensions)) {
            if ($imgSize < 5000000) {
                move_uploaded_file($tmpDir, $uploadDir . $imageNewName);
            } else {
                $errorMsg = "La imagen es demasiado grande.";
            }
        } else {
            $errorMsg = "La imagen no tiene una extensión valida";
        }

        if (isset($errorMsg)) {
            return $errorMsg;
        } else {
            return $imageNewName;
        }
    }

    public function deleteProductFile($product)
    {

        $dir  = "assets/productImages/$product";
        if (!unlink($dir)) {
            echo ("Se borre archivo $product");
        } else {
            echo ("Ocurrio un error al borrar archivo $product");
        }
    }
}
