<?php
require_once 'model/entity/Color.entity.php';
require_once 'model/dao/Color.dao.php';

class ColorController
{
    private $colorDao;

    public function __construct()
    {
        $this->colorDao = new ColorDAO();
    }

    public function adminColor()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminColorPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function addOrUpdateColor()
    {
        if (isset($_POST['inputColorId']) && isset($_POST['inputColorName'])) {
            $object = new Color($_POST['inputColorId'], $_POST['inputColorName'], '', '');
            if (!empty($object)) {
                if (isset($_POST['add'])) {
                    $this->colorDao->addRecord($object);
                    echo ("<script>window.location.replace('?c=Color&a=adminColor&msg=add-success')</script>");
                } else if (isset($_POST['update'])) {
                    $this->colorDao->updateRecord($object);
                    echo ("<script>window.location.replace('?c=Color&a=adminColor&msg=update-success')</script>");
                }
            } else {
                echo ("<script>window.location.replace('?c=Color&a=adminColor&error=empty-inputs')</script>");
            }
        }
    }

    public function deleteColor()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id'] != '') {
                $object = new Color($_GET['id'], '', '', '');
                $this->colorDao->deleteRecord($object);
                echo ("<script>window.location.replace('?c=Color&a=adminColor&msg=delete-success')</script>");
            } else {
                echo ("<script>window.location.replace('?c=Colory&a=adminColor&error=empty-inputs')</script>");
            }
        }
    }
}
