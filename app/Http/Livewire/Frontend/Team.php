<?php

namespace App\Http\Livewire\Frontend;

use App\Models\TeamMemeber;
use Livewire\Component;
use Livewire\WithPagination;


class Team extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.frontend.team',[
            'teamMembers' => TeamMemeber::paginate(4),
        ]);
    }
}
