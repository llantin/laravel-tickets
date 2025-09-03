<div wire:ignore.self id="resolve-ticket" class="modal fade" tabindex="-1" aria-hidden="true" data-bs-backdrop="static">
    <div class="modal-dialog">
        <form wire:submit.prevent="update">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Resolver ticket</h4>
                </div>
                <div class="modal-body">
                    <p>¿Seguro que quieres resolver este ticket?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </div>
            </div>
        </form><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

<script>
    window.addEventListener('show-resolve-ticket', () => {
        $('#resolve-ticket').modal('show');
    });
    window.addEventListener('hide-resolve-ticket', () => {
        $('#resolve-ticket').modal('hide');
    });
</script>
