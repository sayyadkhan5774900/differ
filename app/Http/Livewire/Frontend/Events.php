<?php

namespace App\Http\Livewire\Frontend;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class Events extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $events = Events::simplePaginate(10);

        return view('livewire.frontend.events' , compact('events'));
    }

}
