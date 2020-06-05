# Ranty Checkout - PHP SDK

## Requerimientos
- Composer
- PHP >=7.1
- PHP Extensions: curl | json | mbstring | dom

## Instalación
```bash
# Creamos la carpeta para el sdk
mkdir sdk
# Ingresamos a la carpeta
cd sdk
# Descomprimimos el SDK
unzip php-checkout-sdk.zip
# Instalamos las dependencias en /vendor
composer install
```

### Ejemplo de uso
```php
<?php
// Importamos el SDK y las clases
require_once(__DIR__ . '/../../vendor/autoload.php');
require(__DIR__ . '/../../checkoutApi.php');

$naranjaCheckout = new NaranjaCheckout('CLIENT_ID', 'CLIENT_SECRET', 'ENVIRONMENT');

// Definimos el primer producto
$product1 = new  Naranja\CheckoutApi\Model\ProductItem();
$product1->setName('Playstation 4');
$product1->setDescription ('Consola de juegos');
$product1->setQuantity(1);

// Definimos precio unitario
$unitPrice1 = new Naranja\CheckoutApi\Model\Amount();
$unitPrice1->setCurrency('ARS');
$unitPrice1->setValue('50500');

// Agregamos el unitPrice al producto
$product1-> setUnitPrice($unitPrice1);

// Definimos el segundo producto
$product2 = new  Naranja\CheckoutApi\Model\ProductItem();
$product2->setName('Nintendo Switch');
$product2->setDescription ('Consola de juegos portatil'); 
$product2->setQuantity(1);

// Definimos el precio unitario del segundo producto
$unitPrice2 = new Naranja\CheckoutApi\Model\Amount();
$unitPrice2->setCurrency('ARS');
$unitPrice2->setValue('50000');

// Agregamos el precio unitario del producto
$product2-> setUnitPrice($unitPrice2);

// Definimos el objeto transaccion
$transaction = new Naranja\CheckoutApi\Model\Transaction();

// Definimos el monto de la transaccción
$amountTransaction = new Naranja\CheckoutApi\Model\Amount();
$amountTransaction->setCurrency('ARS'); 
$amountTransaction->setValue('100500');

// Agregamos el objeto amount a la transaccion
$transaction->setAmount($amountTransaction);
// SoftDescriptor es la descripción con el cual queda registrado
// el consumo y como se ve en el resumen de cuenta 
$transaction->setSoftDescriptor('JUGUETES CASTILLO MAGICO');
$transaction->setProducts([$product1, $product2]);

// Generamos el payment request
$paymentRequest = new Naranja\CheckoutApi\Model\PaymentRequests();
// Actualmente solo soportamos el paymentType "web_checkout"
$paymentRequest->setPaymentType('web_checkout');
// Actualmente solo soportamos el authorizationMode "SALE"
$paymentRequest->setAuthorizationMode('SALE');
// Un id externo, para que el vendedor pueda identificar la venta
$paymentRequest->setExternalPaymentId('123abd');
// Por más que haya una sola transacción debemos pasar un array
$paymentRequest->setTransactions([$transaction]);

// Definimos el Requests creation redirect
$requestsCreationRedirect = new Naranja\CheckoutApi\Model\RequestCreationRedirect();
// La URL a la cual enviamos al cliente cuando la transacción fue exitosa
$requestsCreationRedirect->setSuccessUrl('https://castillo-magico.com/success');
// La URL a la cual enviamos al cliente cuando la transacción falló
$requestsCreationRedirect->setFailureUrl('https://castillo-magico.com/failure');
$paymentRequest->setRequestCreationRedirect($requestsCreationRedirect);

// La URL a la cual enviamos notificaciones sobre el estado el pago
$paymentRequest->setCallbackUrl('https://castillo-magico.com/notification');

// Ejecutamos el metodo
$response = $naranjaCheckout->createPaymentRequest($paymentRequest);
$response = json_decode($response,true);
print_r($response['checkout_url'].PHP_EOL);
```

## Pruebas
Para probar el flujo de checkout, una vez en el webform te vamos a pedir que te loguees. Tenemos dos usuarios de prueba que podes usar para los distintos escenarios:

* Éxito: success@naranja-checkout-test.com
* Falla: failure@naranja-checkout-test.com

Para ambos, el password es `checkout123`

## API
### Clase
```php
class NaranjaCheckout(string $client_id, string $client_secret, string $environment);
```
- client_id: El id del cliente
- client_secret: El secreto del cliente
- environment: El ambiente que deseamos utilizar ( sandbox | prod )

### Métodos
#### createPaymentRequest
Se utiliza para crear el paymentRequest
```php
createPaymentRequest($paymentRequestInfo);
```
- paymentRequestInfo: Modelo instanciado de **Naranja\CheckoutApi\Model\PaymentRequests**
#### getPaymentRequest
```php
getPaymentRequests(int $id);
```
- id: ID del payment request a checkear

## Modelos

### Naranja\CheckoutApi\Model\PaymentRequests()
#### Métodos
##### setPaymentType( **string** )
Tipo de pago. Sólo permite "web_checkout".

##### setAuthorizationMode( **string** )
Modo de autorización. Sólo permite "SALE".

##### setExternalPaymentId( **string** )
Un id externo, para que el vendedor pueda identificar la venta.

##### setTransactions( [ **Naranja\CheckoutApi\Model\Transaction()** ] )
Por más que haya una sola transacción debemos pasar un array.

##### setRequestCreationRedirect( **Naranja\CheckoutApi\Model\RequestCreationRedirect()** )
URLs a las cuales redirigir al usuario cuando termina el proceso del checkout.

##### setCallbackUrl( **string** )
URL a la cual enviar notficaciones sobre el estado de la transacción.

### Naranja\CheckoutApi\Model\ProductItem()
Representa un ítem en la compra.
#### Métodos
##### setName( **string** )
Nombre del producto.
##### setDescription( **string** )
Descripción del producto.
##### setQuantity( **int** )
Cantidad de productos adquiridos.
##### setUnitPrice( **Naranja\CheckoutApi\Model\Amount()** )
Precio unitario del producto.

### Naranja\CheckoutApi\Model\Amount()
#### Métodos
##### setCurrency( **string** )
Moneda en la cual se hizo la compra. Sólo admite "ARS".
##### setValue( **string** )
Valor de la compra.

### Naranja\CheckoutApi\Model\Transaction()
#### Métodos
##### setAmount( **Naranja\CheckoutApi\Model\Amount()** )
Monto total de la transacción.
##### setSoftDescriptor( **string** )
Descripción con el cual queda registrado el consumo y como se ve en el resumen de cuenta.
##### setProducts( [ **Naranja\CheckoutApi\Model\ProductItem()** ] )
Los productos de la compra. Los mismos son sólo a título informativo para el cliente.

### Naranja\CheckoutApi\Model\RequestCreationRedirect()
#### Métodos
##### setSuccessUrl( **string** )
La URL a la cual enviamos al cliente cuando la transacción fue exitosa.
##### setFailureUrl( **string** )
La URL a la cual enviamos al cliente cuando la transacción falló.
