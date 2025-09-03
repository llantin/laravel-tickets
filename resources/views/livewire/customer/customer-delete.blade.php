<div wire:ignore.self id="delete-customer" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="destroy">
            <div class="modal-content">
                <div class="modal-body">
                    <p>¿Esta seguro de eliminar el cliente?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Si, eliminar</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    window.addEventListener('show-delete-customer', () => {
        $('#delete-customer').modal('show');
    });
    window.addEventListener('hide-delete-customer', () => {
        $('#delete-customer').modal('hide');
    });
</script>
