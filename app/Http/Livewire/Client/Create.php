<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Livewire\Component;

class Create extends Component
{
    public $client_id;
    public $client;

    public $password;

    public $rules = [
        'client.name' => 'required|min:3|max:16',
        'client.identification' => 'required|alpha_num|max:11',
        'client.email' => 'required|min:3|max:255|email',
        'password' => 'required|min:8|max:24|regex:/[@$!%*#?&]/',
        'client.phone' => 'required|max:10'

    ];

    public function mount($client_id)
    {
        if ($client_id === null) {
            $this->client = new Client();
        } else {
            $this->client = Client::findOrFail($client_id);
        }

    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function save()
    {
        $this->validate();
        $this->client->uuid = Str::uuid();
        $this->client->password = Hash::make($this->password);

        $this->client->save();
        $this->emit('clientChangePage', 'index', null);
    }

    public function goBack()
    {
        $this->emit('clientChangePage', 'index', null);
    }

    public function render()
    {
        return view('livewire.client.create');
    }
}
