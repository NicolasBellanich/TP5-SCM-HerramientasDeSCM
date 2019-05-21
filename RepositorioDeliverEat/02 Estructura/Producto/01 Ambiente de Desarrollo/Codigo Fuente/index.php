<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <title>Deliver Eats</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilosCss.css">

</head>
<body>

    <div class="container">
        <div class="row">
            <div class="col">
                <div class="h1">
                    Deliver Eats
                </div>

            </div>
        </div>

        <form id="form_registrar_pedido_lo_q_sea" action="backend/registrarPedidoLoQueSea.php" method="POST" enctype="multipart/form-data">


        <h3 class="fas fa-info-circle text-center">
            Informacion general
        </h3>

        <div>
            <p class="fas fa-arrow-circle-right">
                ¿Qué debe buscar el cadete?
            </p>

            <div class="form-group">
                <label for="txta_descripcion">Descripcion:</label>
                <textarea class="form-control" rows="2" id="txta_descripcion" name="descripcion">

                </textarea>
            </div>
        </div>

        <div>
            <label for="file_descripcion" class="fas fa-arrow-circle-right">
                Foto desriptiva (opcional)
            </label>

            <br>
            <input type="file" id="file_descripcion" name="archivo" accept="image/jpg"/>
        </div>

        <hr>


        <h3 class="fas fa-map-signs">
            Dirección del Comercio
        </h3>

            <div class="row">
                <div class="col">
                    <input name="radio_comercio_direccion" id="radio_comercio_dir" class="" type="radio" value="direccion" checked/>
                    <label class="" for="radio_comercio_dir">
                        Escribir dirección
                    </label>

                </div>
            </div>

            <div class="row">
                <div class="col">
                    <input name="radio_comercio_direccion" id="radio_comercio_maps" class="" type="radio" value="maps"/>
                    <label for="radio_comercio_maps">
                        Dirección google maps
                    </label>

                </div>
            </div>


        <div id="div_comercio_direccion">
            <div>
                <label for="txt_comercio_calle" class="fas fa-arrow-circle-right">
                    Calle
                </label>
                <input type="text" class="form-control" id="txt_comercio_calle" name="comercio_calle"/>
            </div>
            <div>
                <label for="txt_comercio_numero" class="fas fa-arrow-circle-right">
                    Número
                </label>
                <input type="text" class="form-control" id="txt_comercio_numero" name="comercio_numero"/>
            </div>
            <div>
                <label for="cmb_comercio_ciudad" class="fas fa-arrow-circle-right">
                    Ciudad
                </label>

                <select id="cmb_comercio_ciudad" class="form-control" name="comercio_ciudad">
                    <option value="-1">Seleccione...</option>
                    <option value="cba">Cordoba</option>
                    <option value="chan">Chancal</option>
                    <option value="rio">Rio Cuarto</option>
                    <option value="mina">Mina clavero</option>
                </select>
            </div>
            <div>
                <label for="txt_comercio_referencia" class="fas fa-arrow-circle-right">
                    Referencia (opcional)
                </label>
                <input type="text" class="form-control" id="txt_comercio_referencia" name="comercio_referencia"/>
            </div>
        </div>

        <div id="div_comercio_maps">
            <div id="googleMap" style="width:100%;height:400px"></div>
            <input type="text" name="comercio_google_maps" hidden>
        </div>

        <hr>

        <h3 class="fas fa-map-marked-alt">
            Dirección de Entrega
        </h3>

        <div>
            <div>
                <label for="txt_calle" class="fas fa-arrow-circle-right">
                    Calle
                </label>
                <input type="text" id="txt_calle" class="form-control" name="entrega_calle"/>
            </div>
            <div>
                <label for="txt_numero" class="fas fa-arrow-circle-right">
                    Numero
                </label>
                <input type="text" id="txt_numero" class="form-control" name="entrega_numero"/>
            </div>
            <div>
                <label for="cmb_ciudad" class="fas fa-arrow-circle-right">
                    Ciudad
                </label>

                <select id="cmb_ciudad" class="form-control" name="entrega_ciudad">
                    <option value="-1">Seleccione...</option>
                    <option value="cba">Cordoba</option>
                    <option value="chan">Chancal</option>
                    <option value="rio">Rio Cuarto</option>
                    <option value="mina">Mina clavero</option>
                </select>
            </div>
            <div>
                <label for="txt_referencia" class="fas fa-arrow-circle-right">
                    Referencia (opcional)
                </label>
                <input type="text" id="txt_referencia" class="form-control" name="entrega_referencia"/>
            </div>
        </div>

        <hr>

        <h3 class="fas fa-comment-dollar">Forma de pago</h3>
        <div>
            <p class="auto-style3">
                <input name="radio_pago" class="" type="radio" id="radio_pago_efectivo" value="efectivo" checked/>
                <label for="radio_pago_efectivo">
                    Efectivo
                </label>
            </p>
            <p class="auto-style3">
                <input name="radio_pago" class="" type="radio" id="radio_pago_visa" value="visa" />
                <label for="radio_pago_visa">
                    Tarjeta Visa
                </label>
            </p>
        </div>


        <div id="div_pago_efectivo">
            <label for="txt_monto">
                Monto:
            </label>
            <input type="text" id="txt_monto" class="form-control" name="pago_monto"/>
        </div>
        <div id="div_pago_visa">
            <label for="txt_nro_tarjeta">Número tarjeta
            </label>
            <input type="text" id="txt_nro_tarjeta" class="form-control" name="pago_nro_tarjeta"/>

            <label for="txt_nom_titular_tarjeta">Nombre titular</label>
            <input type="text" id="txt_nom_titular_tarjeta" class="form-control" name="pago_nom_titular"/>

            <label for="txt_ape_titular_tarjeta">Apellido titular</label>
            <input type="text" id="txt_ape_titular_tarjeta" class="form-control" name="pago_ape_titular"/>

            <label for="txt_fec_vencimiento_tarjeta">Fecha Vencimiento</label>
            <input type="date" id="txt_fec_vencimiento_tarjeta" class="form-control" name="pago_fec_vencimiento"/>

            <label for="txt_cvc_tarjeta">CVC</label>
            <input type="text" id="txt_cvc_tarjeta" class="form-control" name="pago_cvc"/>
        </div>

        <hr>

        <h3 class="fas fa-people-carry">
            Recibirlo
        </h3>
        <div>
            <input name="radio_recibir" id="radio_recibir_antes" class="" type="radio" value="antes"/>
            <label for="radio_recibir_antes">
                Lo antes posible
            </label>
            <input name="radio_recibir" id="radio_recibir_especifico" class="" type="radio" value="especifico" />
            <label for="radio_recibir_especifico">
                Especifico
            </label>
        </div>

        <div id="div_recibir_antes">
            <p>
                Te lo enviaremos lo antes posible!
            </p>
        </div>
        <div id="div_recibir_especifico">
            <label for="txt_recibir_fecha">
                Fecha
            </label>
            <input type="date" class="form-control" id="txt_recibir_fecha" name="recibir_fecha"/>
            <label for="txt_recibir_hora">
                Hora
            </label>
            <input type="time" class="form-control" id="txt_recibir_hora" name="recibir_hora"/>
        </div>


        <button type="submit" class="btn btn-success" id="btn_enviar">Enviar</button>

        </form>
    </div>

    <script src="../Librerias/jquery_3.4.1/jquery_3.4.1.min.js" ></script>
    <script src="../Librerias/popper_1.12.9/popper.min.js" ></script>
    <script src="../Librerias/bootstrap_4/js/bootstrap.min.js" ></script>
    <script src="../Librerias/bootstrap_notify/js/bootstrap_notify.js" ></script>

    <script src="js/notifications.js"></script>

    <script src="js/googleMaps.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAW-uMMRdBCo8KERPnCuVo2loYz5KcoIqo&callback=myMap"></script>

    <script src="js/registrarPedidoLoQueSea.js"></script>

</body>
</html>