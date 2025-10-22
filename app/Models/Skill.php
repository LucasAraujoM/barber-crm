<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skills';

    public $fillable = [
        'name',
        'label',
        'description',
    ];

    public function staff()
    {
        return $this->belongsToMany(Staff::class, 'staff_skill', 'skill_id', 'staff_id');
    }
}
