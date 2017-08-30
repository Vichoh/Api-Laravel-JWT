<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Propiedad;

class Empresa extends Model
{
    	protected $table = 'empresa';
  
		protected $primaryKey = 'id';

		protected $fillable = [
		      'name', 'email', 'descripcion', 'web', 'telefono', 'confirmed', 'id_user',
		];

		public function users() {
		    return $this->hasMany(User::class, 'id_user');
		}
		  
		public function propiedades() {
		    return $this->hasMany(Propiedad::class, 'id_empresa');
		}

}
