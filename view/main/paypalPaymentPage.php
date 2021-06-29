<div class="content">
    <div class="container">
        <div class="text p-5 m-4 text-center">
            <h1>Pago con PayPal</h1>
            <div style="font-size: 1.2rem;">
                <p>A continuación se podra observar el monto a pagar tanto en soles y en dolares.</p>
                <p>Total en Soles : <strong>S/.<?php echo $priceInSoles; ?>.00</strong></p>
                <p>Total en dolares : <strong>$.<?php echo $priceInDollar; ?>.00</strong> </p>
                <p>Por motivos del medio de pago. Solo aceptamos pagos en dolares.</p>
                <p>Para poder continuar de click en el boton de paypal.</p>
                <p>Gracias por su comprensión. Y que tenga buen día.</p>
            </div>
        </div>
        <div id="paypal-button-container"></div>
    </div>
</div>

<script>
    paypal.Button.render({
        env: 'sandbox', // sandbox | production
        style: {
            label: 'checkout', // checkout | credit | pay | buynow | generic
            size: 'responsive', // small | medium | large | responsive
            shape: 'pill', // pill | rect
            color: 'gold' // gold | blue | silver | black
        },

        // PayPal Client IDs - replace with your own
        // Create a PayPal app: https://developer.paypal.com/developer/applications/create

        client: {
            sandbox: 'AdE7jd5gr5VcSNjDIS3vNJZnswLQLyt_ddQy3oqw91fcSk-oDn5pQu0mPZwVmk91QX5TUJ3U_jFKXCIr',
            production: ''
        },

        // Wait for the PayPal button to be clicked

        payment: function(data, actions) {
            return actions.payment.create({
                payment: {
                    transactions: [{
                        amount: {
                            total: '<?php echo $priceInDollar ?>',
                            currency: 'USD'
                        },
                        description: "Compra de productos a Warning : $<?php echo $priceInDollar; ?>",
                        custom: "<?php echo $transactionKey ?>#<?php echo $saleId; ?>"
                    }]
                }
            });
        },

        // Wait for the payment to be authorized by the customer

        onAuthorize: function(data, actions) {
            return actions.payment.execute().then(function() {
                console.log(data);
                window.location = "index.php?c=payment&a=verifyPayment&paymentToken=" + data.paymentToken + "&paymentID=" + data.paymentID;
            });
        }

    }, '#paypal-button-container');
</script>