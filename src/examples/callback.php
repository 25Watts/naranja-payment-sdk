<?php
    // Importamos el SDK y las clases
    require_once(__DIR__ . '/../../vendor/autoload.php');
    require(__DIR__ . '/../../checkoutApi.php');
    // instanciamos la clse naranjaCheckout
    $naranjaCheckout = new NaranjaCheckout('CLIENT_ID','CLIENT_SECRET','ENVIROMENT');
    // Escuchamos el post
    if($_SERVER['REQUEST_METHOD'] == "POST") {
       $body = json_decode(file_get_contents('php://input'), true);
       $payment = $naranjaCheckout->getPayment($body['id']);
       $payment = $payment->__toString();
       $fh = fopen("paymentLog.txt", "a");
       fwrite($fh,'Payment id: '.$body['id'].PHP_EOL.$payment.PHP_EOL);
       fclose($fh);
       print_r($payment);
    }
?>