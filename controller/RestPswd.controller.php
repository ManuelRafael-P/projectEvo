<?php
require_once 'model/entity/RestPswd.entity.php';
require_once 'model/dao/RestPswd.dao.php';

class RestPswdController
{
    private $restPswdDao;

    public function __construct()
    {
        $this->restPswdDao = new RestPwsdDao();
    }
    public function adminRestPswd()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminRestPswdPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function deleteRestPswd()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id'] != '') {
                $object = new RestPwsd($_GET['id'], '', '', '', '', '');
                $this->restPswdDao->deleteRecordByObject($object);
                echo ("<script>window.location.replace('?c=RestPswd&a=adminRestPswd&msg=delete-success')</script>");
            } else {
                echo ("<script>window.location.replace('?c=RestPswd&a=adminRestPswd&error=empty-inputs')</script>");
            }
        }
    }
}
