<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // desactivar las marcas de tiempo en la tabla
    public $timestamps = false;

    /**
     * una categoría puede tener muchos productos
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
