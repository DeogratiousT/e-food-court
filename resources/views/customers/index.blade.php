@extends('layouts.main')

@section('main-content')
    <h3>Customers</h3>
    <div class="py-2">
        <table id="customers-laratable" class="table table-hover table-centered w-100 dt-responsive nowrap">
            <thead class="thead-light">
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>No. of Orders</th>
                </tr>
            </thead>
        </table>
        
        <script>
            $(document).ready(function(){
                $("#customers-laratable").DataTable({
                    serverSide: true,
                    ajax: "{{ route('customers.index') }}",
                    columns: [
                        { name: 'name' },
                        { name: 'email' },
                        { name: 'phone_number' },
                        { name: 'action' , orderable: false, searchable: false }                                
                    ]
                });
            });
        </script>
    </div>

@endsection