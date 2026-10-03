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
                        <th>Banner Title</th>
                        <th>Story Title</th>
                        <th>Mission Title</th>
                        <th>Vision Title</th>
                        <th class="action_column">Action</th>
                    </tr>
                </thead>
            </table>

        </div>
    </div>
    @include('backend.pages.about.modal');
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
                    url: "{{ route('admin.about.list') }}",
                    type: 'GET'
                },

                columns: [{
                        data: 'baner_title',
                        name: 'baner_title'
                    },
                    {
                        data: 'story_title',
                        name: 'story_title'
                    },
                    {
                        data: 'mission_title',
                        name: 'mission_title'
                    },
                    {
                        data: 'vision_title',
                        name: 'vision_title'
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
