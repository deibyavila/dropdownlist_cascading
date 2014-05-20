<?php namespace Codiesel\Entities;

class DetalleVenta extends \Eloquent {

protected $table = 'detalleventas';
protected $fillable = ['modelo', 'modelo_anuo', 'valor_total'];
