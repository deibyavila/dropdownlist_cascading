<?php namespace Codiesel\Entities;

class Vehiculo extends \Eloquent {


	protected $fillable = ['nom_vh_modelo', 'seg_vh_modelo', 'est_vh_modelo','clase_vh_modelo'];
    protected $table = 'Vehiculos';


}