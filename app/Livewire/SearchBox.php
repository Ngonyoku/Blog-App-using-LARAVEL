<?php

namespace App\Livewire;

use Livewire\Component;

class SearchBox extends Component
{
    public $search = '';

    // # Search for articles/ Broadcasts search
    // public function updatedSearch() {
    //     $this->dispatch(
    //         'search',
    //          search: $this->search //search value
    //     );
    // }

    public function update() {
        $this->dispatch(
            'search',
             search: $this->search //search value
        );
    }

    public function render()
    {
        return view('livewire.search-box');
    }
}
