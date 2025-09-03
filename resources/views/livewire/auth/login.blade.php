<div class="card my-5">
    <div class="card-body">
        <form wire:submit.prevent="login">
            <div class="d-flex justify-content-between align-items-end mb-4">
                <h3 class="mb-0"><b>Gestión de Tickets</b></h3>
            </div>
            <div class="form-group mb-3">
                <label class="form-label">DNI</label>
                <input type="text" id="dni" class="form-control @error('dni') is-invalid @elseif($dni) is-valid @endif"
                    wire:model="dni" placeholder="Ingrese su DNI">
                @error('dni')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="form-group mb-3">
                <label class="form-label">Contraseña</label>
                <input type="password" id="password"
                    class="form-control @error('password') is-invalid @elseif($password) is-valid @endif"
                    wire:model="password" placeholder="Ingrese su contraseña">
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-grid mt-4">
                <button type="submit" class="btn btn-primary">Iniciar sesión</button>
            </div>
        </form>
    </div>
</div>
