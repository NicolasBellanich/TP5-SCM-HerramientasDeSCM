<?php
require_once ( __DIR__ . '/PedidoLoQSea.php');

$url_file_pedidos = __DIR__ . '/../../Base de Datos/pedidosLoQueSea.json';
$url_file_imagenes_descriptivas = __DIR__ . '/../../Base de Datos/images/';

$nombre_archivo_imagen = '';

if ($_FILES["archivo"]['name'] !== ''){
    $uploadOk = 1;
    $nombre_archivo_imagen .= basename($_FILES["archivo"]["name"]);
    $target_file = $url_file_imagenes_descriptivas . $nombre_archivo_imagen;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    $check = getimagesize($_FILES["archivo"]["tmp_name"]);
    if($check === false) {
        //echo "File is not an image.";
        $uploadOk = 0;
    }
    //if (file_exists($target_file)) {
        //echo "File already exists.";
        //$uploadOk = 0;
    //}
    if ($_FILES["archivo"]["size"] > 5000000) {
        //echo "File is too large.";
        $uploadOk = 0;
    }
    if($imageFileType != "jpg" ) {
        //echo "Only JPG files are allowed.";
        $uploadOk = 0;
    }
    /*if ($uploadOk === 0) {
        //echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            //echo "The file ". basename( $_FILES["archivo"]["name"]). " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }
    }*/
}

//se obtienen los pedidos ya cargados
$str = file_get_contents( $url_file_pedidos);
$arr = json_decode($str, true);


//se crea el objeto pedido
$nuevo_pedido = new PedidoLoQSea($_POST['descripcion'], $nombre_archivo_imagen, $_POST['radio_comercio_direccion'],
$_POST['comercio_calle'], $_POST['comercio_numero'], $_POST['comercio_ciudad'], $_POST['comercio_referencia'],
$_POST['comercio_google_maps'], $_POST['entrega_calle'], $_POST['entrega_numero'], $_POST['entrega_ciudad'],
$_POST['entrega_referencia'], $_POST['radio_pago'], $_POST['pago_monto'], $_POST['pago_nro_tarjeta'], $_POST['pago_nom_titular'],
$_POST['pago_ape_titular'], $_POST['pago_fec_vencimiento'], $_POST['pago_cvc'], $_POST['radio_recibir'], $_POST['recibir_fecha'],
$_POST['recibir_hora']);

//se agrega el objeto pedido al archivo json
array_push($arr, json_encode($nuevo_pedido));
$str = json_encode($arr);
if (json_decode($str) != null) {
    $file = fopen($url_file_pedidos,'w');
    fwrite($file, $str);
    fclose($file);
}