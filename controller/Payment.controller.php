<?php
require_once 'model/dao/Payment.dao.php';
require_once 'model/dao/Sale.dao.php';
require_once 'model/dao/Session.dao.php';
require_once 'model/dao/SaleDetail.dao.php';
require_once 'model/dao/Product.dao.php';

require_once 'model/entity/Sale.entity.php';
require_once 'model/entity/SaleSession.entity.php';

class PaymentController
{
    private $paymentDao;
    private $saleDao;
    private $saleDetailDao;
    private $sessionDao;
    private $productDao;

    public function __construct()
    {
        $this->saleDetailDao = new SaleDetailDao();
        $this->saleDao = new SaleDao();
        $this->paymentDao = new PaymentDao();
        $this->sessionDao = new SessionDao();
        $this->productDao = new ProductDao();
    }

    public function pay()
    {
        if (isset($_POST['total'])) {
            $total = $_POST['total'];
            $priceToPay = round($total * 0.2513);
            if ($total > 0) {
                if (isset($_SESSION['user_info'])) {
                    $userId = $_SESSION['user_info']['user_id'];
                    $userFullName = $_SESSION['user_info']['user_full_name'];
                    $userEmail = $_SESSION['user_info']['user_email'];
                    $userType = $_SESSION['user_info']['user_type'];
                    $userVerified = $_SESSION['user_info']['user_verified'];
                    if ($userVerified != 0) {
                        $temp = $this->paymentDao->generateCode(10);
                        $temp1 = $this->paymentDao->generateCode(10);
                        $transactionKey = $temp . $userId . $temp1;
                        $record = $this->fillSaleObject($userId, $transactionKey, $userEmail, $total);
                        $id = implode($this->saleDao->addPrepaidSale($record));
                        if ($id != 0) {
                            $saleSession = new SaleSession($id, $transactionKey, $total, $priceToPay);
                            $this->sessionDao->generateSaleSession($saleSession);
                            echo ("<script>window.location.replace('?c=payment&a=payWithPaypal')</script>");
                        } else {
                            echo ("<script>window.location.replace('?c=main&a=listCartProducts&msg=error_in_db')</script>");
                        }
                    } else {
                        echo ("<script>window.location.replace('?c=main&a=listCartProducts&msg=user-not-confirmed')</script>");
                    }
                } else {
                    echo ("<script>window.location.replace('?c=main&a=listCartProducts&msg=user-not-logged')</script>");
                }
            } else {
                echo ("<script>window.location.replace('?c=main&a=listCartProducts&msg=total-is-zero')</script>");
            }
        }
    }

    public function payWithPaypal()
    {
        if (isset($_SESSION['sale_info'])) {
            $saleId = $_SESSION['sale_info']['sale_id'];
            $transactionKey = $_SESSION['sale_info']['transaction_key'];
            $priceInSoles =  $_SESSION['sale_info']['total_s'];
            $priceInDollar =  $_SESSION['sale_info']['total_d'];
        }
        require_once("view/components/common/header.php");
        require_once("view/components/common/navbar.php");
        require_once("view/main/paypalPaymentPage.php");
        require_once("view/components/common/footer.php");
    }

    public function verifyPayment()
    {
        //$clientId = "";
        //$secret = "";

        $clientId = "AdE7jd5gr5VcSNjDIS3vNJZnswLQLyt_ddQy3oqw91fcSk-oDn5pQu0mPZwVmk91QX5TUJ3U_jFKXCIr";
        $secret = "EPPaeaerXN9tVdN-9i0NpiRLPvfHu9K1j4rz03wemxkmGaxlF6XnLjZcuWqXjLQgfNvW3Vf2rNUCDCnL";

        // $url = "https://api.paypal.com";
        $url = "https://api.sandbox.paypal.com";

        $login = curl_init($url . "/v1/oauth2/token");

        curl_setopt($login, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($login, CURLOPT_USERPWD, $clientId . ":" . $secret);
        curl_setopt($login, CURLOPT_POSTFIELDS, "grant_type=client_credentials");

        $answer = curl_exec($login);
        $answerObject = json_decode($answer);
        $accessToken = $answerObject->access_token;
        $sale = curl_init($url . "/v1/payments/payment/" . $_REQUEST['paymentID']);

        curl_setopt($sale, CURLOPT_HTTPHEADER, array("Content-Type: application/json", "Authorization: Bearer " . $accessToken));
        curl_setopt($sale, CURLOPT_RETURNTRANSFER, TRUE);

        $saleAnswer = curl_exec($sale);
        $transactionData = json_decode($saleAnswer);

        $state = $transactionData->state;
        $email =   $transactionData->payer->payer_info->email;
        $total = $transactionData->transactions[0]->amount->total;
        $currency = $transactionData->transactions[0]->amount->currency;
        $custom = $transactionData->transactions[0]->custom;

        $key = explode("#", $custom);

        $transactionKey = $key[0];
        $saleId = $key[1];

        curl_close($login);
        curl_close($sale);

        if ($state == "approved") {
            $mensajePaypal = "<h3>Pago Aprobado</h3>";
            if ($_SESSION['cart']) {
                foreach ($_SESSION['cart'] as $indice => $p) {
                    $productId = $p['productId'];
                    $size = $p['size'];
                    $quantity = intval($p['quantity']);
                    $price = intval($p['price']);
                    $subTotal = $quantity * $price;
                    $this->saleDetailDao->addSaleDetail($saleId, $productId, $size, $quantity, $price, $subTotal);
                    if ($size == 'XXS') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($size == 'XS') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($size == 'S') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($size == 'M') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($size == 'L') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($size == 'XL') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                    if ($size == 'XXL') {
                        $r = implode($this->productDao->showStock($productId, $size));
                        print_r($r);
                        $currentQuantity = intval($r);
                        if ($quantity <= $currentQuantity) {
                            $newQuantity = $currentQuantity - $quantity;
                            $this->productDao->updateStock($size, $productId, $newQuantity);
                        } else {
                            echo "<script>alert('No tenemos stock suficiente para cumplir la venta')</script>"; /*Cambiar */
                        }
                    }
                }
            }
            $this->saleDao->updateSaleApproved($saleAnswer, $saleId);
            $this->saleDao->updateSaleCompleted($transactionKey, $saleId);
            unset($_SESSION['cart']);
            unset($_SESSION['sale_info']);
            header('Location:?c=payment&a=paymentCompleted&saleId=' . $saleId . '');
        } else {
            echo "<script>alert('Hubo un problema con el pago.')</script>";
            header('Location:?c=main&a=listCartProducts');
        }
    }

    public function paymentCompleted()
    {
        require_once 'view/components/common/header.php';
        require_once 'view/components/common/navbar.php';
        require_once 'view/main/paymentCompletedPage.php';
        require_once 'view/components/common/footer.php';
    }

    public function fillSaleObject($userId, $transactionKey, $userEmail, $total)
    {
        $id = implode($this->saleDao->getLastId());
        if ($id == "") {
            $id = 1;
        } else {
            $id = $id + 1;
        }
        $temp = new Sale($id, $userId, $transactionKey, '', $userEmail, $total, '', '', '');
        return $temp;
    }
}
