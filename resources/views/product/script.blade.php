@section('hearder-scripts')
    <!-- third party css -->
    <link href="{{ asset('css/vendor/dataTables.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendor/responsive.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendor/buttons.bootstrap4.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('scripts')
    <!-- third party js -->
    @include('partial.datatables-imports')

    <script>
        $(function() {

            var table = $("#productsTable").DataTable({
                columnDefs: [{
                    "targets": 0, // first column only center
                    "className": "text-center",
                }],
                autoWidth: false,
                serverSide: true,
                processing: true,
                lengthChange: true,
                dom: 'lfrtip',
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, 100, 200, -1],
                    [10, 25, 50, 100, 200, "{{ __('All') }}"]
                ],
                language: {
                    "url": "{{ asset('i18n/' . config('app.locale') . '.json') }}"
                },
                ajax: {
                    url: "{{ route('products.index') }}",
                    data: function(data) {
                        data.category = $('#category').val();
                    },
                },
                columns: [{
                        data: function(data, type, full, meta) {
                            return meta.row + 1;
                        },
                        name: 'id',
                        searchable: false
                    },
                    {
                        data: "name",
                        name: 'name'
                    },
                    {
                        data: "category",
                        name: 'category'
                    },
                    {
                        data: function(data) {
                            switch (data.status) {
                                case 1:
                                    return `<span class='badge bg-success rounded-pill'>{{ __('Active') }}</span>`;
                                    break;

                                case 0:
                                    return `<span class='badge bg-danger rounded-pill'>{{ __('Inactive') }}</span>`;
                                    break;
                            }
                        },
                        name: 'status'
                    },
                    {
                        data: "created_at",
                        name: 'created_at'
                    },

                    {
                        class: "text-center",
                        data: function(data) {
                            return `<a
                            href="${data.show_route}"
                            data-bs-toggle="tooltip"
                            data-bs-placement="top"
                            title="{{ __('Show') }}"
                            ><i class="mdi mdi-18px mdi-eye me-2 text-muted vertical-middle"></i>
                            </a>` + `<span style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#delete-header-modal" data-id="${data.id}" class="deleteProduct">
                                        <a data-bs-toggle="tooltip" data-bs-placement="top"title="{{ __('Delete') }}">
                                            <i class="mdi mdi-18px mdi mdi-trash-can-outline me-2 text-muted vertical-middle"></i>
                                        </a>
                                    </span>` + `<a href="${data.edit_route}"
                                data-bs-toggle="tooltip"
                                data-bs-placement="top"
                                title="{{ __('Edit') }}"
                                ><i class="mdi mdi-18px mdi-square-edit-outline me-2 text-muted vertical-middle"></i></a>`;
                        },
                        orderable: false,
                        searchable: false
                    }
                ],
            });

            $('#category').on('change', function() {
                table.draw();
            });

            $(document).on('click', '.deleteProduct', function() {
                productId = $(this).attr('data-id');
            });

            $(document).on('click', '#deleteButton', function() {
                $('#delete-header-modal').modal('hide');
                var url = '{{ route('products.destroy', ':id') }}';
                url = url.replace(':id', productId);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });
                $.ajax({
                    url: url,
                    type: 'delete',
                    dataType: 'json',
                    success: function(data) {
                        $.NotificationApp.send("", "{{ __('Deleted Successfully') }}",
                            "top-right", "rgba(0,0,0,0.2)",
                            "success");
                        table.draw();
                    },
                    error: function(data) {}
                });
            });

            table.on('draw', function() {
                var tooltipTriggerList = [].slice.call(
                    document.querySelectorAll('[data-bs-toggle="tooltip"]')
                );
                var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                    return new bootstrap.Tooltip(tooltipTriggerEl);
                });
            });
        });
    </script>
@endsection
