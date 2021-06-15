<?php

require_once 'model/dao/UserSis.dao.php';
require_once 'model/dao/RestPswd.dao.php';
require_once 'model/dao/Email.dao.php';
require_once 'model/dao/Session.dao.php';

require_once 'model/entity/UserSis.entity.php';
require_once 'model/entity/RestPswd.entity.php';
require_once 'model/entity/Email.entity.php';
require_once 'model/entity/UserSession.entity.php';


class SecurityController
{

    private $userSisDao;
    private $restPswdDao;
    private $emailDao;
    private $sessionDao;

    public function __construct()
    {
        $this->userSisDao = new UserSisDao();
        $this->restPswdDao = new RestPwsdDao();
        $this->emailDao = new EmailDao();
        $this->sessionDao = new SessionDao();
    }

    public function loginPage()
    {
        $message = false;
        if (isset($_REQUEST['msg'])) {
            if ($_REQUEST['msg'] == "error") {
                $message = true;
            }
        }
        require_once 'view/components/common/header.php';
        require_once 'view/security/login.php';
    }

    public function registryPage()
    {
        $error = false;
        $message = false;
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == "account_exist") {
                $error = true;
            } else if ($_GET['msg'] == "success") {
                $message = true;
            }
        }
        require_once 'view/components/common/header.php';
        require_once 'view/security/register_form.php';
    }

    public function registryCompletePage()
    {
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/security/register_complete.php';
        require_once 'view/components/common/footer.php';
    }

    public function errorPage()
    {
        $message_resubmit_request = false;
        $message_submit_password_wrong = false;
        if (isset($_REQUEST['msg'])) {
            if ($_REQUEST['msg'] == "submit_password_wrong") {
                $message_error = "No tienes permiso para ingresar a esta pagina";
            } else if ($_REQUEST['msg'] == "resubmit_request") {
                $message_error = "Ocurrio un error al reestablecer tu contraseña. Por favor, vuelve a generar tu solicitud.";
            }
        }
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/security/error_page.php';
        require_once 'view/components/common/footer.php';
    }

    public function resetPasswordPage()
    {
        $message_error = false;
        $message_success = false;
        if (isset($_REQUEST['msg'])) {
            if ($_REQUEST['msg'] == "success") {
                $message_success = true;
            } else if ($_REQUEST['msg'] == "error") {
                $message_error = true;
            }
        }
        require_once 'view/components/common/header.php';
        require_once 'view/security/reset_password_form.php';
    }

    public function validateTokens()
    {
        if (isset($_GET['selector']) && isset($_GET['validator'])) {
            $selector = $_GET['selector'];
            $validator = $_GET['validator'];
            if (empty($selector) || empty($validator)) {
                header("Location:?c=security&a=errorPage&msg=empty_tokens");
            } else if (ctype_xdigit($selector) == false || ctype_xdigit($validator) == false) {
                header("Location:?c=security&a=errorPage&msg=wrong_tokens");
            }
            require_once 'view/components/common/header.php';
            require_once 'view/security/create_new_password_form.php';
        }
    }

    public function submit_new_password()
    {
        if (isset($_POST['submit_new_password'])) {
            if (isset($_POST['inputSelector']) && isset($_POST['inputValidator']) && isset($_POST['inputPassword'])) {
                $selector = $_POST['inputSelector'];
                $validator = $_POST['inputValidator'];
                $password = $_POST['inputPassword'];
                $record = $this->restPswdDao->getRecordBySelectorAndTime($selector, date("U"));
                if (!empty($record)) {
                    $validation = $this->validateSelector($validator, $record[0]->REST_TOKEN);
                    if ($validation) {
                        print_r($validation);
                        $this->userSisDao->updatePasswordByEmail($record[0]->REST_EMAIL, $password);
                        $this->restPswdDao->deleteRecord($record[0]->REST_EMAIL);
                    } else {
                        header("Location:?c=security&a=errorPage&msg=resubmit_request");
                    }
                } else {
                    header("Location:?c=security&a=errorPage&msg=resubmit_request");
                }
            }
            require_once 'view/components/common/header.php';
            require_once 'view/components/common/navbar.php';
            require_once 'view/security/reset_password_succesful.php';
            require_once 'view/components/common/footer.php';
        } else {
            header("Location:?c=security&a=errorPage&msg=submit_password_wrong");
        }
    }



    public function confirm_account()
    {
        $selector = $_GET['selector'];
        $validator = $_GET['validator'];
        $this->model_security->validate_tokens_confirm_account($selector, $validator);
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/security/confirm_account.php';
        require_once 'view/components/common/footer.php';
    }

    public function resetPassword()
    {
        if (isset($_POST['submit_reset_request'])) {
            if (isset($_POST['inputEmail'])) {
                $email = $_POST['inputEmail'];
                $names = $this->userSisDao->getFullNameByEmail($email);
                if (!empty($names)) {
                    $fullname = $names[0]->USER_NAMES . ' ' . $names[0]->USER_SURNAMES;

                    $r = $this->fillRestPswd($email);

                    $url = $this->generateUrl($r->getRestSelector(), $r->getRestToken(), "resetRequest");

                    $e = new Email($fullname, $email, $url);

                    $this->restPswdDao->deleteRecord($r->getRestEmail());
                    $this->restPswdDao->addRecord($r);
                    $this->emailDao->sendEmailToResetPassword($e);
                    header("Location:?c=security&a=resetPasswordPage&msg=success");
                } else {
                    header("Location:?c=security&a=resetPasswordPage&msg=error");
                }
            } else {
                echo ("error 1");
            }
        }
    }

    public function validateAccount()
    {
        if (isset($_REQUEST['inputEmail']) && isset($_REQUEST['inputPassword'])) {
            $email = $_REQUEST['inputEmail'];
            $password = md5($_REQUEST['inputPassword']);
            $o = $this->userSisDao->getUserByEmailAndPassword($email, $password);
            if (!empty($o)) {
                $userSession = $this->fillUserSession($o);
                $this->sessionDao->generateUserSession($userSession);
                if ($_SESSION['user_info']['user_type'] == 0) {
                    header("Location:?c=main&a=Index");
                } else {
                    header("Location:?c=Intranet&a=intranet_main_page");
                }
            } else {
                header("Location:?c=security&a=LoginPage&msg=error");
            }
        }
    }

    public function logOut()
    {
        $this->sessionDao->destroy_session();
        echo ("<script>window.location.replace('?c=security&a=loginPage')</script>");
    }

    public function registerUserTypeClient()
    {
        if (isset($_POST['inputNames']) && isset($_POST['inputSurNames']) && isset($_POST['inputEmail']) && isset($_POST['inputPassword']) && isset($_POST['inputAddress']) && isset($_POST['inputPhone'])) {
            $id = implode($this->userSisDao->getLastId());
            if (empty($id)) {
                $id = 1;
            } else {
                $id = $id + 1;
            }
            print_r($id);
            $u = new UserSis($id, $_POST['inputNames'], $_POST['inputSurNames'], $_POST['inputEmail'], $_POST['inputPassword'], $_POST['inputAddress'], $_POST['inputPhone'], '', '', '', '');
            print_r($u);
            if (empty($this->userSisDao->getUserByEmail($u->getEmail()))) {
                $this->userSisDao->addUser($u);
                $r = $this->fillRestPswd($u->getEmail());
                $url = $this->generateUrl($r->getRestSelector(), $r->getRestToken(), "verifyAccount");
                $e = new Email($u->getNames() . '' . $u->getSurnames(), $u->getEmail(), $url);
                $this->restPswdDao->deleteRecord($r->getRestEmail());
                $this->restPswdDao->addRecord($r);
                $this->emailDao->sendEmailToConfirmAccount($e);
                header("Location:?c=Security&a=registryPage&msg=success");
            } else {
                header("Location:?c=Security&a=registryPage&msg=account_exist");
            }
        } else {
            echo ("error 1");
        }
    }

    //lo del profe

    public function fillUser($o)
    {
        $user = new UserSis($o[0]->USER_ID, $o[0]->USER_NAMES, $o[0]->USER_SURNAMES, $o[0]->USER_EMAIL, '', '', '', $o[0]->USER_TYPE, $o[0]->USER_ACCOUNT_VERIFIED, '', '');
        return $user;
    }

    public function fillUserSession($o)
    {
        $userSession = new UserSession($o[0]->USER_ID, $o[0]->USER_NAMES . ' ' . $o[0]->USER_SURNAMES, $o[0]->USER_EMAIL, $o[0]->USER_TYPE, $o[0]->USER_ACCOUNT_VERIFIED);
        return $userSession;
    }

    public function fillRestPswd($email)
    {
        $selector = bin2hex(random_bytes(8));
        $token = random_bytes(32);
        $expires = date("U") + 1800;
        $restPswd = new RestPwsd('', $email, $selector, $token, $expires);
        return $restPswd;
    }

    public function generateUrl($selector, $token, $message)
    {
        if ($message == "resetRequest") {
            $url = "http://localhost/Proyecto_EVO/?c=security&a=validateTokens&selector=" . $selector . "&validator=" . bin2hex($token);
            return $url;
        } else {
            $url = "http://localhost/Proyecto_EVO/?c=security&a=confirm_account&selector=" . $selector . "&validator=" . bin2hex($token);
            return $url;
        }
    }

    public function validateSelector($validator, $token)
    {
        $tokenbin = hex2bin($validator);
        $tokenCheck = password_verify($tokenbin, $token);
        if ($tokenCheck) {
            return true;
        } else {
            return false;
        }
    }
}
