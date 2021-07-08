<?php
require_once 'model/dao/Payment.dao.php';
require_once 'model/dao/Sale.dao.php';
require_once 'model/dao/Session.dao.php';
require_once 'model/dao/SaleDetail.dao.php';
require_once 'model/dao/Product.dao.php';
require_once 'model/dao/UserSis.dao.php';
require_once 'model/dao/OrderDetail.dao.php';

require_once 'model/entity/Sale.entity.php';
require_once 'model/entity/OrderDetail.entity.php';
require_once 'model/entity/SaleSession.entity.php';

class PaymentController
{
    private $paymentDao;
    private $saleDao;
    private $saleDetailDao;
    private $sessionDao;
    private $orderDetailDao;
    private $productDao;
    private $userDao;

    public function __construct()
    {
        $this->saleDetailDao = new SaleDetailDao();
        $this->saleDao = new SaleDao();
        $this->paymentDao = new PaymentDao();
        $this->sessionDao = new SessionDao();
        $this->productDao = new ProductDao();
        $this->userDao = new UserSisDao();
        $this->orderDetailDao = new OrderDetailDao();
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
        $transId = $transactionData->id;
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

            $orderId = implode($this->orderDetailDao->getLastId());

            if ($orderId == "") {
                $orderId = 1;
            } else {
                $orderId = $orderId + 1;
            }

            $userId = $_SESSION['user_info']['user_id'];
            $user = $this->userDao->listUserById($userId);
            $orderNumber = $this->generateId('ORD', $orderId);
            $order = new OrderDetail('', $userId, $saleId, $transId, $user[0]['USER_NAMES'] . ' ' . $user[0]['USER_SURNAMES'], $user[0]['USER_ADDRESS'], $user[0]['USER_PHONE'], $orderNumber, '', '', '', '');
            $this->orderDetailDao->addRecord($order);
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
        if (isset($_REQUEST['saleId'])) {
            $userId = $_SESSION['user_info']['user_id'];
            $saleId = $_REQUEST['saleId'];
            $orderId = implode($this->orderDetailDao->getOrderIdBySaleId($_REQUEST['saleId']));
        }
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

    public function generateInvoice()
    {
        $uid = $_REQUEST['uid'];
        $sid = $_REQUEST['sid'];
        $oid = $_REQUEST['oid'];

        $user = $this->userDao->listUserById($uid);
        $sale = $this->saleDao->listSaleById($sid);
        $order = $this->orderDetailDao->listOrderById($oid);

        $pdf = new FPDF('P', 'mm', 'A4');

        $pdf->AddPage();
        /*output the result*/

        /*set font to arial, bold, 14pt*/
        $pdf->SetFont('Arial', 'B', 20);

        /*Cell(width , height , text , border , end line , [align] )*/

        $pdf->Cell(50, 10, '', 0, 0);
        $pdf->Cell(90, 5, 'Comprobante de Pago', 0, 0);

        $pdf->Cell(50, 10, '', 0, 1);
        $pdf->Cell(50, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(70, 5, 'Detalle de Entrega', 0, 0);
        $pdf->Cell(50, 5, '', 0, 0);
        $pdf->Cell(70, 5, 'Detalle de Orden', 0, 1);

        $pdf->SetFont('Arial', '', 10);

        $pdf->Cell(120, 5, 'Lima, Peru', 0, 0);
        $pdf->Cell(30, 5, 'Id de usuario:', 0, 0);
        $pdf->Cell(40, 5, $user[0]['USER_ID'], 0, 1);


        $pdf->Cell(120, 5, $user[0]['USER_ADDRESS'], 0, 0);
        $pdf->Cell(30, 5, 'Fecha de Orden:', 0, 0);
        $pdf->Cell(40, 5, $order[0]['DT_REGISTRY'], 0, 1);


        $pdf->Cell(120, 5, '', 0, 0);
        $pdf->Cell(30, 5, 'Numero de Orden:', 0, 0);
        $pdf->Cell(40, 5, $order[0]['INVOICE_NUMBER'], 0, 1);

        $pdf->Cell(50, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 15);
        $pdf->Cell(100, 5, 'Pagado por', 0, 0);
        $pdf->Cell(80, 5, $user[0]['USER_NAMES'] . ' ' . $user[0]['USER_SURNAMES'], 0, 0);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(189, 10, '', 0, 1);


        $pdf->Cell(50, 10, '', 0, 1);

        $pdf->SetFont('Arial', 'B', 10);
        /*Heading Of the table*/
        $pdf->Cell(30, 6, 'Id de producto', 1, 0, 'C');
        $pdf->Cell(70, 6, 'Descripcion', 1, 0, 'C');
        $pdf->Cell(23, 6, 'Cantidad', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Precio Unitario', 1, 0, 'C');
        $pdf->Cell(25, 6, 'SubTotal', 1, 1, 'C');/*end of line*/
        /*Heading Of the table end*/
        $pdf->SetFont('Arial', '', 10);
        foreach ($this->saleDetailDao->listSaleDetailsBySaleId($sid) as $s) {
            $p = $this->productDao->listProductById($s->PRODUCT_ID);
            $pdf->Cell(30, 6, $p[0]['PRODUCT_ID'], 1, 0);
            $pdf->Cell(70, 6, $p[0]['PRODUCT_NAME'], 1, 0);
            $pdf->Cell(23, 6, $s->QUANTITY_SOLD, 1, 0, 'R');
            $pdf->Cell(30, 6, "S/" . $s->UNIT_PRICE . ".00", 1, 0, 'R');
            $pdf->Cell(25, 6, "S/" . $s->SALE_DETAIL_TOTAL . ".00", 1, 1, 'R');
        }

        $pdf->Cell(50, 10, '', 0, 1);

        $pdf->Cell(118, 6, '', 0, 0);
        $pdf->Cell(25, 6, 'Total', 0, 0);
        $pdf->Cell(45, 6, "S/" . $sale[0]['TOTAL'] . ".00", 1, 1, 'R');


        $pdf->Output('D', "comprobante.pdf", true);
    }
    public function generateId($letter, $number)
    {
        return $generated = $letter . strval(str_pad($number, 7, '0', STR_PAD_LEFT));
    }
}
