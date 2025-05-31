<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // desactivar las marcas de tiempo en la tabla
    public $timestamps = false;

    //agrega al array los atributos que vienen del formulario, para que se puedan guardar en la base de datos
    protected $fillable = ['name'];


    /**
     * una categoría tiene muchos productos
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
