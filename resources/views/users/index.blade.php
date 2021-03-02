@extends('layouts.main')

@section('main-content')
    <div class="py-2">
        <table id="users-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Roles</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
        </table>
        <script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
        <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
        <script>
            $(document).ready(function(){
                $("#users-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('users.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'email' },
                        { name: 'role' , orderable: false, searchable: false },
                        { name: 'state' , orderable: false, searchable: false },
                        { name: 'action' , orderable: false, searchable: false }                                
                    ]
                });
            });
        </script>
    </div>

@endsection