<?php
require_once 'model/entity/Product.entity.php';

require_once 'model/dao/Product.dao.php';
require_once 'model/dao/Color.dao.php';
require_once 'model/dao/ProductCategory.dao.php';
require_once 'model/dao/UserSis.dao.php';
require_once 'model/dao/Sale.dao.php';
require_once 'model/dao/SaleDetail.dao.php';
require_once 'model/dao/OrderDetail.dao.php';

class mainController
{

    private $productDao;
    private $userDao;
    private $colorDao;
    private $productCategoryDao;
    private $orderDetailDao;
    private $saleDao;
    private $saleDetailDao;

    public function __construct()
    {
        $this->productDao = new ProductDao();
        $this->colorDao = new ColorDao();
        $this->productCategoryDao = new ProductCategoryDao();
        $this->userDao = new UserSisDao();
        $this->orderDetailDao = new OrderDetailDao();
        $this->saleDao = new SaleDao();
        $this->saleDetailDao = new SaleDetailDao();
    }

    public function Index()
    {
        $productCat01 = $this->productDao->listProductsForCatalogByCategoryName("Casaca");
        $productCat02 = $this->productDao->listProductsForCatalogByCategoryName("Conjunto");
        $productCat03 = $this->productDao->listProductsForCatalogByCategoryName("Jean");
        $productCat04 = $this->productDao->listProductsForCatalogByCategoryName("Jogger");
        $productCat05 = $this->productDao->listProductsForCatalogByCategoryName("Overall");
        $productCat06 = $this->productDao->listProductsForCatalogByCategoryName("Short");
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
            $id = $_GET['id'];
            if ($id != "") {
                $producto = $this->productDao->listProductsForCatalogByCategory($id);
            } else {
            }
        } else {
            $producto = $this->productDao->listProductsForCatalog();
        }
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/catalogPage.php';
        require_once 'view/components/common/footer.php';
    }

    public function listCartProducts()
    {
        $total = 0;
        $message = "";
        if (isset($_GET['msg'])) {
            if ($_GET['msg'] == "user-not-logged") {
                $message = "Usted no ha iniciado sesion. No podra realizar compras.";
            }
            if ($_GET['msg'] == "user-not-confirmed") {
                $message = "Usted no ha confirmado su cuenta. No podra realizar compras.";
            }
        }
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/cartDetail.php';
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
                echo ("<script>window.location.replace('?c=main&a=myOrderHistory')</script>");
            }
        }
    }

    public function orderDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $order = $this->orderDetailDao->getOrderDetailById($id);
            $sale = $this->saleDao->listSaleById($order['0']['SALE_ID']);
            $saleDetail = $this->productDao->listProductsOfSale($order['0']['SALE_ID']);
            if (!empty($order)) {
                $userId = $_SESSION['user_info']['user_id'];
                $saleId = $sale['0']['SALE_ID'];
                $orderId = $order['0']['ORDER_DETAIL_ID'];
                require_once 'view/components/common/header.php';
                require_once 'view/components/common/navbar.php';
                require_once  "view/main/orderDetailPage.php";
                require_once 'view/components/common/footer.php';
            } else {
                echo ("<script>window.location.replace('?c=main&a=productCatalog')</script>");
            }
        }
    }

    public function updateUserClient()
    {
        if (isset($_SESSION['user_info'])) {
            $userId = $_SESSION['user_info']['user_id'];
            $u = $this->userDao->listUserById($userId);
        }
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/updateUserInformationPage.php';
        require_once 'view/components/common/footer.php';
    }

    public function myOrderHistory()
    {
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/orderHistoryPage.php';
        require_once 'view/components/common/footer.php';
    }
}
