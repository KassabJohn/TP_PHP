<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


/**
 * @method static first()
 */
class Promo extends Model
{
    protected $fillable = ['promo', "moodle", "description", "schoolname", "specialite"];


    public function students() {
        return $this->hasMany(Student::class);
    }

    public function modules() {
        return $this->belongsToMany(Module::class);
    }
}
