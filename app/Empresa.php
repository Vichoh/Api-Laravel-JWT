<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Propiedad;

class Empresa extends Model
{
    	protected $table = 'empresa';
  
		protected $primaryKey = 'id';

		//public $timestamps = false;

		protected $fillable = [
		      'nombre', 'email', 'descripcion', 'web', 'telefono', 'id_users',
		];

		public function users() {
		    return $this->hasMany(User::class, 'id_users');
		}
		  
		public function propiedades() {
		    return $this->hasMany(Propiedad::class, 'id_empresa');
		}

}
