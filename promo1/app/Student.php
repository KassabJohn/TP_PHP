<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ["promo_id", "firstname", "lastname", "email"];

    public function promo() {
        return $this->belongsTo(Promo::class);
    }

    public function modules() {
        return $this->hasMany(Module::class);
    }
}
