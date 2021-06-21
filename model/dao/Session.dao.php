<?php

require_once 'model/entity/UserSession.entity.php';
require_once 'model/entity/ProductSession.entity.php';

class SessionDao
{
    public function generateUserSession(UserSession $u)
    {
        $item_array = array(
            'user_id' => $u->getId(),
            'user_full_name' => $u->getFullname(),
            'user_email' => $u->getEmail(),
            'user_type' => $u->getType(),
            'user_verified' => $u->getVerifyAccountValue()
        );
        $_SESSION['user_info'] = $item_array;
    }

    public function addToSession(ProductSession $p)
    {
        if (isset($_SESSION['cart'])) {
            $item_array_id = array_column($_SESSION['cart'], 'productId');
            $count = count($_SESSION['cart']);
            $item_array = array(
                'productId' => $p->getId(),
                'name' => $p->getName(),
                'price' => $p->getPrice(),
                'size' => $p->getSize(),
                'quantity' => $p->getQuantity(),
            );
            $_SESSION['cart'][$count] = $item_array;
        } else {
            $item_array = array(
                'productId' => $p->getId(),
                'name' => $p->getName(),
                'price' => $p->getPrice(),
                'size' => $p->getSize(),
                'quantity' => $p->getQuantity(),
            );
            $_SESSION['cart'][0] = $item_array;
        }
    }

    public function destroy_session()
    {
        unset($_SESSION['user_info']);
        session_destroy();
    }
}
