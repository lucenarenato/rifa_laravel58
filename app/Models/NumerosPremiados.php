<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NumerosPremiados extends Model
{
    protected $table = 'numeros_premiados';

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }
}
