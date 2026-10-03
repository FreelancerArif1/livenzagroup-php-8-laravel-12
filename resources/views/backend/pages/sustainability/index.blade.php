@extends('backend.layouts.app')
@section('title', 'User | ' . Helper::getSettings('application_name') ?? 'Livenza Group')
@section('content')
    <div class="bo-container">

        @if (Session::has('message'))
            <div class="alert alert-success" role="alert">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="heading_button profile-heading">
            <div class="row">
                <div class="col-md-6">
                    <h1 style="margin: 0;padding-top: 5px; padding-bottom: 5px; font-size: 18px;">Companies</h1>
                </div>
                <div class="col-md-6 text-end">
                    <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#CreateModalOpen">Add
                        New</button>
                </div>
            </div>
        </div>
        <div class="user-profile-details">
            <table id="dataTable" class="table table-bordered">
                <thead>
                    <tr>
                        <th></th>
                        <th>Title</th>
                        <th>Status</th>
                        <th class="action_column">Action</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    @include('backend.pages.sustainability.modal');
    <script>
        $(document).ready(function() {

            $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                responsive: true,
                searching: false,
                //dom: 'Bfrtip',
                columnDefs: [{
                    targets: -1, // last column
                    className: 'action_column_td'
                }],

                buttons: [
                    'print',
                    'copy',
                    'excel',
                    'csv',
                    'pdf'
                ],

                ajax: {
                    url: "{{ route('admin.sustainability.list') }}",
                    type: 'GET'
                },

                columns: [{
                        data: 'banner_image',
                        name: 'banner_image'
                    },
                    {
                        data: 'banner_title',
                        name: 'banner_title'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    }
                ]
            });

        });
    </script>

    <script src="{{ asset('/backend/js/') }}/action.js"></script>

    <script>
        $(document).on('click', '.video_remove_absulate', function(e) {
            e.preventDefault();


            const table = $(this).data('table');
            const column = $(this).data('column');
            const file = $(this).data('file');
            const id = $(this).data('id');

            Swal.fire({
                title: 'Are you sure to delete?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '/admin/empty-a-table-column',
                        type: 'POST', // must be POST
                        data: {
                            _token: $('meta[name="csrf-token"]').attr('content'),
                            table: table,
                            id: id,
                            column: column,
                            file: file,
                        },
                        success: function(response) {
                            if (response.status == 1) {
                                Swal.fire({
                                    title: 'Deleted!',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    $('.' + column).hide();
                                    // window.location
                                    //     .reload();
                                });
                            } else {
                                Swal.fire('Error', response.message, 'error');
                            }
                        },
                        error: function(xhr) {
                            Swal.fire('Error', 'Something went wrong!', 'error');
                        }
                    });
                }
            });
        });
    </script>
@endsection
