<?php
require_once 'model/user.php';

class userController
{

    private $model_user;

    public function __construct()
    {
        $this->model_user = new User();
    }

    public function login()
    {
        $message = false;
        if (isset($_REQUEST['msg'])) {
            if ($_REQUEST['msg'] == "Error") {
                $message = true;
            }
        }
        require_once 'view/components/header.php';
        require_once 'view/security/login.php';
    }

    public function recover_password()
    {
        require_once 'view/components/header.php';
        require_once 'view/security/recover_password.php';
    }

    public function register_form()
    {
        require_once 'view/components/header.php';
        require_once 'view/security/register_form.php';
    }

    public function check_account()
    {
        $user = new User();
        if (isset($_REQUEST['inputEmail']) && isset($_REQUEST['inputPassword'])) {
            $user = $this->model_user->verify_account($_REQUEST['inputEmail'], $_REQUEST['inputPassword']);
        }

        if (empty($user)) {
            header("Location:?c=user&a=Login&msg=Error");
        } else {
            print_r($user[0]->USER_TYPE);
        }
    }

    public function register_complete(){
        require_once 'view/components/header.php';
        require_once 'view/security/register_complete.php';
        require_once 'view/components/footer.php';
    }

    public function register_user_client()
    {
        $object = new User();
        $object->user_names = $_REQUEST['inputNames'];
        $object->user_surnames = $_REQUEST['inputSurNames'];
        $object->user_email = $_REQUEST['inputEmail'];
        $object->user_password = md5($_REQUEST['inputPassword']);
        $object->user_address = $_REQUEST['inputAddress'];
        $object->user_phone = $_REQUEST['inputPhone'];
        $this->model_user->register_new_user_client($object);
        header("Location:?c=user&a=register_complete");
    }
}
