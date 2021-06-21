<?php

require_once 'model/dao/Session.dao.php';

require_once 'model/entity/ProductSession.entity.php';

class SessionController
{
    private $sessionDao;

    public function __construct()
    {
        $this->sessionDao = new SessionDao();
    }

    public function addToCart()
    {
        if (isset($_POST['productId']) && isset($_POST['name']) && isset($_POST['price']) && isset($_POST['size']) && isset($_POST['quantity'])) {
            $productSession = new ProductSession($_POST['productId'], $_POST['name'], $_POST['price'], $_POST['size'], $_POST['quantity']);
            if (!empty($productSession)) {
                $this->sessionDao->addToSession($productSession);
                echo ("<script>window.location.replace('?c=main&a=productDetail&id=" . $productSession->getId() . "&msg=success')</script>");
            } else {
                echo ("<script>window.location.replace('?c=main&a=productDetail&id=" . $productSession->getId() . "&msg=error')</script>");
            }
        } else {
            echo ("<script>window.location.replace('?c=security&a=errorPage&msg=cartError')</script>");
        }
    }

    public function Delete()
    {
        $pos = $_REQUEST['pos'];
        unset($_SESSION['cart'][$pos]);
        $_SESSION['cart'] = array_values($_SESSION['cart']);
        echo ("<script>window.location.replace('?c=main&a=listCartProducts')</script>");
    }
}
