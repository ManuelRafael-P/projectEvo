<?php
require_once 'model/entity/UserSis.entity.php';
require_once 'model/dao/UserSis.dao.php';

class UserSisController
{
    private $userSisDao;

    public function __construct()
    {
        $this->userSisDao = new UserSisDAO();
    }

    public function adminUserSis()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/adminUserSisPage.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }

    public function updateUserClient()
    {
        if (isset($_POST['names']) && isset($_POST['surnames']) && isset($_POST['email']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['address'])) {
            if (isset($_SESSION['user_info'])) {
                $u = new UserSis($_SESSION['user_info']['user_id'], $_POST['names'], $_POST['surnames'], $_POST['email'], '', $_POST['address'], $_POST['phone'], '', '', '', '');
                $this->userSisDao->updateUserClient($u);
                echo ("<script>window.location.replace('?c=main&a=updateUserClient&msg=update-succesful')</script>");
            }
        }
    }

    public function updateUserClientPassword()
    {
        if (isset($_POST['currentPassword']) && isset($_POST['newPassword']) && isset($_POST['repeatNewPassword'])) {
            $userId = $_SESSION['user_info']['user_id'];
            $cp = md5($_POST['currentPassword']);
            if (implode($this->userSisDao->validatePasswordById($userId, $cp)) == 1) {
                $np = md5($_POST['newPassword']);
                $rnp = md5($_POST['repeatNewPassword']);
                if ($np == $rnp) {
                    $this->userSisDao->updatePasswordById($userId, $np);
                    echo ("<script>window.location.replace('?c=main&a=updateUserClient&msg=update-password-succesful')</script>");
                } else {
                    echo ("<script>window.location.replace('?c=main&a=updateUserClient&msg=password-not-match')</script>");
                }
            } else {
                echo ("<script>window.location.replace('?c=main&a=updateUserClient&msg=wrong-password')</script>");
            }
        } else {
            echo ("<script>window.location.replace('?c=main&a=updateUserClient&msg=missing-inputs')</script>");
        }
    }

    public function addOrUpdateUser()
    {
        if (
            isset($_POST['inputUserId']) && isset($_POST['inputNames']) && isset($_POST['inputSurnames']) && isset($_POST['inputEmail']) &&
            isset($_POST['inputPhone']) && isset($_POST['inputAddress']) && isset($_POST['inputType']) && isset($_POST['inputAccountVerified'])
        ) {
            $object = new UserSis($_POST['inputUserId'], $_POST['inputNames'], $_POST['inputSurnames'], $_POST['inputEmail'], '', $_POST['inputAddress'], $_POST['inputPhone'], $_POST['inputType'], $_POST['inputAccountVerified'], '', '');
            if (!empty($object)) {
                if (isset($_POST['add'])) {
                    $this->userSisDao->addRecord($object);
                    echo ("<script>window.location.replace('?c=UserSis&a=adminUserSis&msg=add-success')</script>");
                } else if (isset($_POST['update'])) {
                    $this->userSisDao->updateRecord($object);
                    echo ("<script>window.location.replace('?c=UserSis&a=adminUserSis&msg=update-success')</script>");
                }
            } else {
                echo ("<script>window.location.replace('?c=UserSis&a=adminUserSis&error=empty-inputs')</script>");
            }
        }
    }

    public function deleteUser()
    {
        if (isset($_GET['id'])) {
            if ($_GET['id'] != '') {
                $object = new UserSis($_GET['id'], '', '', '', '', '', '', '', '', '', '');
                $this->userSisDao->deleteRecord($object);
                echo ("<script>window.location.replace('?c=UserSis&a=adminUserSis&msg=delete-success')</script>");
            } else {
                echo ("<script>window.location.replace('?c=UserSis&a=adminUserSis&error=empty-inputs')</script>");
            }
        }
    }
}
