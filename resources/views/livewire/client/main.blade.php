<div>
    @if($shownPage == 'index')
        @livewire('client.index')
    @elseif($shownPage == 'create')
        @livewire('client.create', ['client_id' => $client_id])
    @endif
</div>
