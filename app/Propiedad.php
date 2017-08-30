<?php

namespace App;
use App\Empresa;

use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
      protected $table = 'propiedad';
  
	  protected $primaryKey = 'id';

	  protected $fillable = [
	      'nombre', 'descripcion', 'id_empresa',
	  ];

	  public function empresa() {
	    return $this->belongsTo(Empresa::class, 'id_empresa');
	  }

}
