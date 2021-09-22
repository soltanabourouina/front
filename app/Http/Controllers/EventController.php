<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;
use App\Exceptions\UnknownEventTypeException;

class EventController extends Controller
{
    public function eventsGET()
    {
        $eventsByMonth = collect();
        $events = Event::orderBy('year', 'DESC')->orderBy('month', 'DESC')->orderBy('updated_at', 'DESC')->get();
        if ($events->isEmpty()) {
            return view('Events.review', compact('eventsByMonth'));
        }
        $current_month = [
            'year' => $events->first()->year, 
            'month' => $events->first()->month,
        ];
        $current_collection = collect();
        foreach ($events as $event) {
            if ($event->year != $current_month['year'] || $event->month != $current_month['month']) {
                $eventsByMonth->push([
                    'period' => $current_month,
                    'events' => $current_collection,
                    ]);
                $current_month = [
                    'year' => $event->year, 
                    'month' => $event->month,
                ];
                $current_collection = collect();
            }
            $current_collection->add($event);
        }
        $eventsByMonth->push([
            'period' => $current_month,
            'events' => $current_collection,
            ]);
        return view('Events.review', compact('eventsByMonth'));
    }
    
    public function cancelEventGET($event_id)
    {
        try {
            $event = Event::findOrFail($event_id);
            $event->delete();
        } catch (UnknownEventTypeException $e) {
            return redirect()->back()->withErrors("Type d'évenement inconnu");
        }

        return redirect()->back()->withSuccess('Evenement annulé avec succès');
    }
}
