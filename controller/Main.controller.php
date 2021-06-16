<?php
require_once 'model/entity/Product.entity.php';

require_once 'model/dao/Product.dao.php';
require_once 'model/dao/Color.dao.php';
require_once 'model/dao/ProductCategory.dao.php';

class mainController
{

    private $productDao;
    private $colorDao;
    private $productCategoryDao;

    public function __construct()
    {
        $this->productDao = new ProductDao();
        $this->colorDao = new ColorDao();
        $this->productCategoryDao = new ProductCategoryDao();
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

    public function productCatalog()
    {
        if (isset($_GET['id'])) {
        } else {
            $producto = $this->productDao->listProductsForCatalog();
        }
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/catalogPage.php';
        require_once 'view/components/common/footer.php';
    }

    public function productDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $producto = $this->productDao->getProductDetailById($id);
            if (!empty($producto)) {
                require_once 'view/components/common/header.php';
                require_once 'view/components/common/navbar.php';
                require_once  "view/main/productDetailPage.php";
                require_once 'view/components/common/footer.php';
            } else {
                echo ("<script>window.location.replace('?c=main&a=productCatalog')</script>");
            }
        }
    }
}
