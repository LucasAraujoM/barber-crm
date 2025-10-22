<?php

namespace App\Filament\Widgets;

use App\Models\Turns;
use Filament\Widgets\Widget;
use Guava\Calendar\Enums\CalendarViewType;
use \Guava\Calendar\Filament\CalendarWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Collection;
use Guava\Calendar\ValueObjects\CalendarEvent;
use Guava\Calendar\ValueObjects\FetchInfo;

class Calendar extends CalendarWidget
{//read https://filamentphp.com/plugins/guava-calendar
    protected CalendarViewType $calendarView = CalendarViewType::ResourceTimeGridDay;
    
    protected function getEvents(FetchInfo $info): Collection | array | Builder {
        $turns = Turns::query()->whereDate('date', '>=', $info->start)
            ->whereDate('date', '<=', $info->end)
            ->get();
        if ($turns->count() > 0) {
            $events = $turns->map(fn (Turns $turn) => $turn->toCalendarEvent());
        }
        $events = CalendarEvent::make()
            ->title('No hay turnos disponibles')
            ->start($info->start)
            ->end($info->end)
            ->styles([
                    'color: red' => true,            // Applies the style if the condition (true) is met
                    'background-color' => '#ffff00', // Directly applies the background color
                    'font-size: 12px'        
            ]);
        return [
            $events,
        ];

    }
}