<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model
{
    use SoftDeletes;
    protected $table = 'staff';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'avatar',
        'document_number',
    ];

    public function turns()
    {
        return $this->hasMany(Turns::class);
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class, 'staff_skill', 'staff_id', 'skill_id');
    }
}
