<?php


class PedidoLoQSea implements JsonSerializable
{
    private $descripcion;
    private $archivo;
    private $comercio_tipo_direccion;
    private $comercio_calle;
    private $comercio_numero;
    private $comercio_ciudad;
    private $comercio_referencia;
    private $comercio_google_maps;
    private $entrega_calle;
    private $entrega_numero;
    private $entrega_ciudad;
    private $entrega_referencia;
    private $pago_tipo;
    private $pago_monto;
    private $pago_nro_tarjeta;
    private $pago_nom_titular;
    private $pago_ape_titular;
    private $pago_fec_vencimiento;
    private $pago_cvc;
    private $recibir_tipo;
    private $recibir_fecha;
    private $recibir_hora;

    /**
     * PedidoLoQSea constructor.
     * @param $descripcion
     * @param $archivo
     * @param $comercio_tipo_direccion
     * @param $comercio_calle
     * @param $comercio_numero
     * @param $comercio_ciudad
     * @param $comercio_referencia
     * @param $comercio_google_maps
     * @param $entrega_calle
     * @param $entrega_numero
     * @param $entrega_ciudad
     * @param $entrega_referencia
     * @param $pago_tipo
     * @param $pago_monto
     * @param $pago_nro_tarjeta
     * @param $pago_nom_titular
     * @param $pago_ape_titular
     * @param $pago_fec_vencimiento
     * @param $pago_cvc
     * @param $recibir_tipo
     * @param $recibir_fecha
     * @param $recibir_hora
     */
    public function __construct($descripcion, $archivo, $comercio_tipo_direccion, $comercio_calle, $comercio_numero, $comercio_ciudad, $comercio_referencia, $comercio_google_maps, $entrega_calle, $entrega_numero, $entrega_ciudad, $entrega_referencia, $pago_tipo, $pago_monto, $pago_nro_tarjeta, $pago_nom_titular, $pago_ape_titular, $pago_fec_vencimiento, $pago_cvc, $recibir_tipo, $recibir_fecha, $recibir_hora)
    {
        $this->descripcion = $descripcion;
        $this->archivo = $archivo;
        $this->comercio_tipo_direccion = $comercio_tipo_direccion;
        $this->comercio_calle = $comercio_calle;
        $this->comercio_numero = $comercio_numero;
        $this->comercio_ciudad = $comercio_ciudad;
        $this->comercio_referencia = $comercio_referencia;
        $this->comercio_google_maps = $comercio_google_maps;
        $this->entrega_calle = $entrega_calle;
        $this->entrega_numero = $entrega_numero;
        $this->entrega_ciudad = $entrega_ciudad;
        $this->entrega_referencia = $entrega_referencia;
        $this->pago_tipo = $pago_tipo;
        $this->pago_monto = $pago_monto;
        $this->pago_nro_tarjeta = $pago_nro_tarjeta;
        $this->pago_nom_titular = $pago_nom_titular;
        $this->pago_ape_titular = $pago_ape_titular;
        $this->pago_fec_vencimiento = $pago_fec_vencimiento;
        $this->pago_cvc = $pago_cvc;
        $this->recibir_tipo = $recibir_tipo;
        $this->recibir_fecha = $recibir_fecha;
        $this->recibir_hora = $recibir_hora;
    }


    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}