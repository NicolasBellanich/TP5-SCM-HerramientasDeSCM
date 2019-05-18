<?php
require_once ( __DIR__ . '/PedidoLoQSea.php');

echo '<pre>';
echo print_r($_POST, true);
echo '</pre>';

/*if (($_FILES["file-input"]["size"] > 2000000)) {
    $msg = "Image File Size is Greater than 2MB.";
    header("Location: ../product.php?error=$msg");
    exit();
} */