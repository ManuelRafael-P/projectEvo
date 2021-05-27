<?php
require_once 'model/entity/Sale.entity.php';
require_once 'model/dao/Sale.dao.php';

class SaleController
{
    private $saleDao;

    public function __construct()
    {
        $this->saleDao = new SaleDao();
    }
    public function adminSale()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminSalePage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function addOrUpdateSale()
    {
        if (isset($_POST['inputSaleId']) && isset($_POST['inputStatus'])) {
            $object = new Sale($_POST['inputSaleId'], '', '', '', '', '', $_POST['inputStatus'], '', '');
            if (!empty($object)) {
                if (isset($_POST['update'])) {
                    $this->saleDao->updateRecord($object);
                    echo ("<script>window.location.replace('?c=Sale&a=adminSale&msg=update-success')</script>");
                }
            } else {
                echo ("<script>window.location.replace('?c=Sale&a=adminSale&error=empty-inputs')</script>");
            }
        }
    }

    public function deleteRestPswd()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id'] != '') {
                $object = new Sale($_GET['id'], '', '', '', '', '', '', '', '');
                $this->saleDao->deleteRecord($object);
                echo ("<script>window.location.replace('?c=Sale&a=adminSale&msg=delete-success')</script>");
            } else {
                echo ("<script>window.location.replace('?c=Sale&a=adminSale&error=empty-inputs')</script>");
            }
        }
    }
}
