<?php

require_once 'model/entity/Product.entity.php';
require_once 'model/dao/Product.dao.php';

class ProductController
{
    private $productDao;

    public function __construct()
    {
        $this->productDao = new ProductDao();
    }
    public function adminProduct()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminProductPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function addOrUpdateProduct()
    {
        // if (isset($_POST['inputProductCategoryId']) && isset($_POST['inputProductCategoryName'])) {
        //     $object = new Product($_POST['inputProductCategoryId'], $_POST['inputProductCategoryName'], '', '');
        //     if (!empty($object)) {
        //         if (isset($_POST['add'])) {
        //             $this->productDao->addRecord($object);
        //             echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&msg=add-success')</script>");
        //         } else if (isset($_POST['update'])) {
        //             $this->productDao->updateRecord($object);
        //             echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&msg=update-success')</script>");
        //         }
        //     } else {
        //         echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&error=empty-inputs')</script>");
        //     }
        // }
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
}
