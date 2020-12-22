<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @method static first()
 */
class Module extends Model
{
    protected $fillable = ["promo", "description"];

    public function promos() {
        return $this->belongsToMany(Promo::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

}
