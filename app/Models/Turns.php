<?php

namespace App\Models;

use Guava\Calendar\Contracts\Eventable;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Turns extends Model implements Eventable
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
    public function toCalendarEvent(): CalendarEvent
    {
        return CalendarEvent::make($this)
            ->title($this->staff->name . ' - ' . $this->customer->name)
            ->start($this->date . ' ' . $this->time)
            ->end($this->date . ' ' . $this->time);
    }
}
