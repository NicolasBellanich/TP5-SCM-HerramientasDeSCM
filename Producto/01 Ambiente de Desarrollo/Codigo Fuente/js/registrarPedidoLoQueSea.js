$(function () {
    initialize();

    if (getAllUrlParams()['notify_tipo'] !== undefined){
        let tipo = getAllUrlParams()['notify_tipo'];
        let mensaje = decodeURIComponent(getAllUrlParams()['notify_mensaje']);
        crearMultiplesNotificaciones(tipo, mensaje);
    }

    $('input[type=radio]').on('change', function() {
        let div_mostrar;
        let div_ocultar;
        switch (this.name) {
            case 'radio_comercio_direccion':
                let div_maps = $('#div_comercio_maps');
                let div_dir = $('#div_comercio_direccion');

                switch (this.value) {
                    case 'maps':
                        div_mostrar = div_maps;
                        div_ocultar = div_dir;
                        break;
                    case 'direccion':
                        div_mostrar = div_dir;
                        div_ocultar = div_maps;
                        break;
                }
                break;
            case 'radio_pago':
                let div_efectivo = $('#div_pago_efectivo');
                let div_visa = $('#div_pago_visa');
                switch (this.value) {
                    case 'efectivo':
                        div_mostrar = div_efectivo;
                        div_ocultar = div_visa;
                        break;
                    case 'visa':
                        div_mostrar = div_visa;
                        div_ocultar = div_efectivo;
                        break;
                }
                break;
            case 'radio_recibir':
                let div_antes = $('#div_recibir_antes');
                let div_especifico = $('#div_recibir_especifico');
                switch (this.value) {
                    case 'antes':
                        div_mostrar = div_antes;
                        div_ocultar = div_especifico;
                        break;
                    case 'especifico':
                        div_mostrar = div_especifico;
                        div_ocultar = div_antes;
                        break;
                }
                break;
        }
        div_mostrar.show();
        div_ocultar.hide();
    });

    $('#form_registrar_pedido_lo_q_sea').on('submit', function(){
        return validarCampos();
    });
});

function initialize() {
    $('#txta_descripcion').val('').focus();

    $('#radio_comercio_dir').prop('checked', true);
    $('#div_comercio_maps').hide();

    $('#radio_pago_efectivo').prop('checked', true);
    $('#div_pago_visa').hide();

    $('#radio_recibir_antes').prop('checked', true);
    $('#div_recibir_especifico').hide();
}

function validarCampos() {
    let monto, flag_efectivo, descripcion, flag_direccion, calle, numero,
        ciudad, calle_comercio, numero_comercio, ciudad_comercio, archivo, tamano_archivo,
        numero_tarjeta, nombre_tarjeta, apellido_tarjeta, fecha_vencimiento_tarjeta, cvc, flag_recibir,
        recibir_fecha, recibir_hora;

    flag_efectivo = document.getElementById('radio_pago_efectivo').checked;
    monto = document.getElementById('txt_monto').value;

    descripcion = document.getElementById('txta_descripcion').value;

    flag_direccion = document.getElementById('radio_comercio_dir').checked;
    calle_comercio = document.getElementById('txt_comercio_calle').value;
    numero_comercio = document.getElementById('txt_comercio_numero').value;
    ciudad_comercio = document.getElementById('cmb_comercio_ciudad').value;

    calle = document.getElementById('txt_calle').value;
    numero = document.getElementById('txt_numero').value;
    ciudad = document.getElementById('cmb_ciudad').value;

    archivo = document.getElementById('file_descripcion').files[0];
    tamano_archivo = archivo? archivo.size: 0;

    numero_tarjeta = $('#txt_nro_tarjeta').val();
    nombre_tarjeta = $('#txt_nom_titular_tarjeta').val();
    apellido_tarjeta = $('#txt_ape_titular_tarjeta').val();
    fecha_vencimiento_tarjeta = $('#txt_fec_vencimiento_tarjeta').val();
    cvc = $('#txt_cvc_tarjeta').val();

    flag_recibir = document.getElementById('radio_recibir_especifico').checked;
    recibir_fecha = $('#txt_recibir_fecha').val();
    recibir_hora = $('#txt_recibir_hora').val();

    if (descripcion === ""){
        crearMultiplesNotificaciones('danger','Escriba una descripcion del producto que solicita');
        document.getElementById('txta_descripcion').focus();
        return false;
    }

    if (flag_direccion === true ) {
        if (calle_comercio === "" || numero_comercio === "" || ciudad_comercio === "-1") {
            crearMultiplesNotificaciones('danger','Faltan datos en dirección del comercio');
            document.getElementById('txt_comercio_calle').focus();
            return false;
        }
    }

    if (calle === "" || numero === "" || ciudad === "-1"){
        crearMultiplesNotificaciones('danger','Faltan datos en la dirección de entrega');
        document.getElementById('txt_calle').focus();
        return false;
    }

    if (flag_efectivo === true) {
        if (monto === "") { //monto es numero
            crearMultiplesNotificaciones('danger','Escriba el monto');
            document.getElementById('txt_monto').focus();
            return false;
        }
    } else{
        if (numero_tarjeta === '' || nombre_tarjeta === '' ||
            apellido_tarjeta === '' || fecha_vencimiento_tarjeta === '' ||
            cvc === ''){
            crearMultiplesNotificaciones('danger','Faltan datos de la tarjeta');
            document.getElementById('txt_nro_tarjeta').focus();
            return false;
        }
    }

    if (flag_recibir){
        if (recibir_fecha === '' || recibir_hora === ''){
            crearMultiplesNotificaciones('danger','Faltan datos de la fecha/hora donde recibirlo');
            document.getElementById('txt_recibir_fecha').focus();
            return false;
        }
    }

    if ( tamano_archivo > 5242880){
        crearMultiplesNotificaciones('danger','Tamaño archivo demaciado grande');
        return false;
    }

    if (!flag_efectivo && !validar_visa(numero_tarjeta)){
        crearMultiplesNotificaciones('danger','Escriba un número de tarjeta VISA válido de 16 dígitos');
        return false;
    }

    return true;
}