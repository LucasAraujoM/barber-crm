<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turns extends Model
{
    use SoftDeletes;

    protected $table = 'turns';
    protected $fillable = [
        'customer_id',
        'staff_id',
        'date',
        'time',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function staff()
    {
        return $this->belongsTo(Staff::class);
    }
}
