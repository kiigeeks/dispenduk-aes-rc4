@extends('employees.layouts.main')

@push('prepend-style')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.8/dist/trix.css">
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.8/dist/trix.umd.min.js"></script>
@endpush

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
                            <li class="breadcrumb-item"><a href="{{ route('admin-home') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('people.index') }}">People</a></li>
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

                    <!-- bottom column -->
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $menu }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form
                                action="{{ route("people.store") }}"
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Fullname</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Fullname" required
                                                    value="{{ old('name') }}">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="nik">NIK</label>
                                                <input type="text"
                                                    class="form-control @error('nik') is-invalid @enderror"
                                                    id="nik" name="nik" placeholder="NIK" required
                                                    value="{{ old('nik') }}">
                                                @error('nik')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birthday">Tanggal Lahir</label>
                                                <input type="date"
                                                    class="form-control @error('birthday') is-invalid @enderror"
                                                    id="birthday" name="birthday" placeholder="Tanggal Lahir" required
                                                    value="{{ old('birthday') }}">
                                                @error('birthday')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="birthplace">Tempat Lahir</label>
                                                <input type="text"
                                                    class="form-control @error('birthplace') is-invalid @enderror"
                                                    id="birthplace" name="birthplace" placeholder="Tempat Lahir" required
                                                    value="{{ old('birthplace') }}">
                                                @error('birthplace')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="gender">Jenis Kelamin</label>
                                                <select 
                                                    class="form-control @error('gender') is-invalid @enderror"
                                                    id="gender" 
                                                    name="gender"
                                                    required
                                                >
                                                    <option value="" disabled selected>Pilih Gender</option>
                                                    <option value="Laki-laki" {{ old('gender') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ old('gender') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                                </select>
                                                @error('gender')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="religion">Agama</label>
                                                <select 
                                                    class="form-control @error('religion') is-invalid @enderror"
                                                    id="religion" 
                                                    name="religion"
                                                    required
                                                >
                                                    <option value="" disabled selected>Pilih Agama</option>
                                                    <option value="Islam" {{ old('religion') == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Protestan" {{ old('religion') == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                                    <option value="Katolik" {{ old('religion') == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ old('religion') == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Buddha" {{ old('religion') == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                    <option value="Khonghucu" {{ old('religion') == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                                </select>
                                                @error('religion')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Submit</button>
                                    <a href={{ route("people.index") }} class="btn btn-danger">Back</a>
                                </div>
                            </form>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!--/.col (bottom) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection


@push('addon-script')
    <script src="/secretgate/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <script>
        $(function () {
          bsCustomFileInput.init();
        });
    </script>
@endpush