<div>
    <h5 class="box-title text-primary">
        Create Client
    </h5>
    <div class="row">

        <div class="col-md-12">
            <button class="btn btn-warning btn-xs float-right" style="float: right;margin-bottom: 20px" type="button" wire:click="goBack">Back</button>

            <div class="form-group row" style="margin-top: 10px">
                <label for="firstname" class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                    <input class="form-control{{ $errors->has('client.name') ? ' is-invalid' : '' }}" type="text"
                           placeholder="Name" wire:model="client.name">
                    @error('client.name')<small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="form-group row" style="margin-top: 10px">
                <label for="description" class="col-sm-3 col-form-label">Identification</label>
                <div class="col-sm-9">
                    <input class="form-control{{ $errors->has('client.identification') ? ' is-invalid' : '' }}"
                           type="text" placeholder="Identification" wire:model="client.identification">
                    @error('client.identification')<small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="form-group row" style="margin-top: 10px">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                    <input class="form-control{{ $errors->has('client.phone') ? ' is-invalid' : '' }}" type="text"
                           placeholder="Phone" wire:model="client.phone">
                    @error('client.phone')<small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="form-group row" style="margin-top: 10px">
                <label class="col-sm-3 col-form-label">Email</label>
                <div class="col-sm-9">
                    <input class="form-control{{ $errors->has('client.email') ? ' is-invalid' : '' }}" type="text"
                           placeholder="Email" wire:model="client.email">
                    @error('client.email')<small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="form-group row" style="margin-top: 10px">
                <label class="col-sm-3 col-form-label">password</label>
                <div class="col-sm-9">
                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" type="password"
                           placeholder="Password" wire:model="password">
                    @error('password')<small class="form-text text-danger">{{ $message }}</small>@enderror
                </div>
            </div>

            <div class="col-md-12" style="margin-top: 10px">
                <button class="btn btn-primary" style="float: right" wire:click="save">Save</button>
            </div>
        </div>
    </div>
</div>
