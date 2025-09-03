<div class="table-responsive">
    <table class="table table-hover text-nowrap mb-0" id="tickets-table">
        <thead class="bg-light-subtle">
            <tr>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Titulo</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Descripcion</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Estado</th>
                @if (auth()->guard('web')->check())
                    <th class="fs-12 text-uppercase text-muted py-1 text-center">Resolver</th>
                @endif
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Fecha de apertura</th>
                <th class="fs-12 text-uppercase text-muted py-1 text-center">Fecha de solución</th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>
</div>

<script>
    $(document).ready(function () {
        var tipo = "{{ auth()->guard('web')->check() ? 'usuario' : 'cliente' }}";
        console.log(tipo);

        // Definir columnas base
        var columnas = [
            { data: 'title', className: 'text-center py-1' },
            { data: 'description', className: 'text-center py-1' },
            {
                data: 'state',
                className: 'text-center py-1',
                render: function (data) {
                    return data == 'Pendiente'
                        ? '<span class="badge text-bg-warning text-dark">Pendiente</span>'
                        : '<span class="badge text-bg-success">Resuelto</span>';
                }
            }
        ];

        // Si es usuario, agregamos la columna de resolver
        if (tipo === 'usuario') {
            columnas.push({
                data: null,
                className: 'text-center py-1',
                render: function (data, type, row) {
                    if (row.state == 'Pendiente') {
                        return `
                            <button class="btn btn-success btn-icon btn-sm resolve-ticket" @click="$dispatch('resolve-ticket', { id: ${row.id} })">
                                <i class="ti ti-check fs-16"></i>
                            </button>`;
                    } else {
                        return `
                            <button disabled class="btn btn-success btn-icon btn-sm">
                                <i class="ti ti-check fs-16"></i>
                            </button>`;
                    }
                }
            });
        }

        // Agregar columnas finales (fechas)
        columnas.push(
            { data: 'opened_at', className: 'text-center py-1' },
            {
                data: 'closed_at',
                className: 'text-center py-1',
                render: function (data) {
                    return data ?? 'No resuelto';
                }
            }
        );

        var tabla = $('#tickets-table').DataTable({
            ajax: '/tickets/json',
            columns: columnas,
            language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.6/i18n/es-ES.json',
                paginate: { previous: "<", next: ">" }
            },
            pagingType: 'simple_numbers',
        });

        Livewire.on('reload-tickets', () => {
            tabla.ajax.reload(null, false);
        });
    });
</script>