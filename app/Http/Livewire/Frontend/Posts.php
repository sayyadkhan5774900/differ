<?php

namespace App\Http\Livewire\Frontend;

use App\Models\ContentPage;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap';


    public function render()
    {
        $posts = ContentPage::simplePaginate(4);

        return view('livewire.frontend.posts' , compact('posts'));
    }
}
