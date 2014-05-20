<?php namespace Codiesel\Entities;

class Venta extends \Eloquent {


	protected $fillable = ['email', 'full_name', 'password','id_client','address','ciudad','celular_phone','phone'];
    protected $table = 'ventas';


}