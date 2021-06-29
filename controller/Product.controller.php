<?php

require_once 'model/entity/Product.entity.php';

require_once 'model/dao/Product.dao.php';
require_once 'model/dao/Color.dao.php';
require_once 'model/dao/ProductCategory.dao.php';

class ProductController
{
    private $productDao;
    private $colorDao;
    private $productCategoryDao;

    public function __construct()
    {
        $this->productDao = new ProductDao();
        $this->colorDao = new ColorDao();
        $this->productCategoryDao = new ProductCategoryDao();
    }

    public function adminProduct()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminProductPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function updateProduct()
    {
        if (
            isset($_POST['inputProductId']) && isset($_POST['inputProductCategory']) && isset($_POST['inputColor']) && isset($_POST['inputProductName']) && isset($_POST['inputProductPrice']) && isset($_POST['inputProductDescription'])
            && isset($_POST['inputStockSizeXxs']) && isset($_POST['inputStockSizeXs']) && isset($_POST['inputStockSizeS']) && isset($_POST['inputStockSizeM']) && isset($_POST['inputStockSizeL']) && isset($_POST['inputStockSizeXl'])
            && isset($_POST['inputStockSizeXxl'])
        ) {
            $object = new Product($_POST['inputProductId'], $_POST['inputProductCategory'], $_POST['inputColor'], $_POST['inputProductName'], $_POST['inputProductDescription'], $_POST['inputStockSizeXxs'], $_POST['inputStockSizeXs'], $_POST['inputStockSizeS'], $_POST['inputStockSizeM'], $_POST['inputStockSizeL'], $_POST['inputStockSizeXl'], $_POST['inputStockSizeXxl'], '', '', '', '', $_POST['inputProductPrice'], '', '');
            if (!empty($object)) {
                $updateFiles = $this->productDao->listProductImagesById($object->getProductId());

                if ($_FILES['inputProductImage1']['size'] > 0) {
                    $imgFile1 = $_FILES['inputProductImage1']['name'];
                    $tempDir1 = $_FILES['inputProductImage1']['tmp_name'];
                    $imgSize1 = $_FILES['inputProductImage1']['size'];
                }
                if ($_FILES['inputProductImage2']['size'] > 0) {
                    $imgFile2 = $_FILES['inputProductImage2']['name'];
                    $tempDir2 = $_FILES['inputProductImage2']['tmp_name'];
                    $imgSize2 = $_FILES['inputProductImage2']['size'];
                }
                if ($_FILES['inputProductImage3']['size'] > 0) {
                    $imgFile3 = $_FILES['inputProductImage3']['name'];
                    $tempDir3 = $_FILES['inputProductImage3']['tmp_name'];
                    $imgSize3 = $_FILES['inputProductImage3']['size'];
                }

                if ($_FILES['inputProductImage4']['size'] > 0) {
                    $imgFile4 = $_FILES['inputProductImage4']['name'];
                    $tempDir4 = $_FILES['inputProductImage4']['tmp_name'];
                    $imgSize4 = $_FILES['inputProductImage4']['size'];
                }

                if (!empty($imgFile1)) {
                    $this->productDao->deleteProductFile($updateFiles[0]->PRODUCT_IMAGE_1);
                    $productImage01 = $this->productDao->uploadProductFile($imgFile1, $tempDir1, $imgSize1, $object->getProductId(), 01);
                    $object->setProductImage1($productImage01);
                } else {
                    $object->setProductImage1($updateFiles[0]->PRODUCT_IMAGE_1);
                }
                if (!empty($imgFile2)) {
                    $this->productDao->deleteProductFile($updateFiles[0]->PRODUCT_IMAGE_2);
                    $productImage02 = $this->productDao->uploadProductFile($imgFile2, $tempDir2, $imgSize2, $object->getProductId(), 02);
                    $object->setProductImage2($productImage02);
                } else {
                    $object->setProductImage2($updateFiles[0]->PRODUCT_IMAGE_2);
                }
                if (!empty($imgFile3)) {
                    $this->productDao->deleteProductFile($updateFiles[0]->PRODUCT_IMAGE_3);
                    $productImage03 = $this->productDao->uploadProductFile($imgFile3, $tempDir3, $imgSize3, $object->getProductId(), 03);
                    $object->setProductImage3($productImage03);
                } else {
                    $object->setProductImage3($updateFiles[0]->PRODUCT_IMAGE_3);
                }
                if (!empty($imgFile4)) {
                    $this->productDao->deleteProductFile($updateFiles[0]->PRODUCT_IMAGE_4);
                    $productImage04 = $this->productDao->uploadProductFile($imgFile4, $tempDir4, $imgSize4, $object->getProductId(), 04);
                    $object->setProductImage4($productImage04);
                } else {
                    $object->setProductImage4($updateFiles[0]->PRODUCT_IMAGE_4);
                }


                if (isset($_POST['update'])) {
                    $this->productDao->updateRecord($object);
                    echo ("<script>window.location.replace('?c=Product&a=adminProduct&msg=add-success')</script>");
                }
            }
        } else {
            echo ("<script>window.location.replace('?c=Product&a=adminProduct&error=empty-inputs')</script>");
        }
    }

    public function addProduct()
    {
        if (
            isset($_POST['inputProductId']) && isset($_POST['inputProductCategory']) && isset($_POST['inputColor']) && isset($_POST['inputProductName']) && isset($_POST['inputProductPrice']) && isset($_POST['inputProductDescription'])
            && isset($_POST['inputStockSizeXxs']) && isset($_POST['inputStockSizeXs']) && isset($_POST['inputStockSizeS']) && isset($_POST['inputStockSizeM']) && isset($_POST['inputStockSizeL']) && isset($_POST['inputStockSizeXl'])
            && isset($_POST['inputStockSizeXxl'])
        ) {
            $object = new Product($_POST['inputProductId'], $_POST['inputProductCategory'], $_POST['inputColor'], $_POST['inputProductName'], $_POST['inputProductDescription'], $_POST['inputStockSizeXxs'], $_POST['inputStockSizeXs'], $_POST['inputStockSizeS'], $_POST['inputStockSizeM'], $_POST['inputStockSizeL'], $_POST['inputStockSizeXl'], $_POST['inputStockSizeXxl'], '', '', '', '', $_POST['inputProductPrice'], '', '');

            if (!empty($object)) {

                $imgFile1 = $_FILES['inputProductImage1']['name'];
                $tempDir1 = $_FILES['inputProductImage1']['tmp_name'];
                $imgSize1 = $_FILES['inputProductImage1']['size'];

                $imgFile2 = $_FILES['inputProductImage2']['name'];
                $tempDir2 = $_FILES['inputProductImage2']['tmp_name'];
                $imgSize2 = $_FILES['inputProductImage2']['size'];

                $imgFile3 = $_FILES['inputProductImage3']['name'];
                $tempDir3 = $_FILES['inputProductImage3']['tmp_name'];
                $imgSize3 = $_FILES['inputProductImage3']['size'];

                $imgFile4 = $_FILES['inputProductImage4']['name'];
                $tempDir4 = $_FILES['inputProductImage4']['tmp_name'];
                $imgSize4 = $_FILES['inputProductImage4']['size'];

                if (!empty($imgFile1)) {
                    $productImage01 = $this->productDao->uploadProductFile($imgFile1, $tempDir1, $imgSize1, $object->getProductId(), 01);
                }
                if (!empty($imgFile2)) {
                    $productImage02 = $this->productDao->uploadProductFile($imgFile2, $tempDir2, $imgSize2, $object->getProductId(), 02);
                }
                if (!empty($imgFile3)) {
                    $productImage03 = $this->productDao->uploadProductFile($imgFile3, $tempDir3, $imgSize3, $object->getProductId(), 03);
                }
                if (!empty($imgFile4)) {
                    $productImage04 = $this->productDao->uploadProductFile($imgFile4, $tempDir4, $imgSize4, $object->getProductId(), 04);
                }

                $object->setProductImage1($productImage01);
                $object->setProductImage2($productImage02);
                $object->setProductImage3($productImage03);
                $object->setProductImage4($productImage04);

                print_r($object);

                if (isset($_POST['add'])) {
                    $this->productDao->addRecord($object);
                    echo ("<script>window.location.replace('?c=Product&a=adminProduct&msg=add-success')</script>");
                }
            }
        } else {
            echo ("<script>window.location.replace('?c=Product&a=adminProduct&error=empty-inputs')</script>");
        }
    }

    public function deleteProduct()
    {
        // if (isset($_GET['id'])) {
        //     if ($_GET['id'] != '') {
        //         $object = new Product($_GET['id'], '', '', '');
        //         $this->productDao->deleteRecord($object);
        //         echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&msg=delete-success')</script>");
        //     } else {
        //         echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&error=empty-inputs')</script>");
        //     }
        // }
    }

    public function getNextId($temp)
    {
        $letter = $temp[0];
        $number = (intval(substr($temp, -3))) + 1;
        return $generated = $letter . strval(str_pad($number, 7, '0', STR_PAD_LEFT));
    }
}
