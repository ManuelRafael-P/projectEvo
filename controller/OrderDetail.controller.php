<?php
require_once 'model/entity/OrderDetail.entity.php';
require_once 'model/dao/OrderDetail.dao.php';

class OrderDetailController
{
    public function __construct()
    {
        $this->orderDetailDao = new OrderDetailDao();
    }
    public function adminOrderDetail()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminOrderDetailPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function addOrUpdateOrderDetail()
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

    public function deleteOrderDetail()
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
