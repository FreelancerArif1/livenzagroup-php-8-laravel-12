@extends('backend.layouts.app')
@section('title', 'User | ' . Helper::getSettings('application_name') ?? 'Welly international trading')
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
                    <h1 style="margin: 0;padding-top: 5px;    font-size: 18px;">Service Category</h1>
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
                        <!-- <th></th> -->
                        <th>Title</th>
                        <th>Serial</th>
                        <th>Status</th>
                        <th class="action_column">Action</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    @include('backend.pages.servicecategory.modal');
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
                    url: "{{ route('admin.servicecategory.list') }}",
                    type: 'GET'
                },

                columns: [
                    // {
                    //     data: 'image',
                    //     name: 'image'
                    // },
                    {
                        data: 'title',
                        name: 'title'
                    },

                    {
                        data: 'serial',
                        name: 'serial'
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
@endsection
