<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // desactivar las marcas de tiempo en la tabla
    public $timestamps = false;

    /**
     * una categoría tiene muchos productos
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
