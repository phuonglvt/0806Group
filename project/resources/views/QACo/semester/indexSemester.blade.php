@extends('layouts.QACo')

@section('custom-css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/dataTables.bootstrap.min.css" /><!-- CSS -->
    <link rel="stylesheet" href="https//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css" />
    <!-- Default theme -->
    <link rel="stylesheet" href="https//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css" />
@endsection

@section('content')
    <div class="container">
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">List Semester</li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">List Semester</h6>
                <a class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Create Semester 
                </a>
            </div>
            <div class="card-body">
                <table id="users-table" class="table table-condensed col-12">
                    <thead class="thread-light">
                        <tr>
                            <th scope="col">Semester Name</th>
                            <th scope="col">Deadline</th>
                            <th scope="col">Mission</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Create new Semester</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('admin.semester.createSmt') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Semester name:</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="end_day">Deadline:</label>
                            <input type="datetime-local" name="end_day" class="form-control" id="end_day"
                                placeholder="">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-warning">Add Semester</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('custom-js')
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{{ url('/admin/semester/dt-row-data') }}',
                columns: [{
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'end_day',
                        name: 'end_day',
                    },
                    {
                        data: 'mission',
                        name: 'mission',
                    },
                    {
                        data: 'action',
                        name: 'action'
                    }
                ]
            });
            $('#users-table_wrapper').removeClass('form-inline');
        });
    </script>
@endsection