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
    ];

    public function turns()
    {
        return $this->hasMany(Turns::class);
    }
}
