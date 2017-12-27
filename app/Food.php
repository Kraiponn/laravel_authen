<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $table = 'food';

    public function typefood() {
        return $this->belongsTo(TypeFood::class, 'typefood_id');
    }

}
