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
                    <div class="col-12">
                        <!-- general form elements -->
                        <div class="card card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">{{ $menu }}</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Fullname</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Fullname" required readonly
                                                    value="{{ old('name', $data->name) }}">
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
                                                    id="nik" name="nik" placeholder="NIK" required readonly
                                                    value="{{ old('nik', $data->nik) }}">
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
                                                    id="birthday" name="birthday" placeholder="Tanggal Lahir" required readonly
                                                    value="{{ old('birthday', $data->birthday) }}">
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
                                                    id="birthplace" name="birthplace" placeholder="Tempat Lahir" required readonly
                                                    value="{{ old('birthplace', $data->birthplace) }}">
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
                                                <input type="text"
                                                    class="form-control @error('gender') is-invalid @enderror"
                                                    id="gender" name="gender" placeholder="Jenis Kelamin" required readonly
                                                    value="{{ old('gender', $data->gender) }}">
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
                                                <input type="text"
                                                    class="form-control @error('religion') is-invalid @enderror"
                                                    id="religion" name="religion" placeholder="Agama" required readonly
                                                    value="{{ old('religion', $data->religion) }}">
                                                @error('religion')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    {{-- <div class="row mt-5">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="aes">Response Time AES</label>
                                                <input type="text"
                                                    class="form-control @error('aes') is-invalid @enderror"
                                                    id="aes" name="aes" placeholder="AES Time" required readonly
                                                    value="{{ number_format($result->aes_time, 8) }} seconds">
                                                @error('aes')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rc4">Response Time RC4</label>
                                                <input type="text"
                                                    class="form-control @error('rc4') is-invalid @enderror"
                                                    id="rc4" name="rc4" placeholder="RC4 Time" required readonly
                                                    value="{{ number_format($result->rc4_time, 8) }} seconds">
                                                @error('rc4')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rc4">Response Time AES+RC4</label>
                                                <input type="text"
                                                    class="form-control @error('rc4') is-invalid @enderror"
                                                    id="rc4" name="rc4" placeholder="AES+RC4 Time" required readonly
                                                    value="{{ number_format($result->total_time, 8) }} seconds">
                                                @error('rc4')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="aes">Memory AES</label>
                                                <input type="text"
                                                    class="form-control @error('aes') is-invalid @enderror"
                                                    id="aes" name="aes" placeholder="AES Memory" required readonly
                                                    value="{{ $result->aes_memory }} byte">
                                                @error('aes')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rc4">Memory RC4</label>
                                                <input type="text"
                                                    class="form-control @error('rc4') is-invalid @enderror"
                                                    id="rc4" name="rc4" placeholder="RC4 Memory" required readonly
                                                    value="{{ $result->rc4_memory }} byte">
                                                @error('rc4')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="rc4">Memory AES+RC4</label>
                                                <input type="text"
                                                    class="form-control @error('rc4') is-invalid @enderror"
                                                    id="rc4" name="rc4" placeholder="AES+RC4 Memory" required readonly
                                                    value="{{ $result->total_memory }} byte">
                                                @error('rc4')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div> --}}
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
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