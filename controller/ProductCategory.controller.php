<?php

require_once 'model/entity/ProductCategory.entity.php';
require_once 'model/dao/ProductCategory.dao.php';

class ProductCategoryController
{
    private $productCategoryDao;

    public function __construct()
    {
        $this->productCategoryDao = new ProductCategoryDao();
    }

    public function adminProductCategory()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminProductCategoryPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function addOrUpdateProductCategory()
    {
        if (isset($_POST['inputProductCategoryId']) && isset($_POST['inputProductCategoryName'])) {
            $object = new ProductCategory($_POST['inputProductCategoryId'], $_POST['inputProductCategoryName'], '', '');
            if (!empty($object)) {
                if (isset($_POST['add'])) {
                    $this->productCategoryDao->addRecord($object);
                    echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&msg=add-success')</script>");
                } else if (isset($_POST['update'])) {
                    $this->productCategoryDao->updateRecord($object);
                    echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&msg=update-success')</script>");
                }
            } else {
                echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&error=empty-inputs')</script>");
            }
        }
    }

    public function deleteProductCategory()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id'] != '') {
                $object = new ProductCategory($_GET['id'], '', '', '');
                $this->productCategoryDao->deleteRecord($object);
                echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&msg=delete-success')</script>");
            } else {
                echo ("<script>window.location.replace('?c=ProductCategory&a=adminProductCategory&error=empty-inputs')</script>");
            }
        }
    }
}
