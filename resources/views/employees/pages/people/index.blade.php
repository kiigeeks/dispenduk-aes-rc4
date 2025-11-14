@extends('employees.layouts.main')

@section('container')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">{{ $menu }}</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/secretgate/">Home</a></li>
                            <li class="breadcrumb-item active">{{ $menu }}</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">List Datas</h3>
                                <a href="{{ route("people.create") }}" class="btn btn-success float-right">Add New</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Time</th>
                                            <th>Name</th>
                                            <th>NIK</th>
                                            <th>Response Time</th>
                                            <th>Total Memory</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($datas as $data)
                                            <tr>
                                                <td>{{ $data->created_at->format('d-M-Y H:i') }}</td>
                                                <td>{{ $data->name }}</td>
                                                <td>{{ $data->nik }}</td>
                                                <td>{{ number_format($data->total_time, 8) }} seconds</td>
                                                <td>{{ $data->total_memory }} byte</td>
                                                {{-- <td>{{ number_format($data->total_memory / 1024, 2) }} KB</td>
                                                <td>{{ number_format($data->total_memory / 1048576, 2) }} MB</td>
                                                <td>{{ number_format($data->total_memory / 1073741824, 2) }} GB</td> --}}
                                                <td>
                                                    <div class="d-flex ">
                                                        <a href="{{ route("people.show", $data) }}" class="btn btn-primary mx-1" id="detail"> Detail</a>
                                                        <a href="{{ route('people.destroy', $data) }}" class="btn btn-danger mx-1" data-confirm-delete="true">Delete</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
