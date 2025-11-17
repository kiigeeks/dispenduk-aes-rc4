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
                            <form
                                action="{{ route("people.update", $data) }}"
                                method="POST" 
                                enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="name">Fullname</label>
                                                <input type="text"
                                                    class="form-control @error('name') is-invalid @enderror"
                                                    id="name" name="name" placeholder="Fullname" required
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
                                                    id="nik" name="nik" placeholder="NIK" required
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
                                                    id="birthday" name="birthday" placeholder="Tanggal Lahir" required
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
                                                    id="birthplace" name="birthplace" placeholder="Tempat Lahir" required
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
                                                <select 
                                                    class="form-control @error('gender') is-invalid @enderror"
                                                    id="gender" 
                                                    name="gender"
                                                    required
                                                >
                                                    <option value="" disabled selected>Pilih Gender</option>
                                                    <option value="Laki-laki" {{ old('gender', $data->gender) == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                                    <option value="Perempuan" {{ old('gender', $data->gender) == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
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
                                                    <option value="Islam" {{ old('religion', $data->religion) == 'Islam' ? 'selected' : '' }}>Islam</option>
                                                    <option value="Protestan" {{ old('religion', $data->religion) == 'Protestan' ? 'selected' : '' }}>Protestan</option>
                                                    <option value="Katolik" {{ old('religion', $data->religion) == 'Katolik' ? 'selected' : '' }}>Katolik</option>
                                                    <option value="Hindu" {{ old('religion', $data->religion) == 'Hindu' ? 'selected' : '' }}>Hindu</option>
                                                    <option value="Buddha" {{ old('religion', $data->religion) == 'Buddha' ? 'selected' : '' }}>Buddha</option>
                                                    <option value="Khonghucu" {{ old('religion', $data->religion) == 'Khonghucu' ? 'selected' : '' }}>Khonghucu</option>
                                                </select>
                                                @error('religion')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="plaintext">Plainteks</label>
                                                    <textarea
                                                        class="form-control @error('plaintext') is-invalid @enderror"
                                                        id="plaintext"
                                                        name="plaintext"
                                                        rows="3" readonly
                                                        required>{{ $dataJson }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="key">Key</label>
                                                <input type="text"
                                                    class="form-control @error('key') is-invalid @enderror"
                                                    id="key" name="key" readonly
                                                    value="{{ env('ENCRYPT_KEY') }}">
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label for="aes">Response Time AES</label>
                                                <input type="text"
                                                    class="form-control @error('aes') is-invalid @enderror"
                                                    id="aes" name="aes" placeholder="AES Time" required readonly
                                                    value="{{ number_format($data->aes_time, 8) }} seconds">
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
                                                    value="{{ number_format($data->rc4_time, 8) }} seconds">
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
                                                    value="{{ number_format($data->total_time, 8) }} seconds">
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
                                                    value="{{ $data->aes_memory }} byte">
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
                                                    value="{{ $data->rc4_memory }} byte">
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
                                                    value="{{ $data->total_memory }} byte">
                                                @error('rc4')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
                                        <div class="col-md-12">
                                            <h3 class="mb-4">Hasil Pengujian Avalanche Effect</h3>


                                            <h5 class="mb-2">Skenario 1 : Plainteks beda 1 karakter</h5>
                                            <div class="row mb-4">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="AES">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case2['aes_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case2['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case2['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks AES</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="3" readonly
                                                            required>{{ $case2['aes_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="RC4">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case2['rc4_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case2['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case2['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks RC4</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="3" readonly
                                                            required>{{ $case2['rc4_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="AES+RC4">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case2['aes_rc4_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case2['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case2['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks AES+RC4</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="5" readonly
                                                            required>{{ $case2['aes_rc4_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <h5 class="mb-2">Skenario 2 : Key beda 1 karakter</h5>
                                            <div class="row mb-4">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="AES">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case3['aes_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case3['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case3['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks AES</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="3" readonly
                                                            required>{{ $case3['aes_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="RC4">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case3['rc4_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case3['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case3['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks RC4</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="3" readonly
                                                            required>{{ $case3['rc4_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="AES+RC4">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case3['aes_rc4_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case3['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case3['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks AES+RC4</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="5" readonly
                                                            required>{{ $case3['aes_rc4_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>


                                            <h5 class="mb-2">Skenario 3 : Plainteks dan Key beda 1 karakter</h5>
                                            <div class="row mb-4">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="AES">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case4['aes_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case4['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case4['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks AES</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="3" readonly
                                                            required>{{ $case4['aes_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="RC4">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case4['rc4_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case4['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case4['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks RC4</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="3" readonly
                                                            required>{{ $case4['rc4_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="methtod">Metode</label>
                                                        <input type="text"
                                                            class="form-control @error('methtod') is-invalid @enderror"
                                                            id="methtod" name="methtod" readonly
                                                            value="AES+RC4">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="avalanche">Avalanche Effect</label>
                                                        <input type="text"
                                                            class="form-control @error('avalanche') is-invalid @enderror"
                                                            id="avalanche" name="avalanche" readonly
                                                            value="{{ $case4['aes_rc4_avalanche'] }} %">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="key">Key</label>
                                                        <input type="text"
                                                            class="form-control @error('key') is-invalid @enderror"
                                                            id="key" name="key" readonly
                                                            value="{{ $case4['key'] }}">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="plaintext">Plainteks</label>
                                                        <textarea
                                                            class="form-control @error('plaintext') is-invalid @enderror"
                                                            id="plaintext"
                                                            name="plaintext"
                                                            rows="3" readonly
                                                            required>{{ $case4['plaintext'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-12 mb-2">
                                                    <div class="form-group">
                                                        <label for="chiperteks">Chiperteks AES+RC4</label>
                                                        <textarea
                                                            class="form-control @error('chiperteks') is-invalid @enderror"
                                                            id="chiperteks"
                                                            name="chiperteks"
                                                            rows="5" readonly
                                                            required>{{ $case4['aes_rc4_cipher'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
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