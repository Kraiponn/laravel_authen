<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeFood extends Model
{
    protected $table = 'typefood';
    protected $fillable = ['namw'];

    public function food() {
        return $this->hasMany(Food::class);
    }

}
