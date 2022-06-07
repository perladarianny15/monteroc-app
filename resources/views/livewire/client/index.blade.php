<div>
    <fieldset>
        <a style="padding-left: 8px; padding-right: 4px;cursor: pointer; font-size: 30px;float: right" href="javascript:window.livewire.emit('createClient')" data-bs-toggle="tooltip" data-bs-placement="top" title="New">
            <i class="fa fa-plus-circle" aria-hidden="true" style="color: #1D242B"></i>
        </a>

        <div class="row">

            <div class="col-md-8">
                <h5 class="box-title text-primary">Clients</h5>
            </div>

            <div class="col-md-12">
                @livewire('main', ['tableArr' => $tableArr], key($key))
            </div>

        </div>
    </fieldset>
</div>
