<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;

class searchModal extends ModalComponent
{
    public function render()
    {
        return view('livewire.search-modal');
    }
}
