$(function () {
    initialize();

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
    /*
    $('input[type=radio][name=radio_comercio_direccion]').on('change', function() {
        let div_dir = $('#div_comercio_direccion');
        let div_maps = $('#div_comercio_maps');
        switch (this.value) {
            case 'maps':
                div_maps.show();
                div_dir.hide();
                break;
            case 'direccion':
                div_maps.hide();
                div_dir.show();
                break;
        }
    });

    $('input[type=radio][name=radio_pago]').on('change', function() {
        //console.log(this.name);
        let div_efectivo = $('#div_pago_efectivo');
        let div_visa = $('#div_pago_visa');
        switch (this.value) {
            case 'efectivo':
                div_efectivo.show();
                div_visa.hide();
                break;
            case 'visa':
                div_visa.show();
                div_efectivo.hide();
                break;
        }
    });

    $('input[type=radio][name=radio_recibir]').on('change', function() {
        let div_antes = $('#div_recibir_antes');
        let div_especifico = $('#div_recibir_especifico');
        switch (this.value) {
            case 'antes':
                div_antes.show();
                div_especifico.hide();
                break;
            case 'especifico':
                div_especifico.show();
                div_antes.hide();
                break;
        }
    });
    */
    $('#btn_enviar').on('click', function () {
        registrarPedidoLoQueSea();
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


function validarTamano(file) {
    let jqueryFile = $(file);
    let FileSize = jqueryFile.files[0].size / 1024 / 1024; // in MB
    let extension = jqueryFile.value.split('.')[1];
    if (FileSize < 5 && extension === "jpg")///No esta obteniendo el nombre del archivo.
    {
        alert("Todo correcto.Imagen subida");
    }
    else
    {

        alert('File error');
        $(file).val(''); //esto hace que no se seleccione
    }
}

function validarCampos() {
    let monto, flag_efectivo, descripcion, flag_direccion, calle, numero,
        ciudad, referencia, calle_comercio, numero_comercio, ciudad_comercio, referencia_comercio, archivo;

    flag_efectivo = document.getElementById('radio_pago_efectivo').checked;
    monto = document.getElementById('txt_monto').value;

    descripcion = document.getElementById('txta_descripcion').value;

    flag_direccion = document.getElementById('radio_comercio_dir').checked;
    calle_comercio = document.getElementById('txt_comercio_calle').value;
    numero_comercio = document.getElementById('txt_comercio_numero').value;
    ciudad_comercio = document.getElementById('cmb_comercio_ciudad').value;
    referencia_comercio = document.getElementById('txt_comercio_referencia').value;

    calle = document.getElementById('txt_calle').value;
    numero = document.getElementById('txt_numero').value;
    ciudad = document.getElementById('cmb_ciudad').value;
    referencia = document.getElementById('txt_referencia').value;

    archivo = $('#file_descripcion').val();

    if (descripcion === ""){
        alert('Escriba una descripcion del producto que solicita');
        document.getElementById('txta_descripcion').focus();
        return false;
    }

    if (flag_direccion === true ) {
        if (calle_comercio === "" || numero_comercio === "" || ciudad_comercio === "-1" || referencia_comercio === "") {
            alert('Faltan datos en dirección del comercio');
            document.getElementById('txt_calle').focus();
        }
    }

    if (flag_efectivo === true) {

        if (monto === "") { //monto es numero
            alert('Escriba el monto');
            document.getElementById('txt_monto').focus();
            return false;
        }
    } else{
        if (calle === "" || numero === "" || ciudad === "-1" || referencia === ""){
            alert('Faltan datos en la dirección de entrega')
        }
    }

    /*
    if ( !validarTamano(archivo)){
        alert('tamaño archivo demaciado grande');
        return false;
    }*/

    return true;
}

function registrarPedidoLoQueSea() {
    if (!validarCampos() ){
        return false;
    }
}