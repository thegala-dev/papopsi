<?php

namespace App\Livewire\Pages;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.pages.home')->title('Papopsi');
    }

    public function redirectToWizard()
    {
        return redirect()->to('/wizard');
    }
}
