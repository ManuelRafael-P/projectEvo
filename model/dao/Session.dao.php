<?php

require_once 'model/entity/UserSession.entity.php';

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

    public function destroy_session()
    {
        unset($_SESSION['user_info']);
        session_destroy();
    }
}
