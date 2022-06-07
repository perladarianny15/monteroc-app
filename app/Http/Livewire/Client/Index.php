<?php

namespace App\Http\Livewire\Client;

use App\Models\Client;
use Chrissantiago82\Datatable\Classes\DatatableClass;
use Illuminate\Support\Str;
use Livewire\Component;

class Index extends Component
{
    public $key;
    public $tableArr;

    public $listeners = ['createClient'];

    public function mount()
    {
        $this->key = Str::random(32);
        $this->TableStruct();
    }

    protected function searchClient()
    {
        return Client::select();
    }

    public function TableStruct()
    {
        $datatable = new DatatableClass();

        //Table Data Column

        $datatable->addQuery($this->searchClient());
        $datatable->tableColumn('name', 'Name');
        $datatable->tableColumn('identification', 'Identification');
        $datatable->tableColumn('email', 'Email');
        $datatable->tableColumn('created_at', 'Created');

        $datatable->formatDate('created_at', 'd-m-Y');
        $datatable->formatEmail('email', 'email');


        $datatable->tableAvailableButtons(true);
        $datatable->tablePositionOptions('end');

        //Table Data Column Options

        $datatable->tableButton('create', 'event', 'createClient');
        $datatable->tableButton('create', 'icon', 'fa fa-edit');
        $datatable->tableButton('create', 'style', 'color:teal');
        $datatable->tableButton('create', 'title', 'Edit item');

        $this->tableArr = $datatable->getDatatableStruct();
    }

    public function createClient($id = null)
    {
        $this->emit('clientChangePage', 'create', $id);
    }

    public function render()
    {
        return view('livewire.client.index');
    }
}
