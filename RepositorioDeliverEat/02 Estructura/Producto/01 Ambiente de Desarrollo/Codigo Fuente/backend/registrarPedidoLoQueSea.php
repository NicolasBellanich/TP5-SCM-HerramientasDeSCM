<?php
require_once ( __DIR__ . '/PedidoLoQSea.php');

echo '<pre>';
echo print_r($_POST, true);
echo '</pre>';

$url_file_pedidos = __DIR__ . '/../../Base de Datos/pedidosLoQueSea.json';

$str = file_get_contents( $url_file_pedidos);
$arr = json_decode($str, true);

$nuevo_pedido = new PedidoLoQSea($_POST['descripcion'], $_POST['archivo'], $_POST['radio_comercio_direccion'],
$_POST['comercio_calle'], $_POST['comercio_numero'], $_POST['comercio_ciudad'], $_POST['comercio_referencia'],
$_POST['comercio_google_maps'], $_POST['entrega_calle'], $_POST['entrega_numero'], $_POST['entrega_ciudad'],
$_POST['entrega_referencia'], $_POST['radio_pago'], $_POST['pago_monto'], $_POST['pago_nro_tarjeta'], $_POST['pago_nom_titular'],
$_POST['pago_ape_titular'], $_POST['pago_fec_vencimiento'], $_POST['pago_cvc'], $_POST['radio_recibir'], $_POST['recibir_fecha'],
$_POST['recibir_hora']);

array_push($arr, json_encode($nuevo_pedido));
$str = json_encode($arr);
if (json_decode($str) != null) {
    $file = fopen($url_file_pedidos,'w');
    fwrite($file, $str);
    fclose($file);
}




/*if (($_FILES["file-input"]["size"] > 2000000)) {
    $msg = "Image File Size is Greater than 2MB.";
    header("Location: ../product.php?error=$msg");
    exit();
} */