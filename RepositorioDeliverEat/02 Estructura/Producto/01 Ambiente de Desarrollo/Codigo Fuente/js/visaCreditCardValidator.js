function validar_visa(nro_tarjeta){
    let exp = new RegExp(/^4\d{3}-?\d{4}-?\d{4}-?\d{4}$/);
    return exp.test(nro_tarjeta);
}