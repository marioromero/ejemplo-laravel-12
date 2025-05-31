<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // desactivar las marcas de tiempo en la tabla
    public $timestamps = false;

    protected $fillable = [
        'name',
        'precio',
        'category_id', // clave foránea para la categoría
    ];

    /**
     * una categoría puede tener muchos productos
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
