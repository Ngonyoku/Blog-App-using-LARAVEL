<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

class PostList extends Component
{
    
    use WithPagination;

    #[Url()] //
    public $sort = 'desc';

    #[Url()] //Adds the search to the url
    public $search = '';

    public function setSort($sort) {
        $this->sort = ($sort === 'desc') ? 'desc' : 'asc';
        // $this->resetPage(); // Resets the whole page to begin from page 1
    }

    
    # Recieves search request and updates the post list
    #[On('search')] // Listen for search event
    public function updateSearch($search) {
        $this->search = $search;
    }

    #[Computed()]
    public function posts() {
        return Post::published()
                    ->orderBy('published_at', $this->sort)
                    ->where('title', 'like', "%{$this->search}%")
                    ->paginate(10)
                    // ->simplePaginate(10)
        ;
    }

    public function render()
    {
        return view('livewire.post-list');
    }
}
