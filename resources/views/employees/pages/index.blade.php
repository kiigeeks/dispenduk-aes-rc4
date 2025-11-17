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
                            <li class="breadcrumb-item"><a href="{{ route("admin-home") }}">Home</a></li>
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
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">Selamat Datang di Admin Page</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p>Program simulasi enkripsi dan dekripsi data penduduk menggunakan algoritma AES, RC4 dan AES + RC4.</p>
                                        <p>Parameter pengujian :
                                            <ul>
                                                <li>Respon Time yang dibutuhkan setiap algoritma enkripsi.</li>
                                                <li>Load Memory yang digunakan setiap algoritma enkripsi.</li>
                                                <li>Avalanche Effect setiap algoritma enkripsi dengan 3 Studi kasus (Plainteks yang berbeda, Key yang berbeda, dan Plainteks & Key yang berbeda).</li>
                                            </ul>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
