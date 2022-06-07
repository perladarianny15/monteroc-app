<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;

class Main extends Component
{
    public $client_id;
    public $shownPage;

    protected $listeners = ['clientChangePage'];

    public function mount()
    {
        $this->shownPage = 'index';
    }

    public function clientChangePage($page, $client_id = null)
    {
        $this->shownPage = $page;
        $this->client_id = $client_id;
    }

    public function render()
    {
        return view('livewire.client.main');
    }
}
