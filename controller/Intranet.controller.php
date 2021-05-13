<?php

class IntranetController
{
    public function intranet_main_page()
    {
        require_once 'view/components/intranet/MetaIntranet.php';
        require_once 'view/components/intranet/NavbarIntranet.php';
        require_once 'view/components/intranet/SidebarIntranet.php';
        require_once 'view/intranet/dashboardIntranet.php';
        require_once 'view/components/intranet/FooterIntranet.php';
    }
}
