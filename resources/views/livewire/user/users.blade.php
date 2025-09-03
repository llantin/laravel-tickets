<div class="table-responsive">
    <table class="table table-hover text-nowrap mb-0" id="users-table">
        <thead class="bg-light-subtle">
            <tr>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Nombre</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">DNI</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Rol</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Fecha de registro</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Acciones
                </th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
<script>
    $(document).ready(function() {
        var tabla = $('#users-table').DataTable({
            ajax: '/usuarios/json',
            columns: [{
                    data: 'name',
                    className: 'text-center py-1'
                },
                {
                    data: 'dni',
                    className: 'text-center py-1'
                },
                {
                    data: 'role',
                    className: 'text-center py-1'
                },
                {
                    data: 'created_at',
                    className: 'text-center py-1',
                    render: function(data, type, row) {
                        return data ? data.split('T')[0] : '';
                    }
                },
                {
                    data: null,
                    className: 'text-center py-1',
                    orderable: false,
                    render: function(data, type, row) {
                        return `
                                <button class="btn btn-warning btn-icon btn-sm" @click="$dispatch('edit-user', { id: ${row.id} })"> <i class="ti ti-edit fs-16"></i></button>
                                <button class="btn btn-danger btn-icon btn-sm" @click="$dispatch('delete-user', { id: ${row.id} })"> <i class="ti ti-trash fs-16"></i></button>
                        `;
                    }
                }
            ],
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                paginate: {
                    previous: "<",
                    next: ">"
                }
            },
            pagingType: 'simple_numbers',
        });
        Livewire.on('reload-users', () => {
            tabla.ajax.reload(null, false);
        });
    });
</script>
