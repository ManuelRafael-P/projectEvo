<?php


class mainController
{
    private $model_user;

    public function __construct()
    {
    }
    public function Index()
    {
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/main_page.php';
        require_once 'view/components/common/footer.php';
    }

    public function Contact()
    {
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/contact_page.php';
        require_once 'view/components/common/footer.php';
    }

    public function AboutUs()
    {
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/us_page.php';
        require_once 'view/components/common/footer.php';
    }
}
