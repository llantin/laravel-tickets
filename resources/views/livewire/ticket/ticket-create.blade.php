<div class="card">
    <div class="card-header">
        <h5>Llena los datos y envia tu ticket para solucionar tu problema.</h5>
    </div>
    <div class="card-body">
        <form wire:submit.prevent="create">
            <div class="row">
                <div class="col">
                    <form>
                        <div class="mb-3">
                            <label class="form-label" for="title">Titulo</label>
                            <input type="text"
                                class="form-control @error('title') is-invalid @elseif($title) is-valid @endif"
                                id="title" wire:model="title" placeholder="Ingresa el titulo.">
                            @error('title')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="description">Descripcion del ticket</label>
                            <textarea
                                class="form-control @error('description') is-invalid @elseif($description) is-valid @endif"
                                id="description" rows="3" wire:model="description"
                                placeholder="Describe el problema que estas experimentando."></textarea>
                            @error('description')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Crear ticket</button>
                    </form>
                </div>
            </div>
        </form>
    </div>
</div>
