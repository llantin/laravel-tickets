<div wire:ignore.self id="edit-customer" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Editar cliente</h4>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" id="name" wire:model='name'
                            class="form-control @error('name') is-invalid @elseif($name) is-valid @endif">
                        @error('name')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="dni" class="form-label">DNI</label>
                            <input type="text" id="dni" wire:model='dni'
                                class="form-control @error('dni') is-invalid @elseif($dni) is-valid @endif">
                            @error('dni')
                            <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" id="email" wire:model="email"
                            class="form-control @error('email') is-invalid @elseif($email) is-valid @endif">
                        @error('email')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Número de teléfono</label>
                        <input type="tel" id="phone_number" wire:model="phone_number"
                            class="form-control @error('phone_number') is-invalid @elseif($phone_number) is-valid @endif">
                        @error('phone_number')
                        <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
<script>
    window.addEventListener('show-edit-customer', () => {
        $('#edit-customer').modal('show');
    });
    window.addEventListener('hide-edit-customer', () => {
        $('#edit-customer').modal('hide');
    });
</script>
