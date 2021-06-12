<?php

require_once 'model/user.php';

class mainController
{
    private $model_user;

    public function __construct()
    {
        $this->model_user = new User();
    }
    public function Index()
    {   
        require_once 'view/components/header.php';
        require_once 'view/components/navbar.php';
        require_once 'view/main/main_page.php';
        require_once 'view/components/footer.php';
    }

    public function Contact()
    {   
        require_once 'view/components/header.php';
        require_once 'view/components/navbar.php';
        require_once 'view/main/contact_page.php';
        require_once 'view/components/footer.php';
    }

    public function AboutUs()
    {   
        require_once 'view/components/header.php';
        require_once 'view/components/navbar.php';
        require_once 'view/main/us_page.php';
        require_once 'view/components/footer.php';
    }
}
