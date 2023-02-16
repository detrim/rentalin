@extends('ui.main')
@extends('ui.layout.sidebarui')

@section('contentui')
    <div class="content-wrapper" style="margin-top: -80px">
        <!-- Content Header (Page header) -->
        <br><br>
        <section class="content-header" style="margin-top:60px">
            <hr>
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>UI-Mobil</b> </h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data</li>
                        </ol>
                    </div>
                </div>
                <hr>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-right">

                                    <a href=" {{ url('ui-mobil') }} " class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-rotate-left"></i> Back
                                    </a>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <!-- left column -->
                                            <div class="col-md-12">
                                                <!-- general form elements -->


                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <form>
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">

                                                                <img src="{{ asset('storage/' . $mobil->photos) }}"
                                                                    class="img-thumbnail ">

                                                            </div>
                                                        </div>

                                                        <div class="col-md-8">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Kode</label>
                                                                        <p>{{ $mobil->kode }}</p>
                                                                        <hr style="margin-top: -15px">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Mobil</label>
                                                                        <p>{{ $mobil->nama_mobil }}</p>
                                                                        <hr style="margin-top: -15px">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Warna</label>
                                                                        <p>{{ $mobil->warna }}</p>
                                                                        <hr style="margin-top: -15px">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nopol</label>
                                                                        <p>{{ $mobil->nopol }}</p>
                                                                        <hr style="margin-top: -15px">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Harga Sewa</label>
                                                                        <p>Rp.
                                                                            {{ number_format($mobil->harga_sewa, 0, ',', '.') }},-/hari
                                                                        </p>
                                                                        <hr style="margin-top: -15px">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <p>{{ $mobil->status }}</p>
                                                                        <hr style="margin-top: -15px">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>

                                                    <!-- /.card-body -->

                                                </form>

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
        <section class="content">
            <div class="container-fluid">

                <div class=" card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('storage/' . $mobil->photos) }}" alt="User Image">
                            <span class="username"><a href="#">Sewa Mobil {{ $mobil->nama_mobil }} -
                                    {{ $mobil->kode }}</a></span>
                            <span class="description">{{ $mobil->warna }} - {{ $mobil->nopol }} </span>
                        </div>
                        <!-- /.user-block -->
                        <div class="card-tools">

                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>

                        </div>
                        <!-- /.card-tools -->
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <div class="row">
                            <!-- left column -->
                            <div class="col-md-12">
                                <!-- general form elements -->


                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ url('next-mobil/uinext') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">

                                                <img src="{{ asset('assets/img/default.jpg') }}"
                                                    class="img-thumbnail img-preview">

                                            </div>
                                        </div>

                                        <div class="col-md-8">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card text-center">
                                                        <label>Faktur</label>
                                                        <p>{{ $faktur }}</p>
                                                        {{-- <hr style="margin-top: -15px"> --}}
                                                        <input type="hidden" name="faktur" value="{{ $faktur }}">
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="hidden" name="kode" value="{{ $mobil->kode }}"
                                                class="form-control">

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>NIK</label>
                                                        <input type="text" value="{{ old('nik') }}" name="nik"
                                                            class="form-control nik @error('nik') is-invalid @enderror">
                                                        @error('nik')
                                                            <small class="text-danger ">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Photo KTP</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="ktp" id="photos"
                                                                class="custom-file-input @error('photos') is-invalid @enderror"
                                                                onchange="previewImgCreate()">
                                                            @error('photos')
                                                                <small class="text-danger ">{{ $message }}</small>
                                                            @enderror
                                                            <label class="custom-file-label">Pilih
                                                                Berkas</label>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Nama</label>
                                                        <input type="Text" name="nama"
                                                            class="form-control @error('nama') is-invalid @enderror"
                                                            placeholder="Nama sesuai ktp" value="{{ old('nama') }}">
                                                        @error('nama')
                                                            <small class="text-danger ">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>No Telp</label>
                                                        <input type="text" name="no_telp"
                                                            class="form-control @error('no_telp') is-invalid @enderror"
                                                            placeholder="Nomor Telepone" value="{{ old('no_telp') }}">
                                                        @error('no_telp')
                                                            <small class="text-danger ">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Sewa</label>
                                                        <input type="datetime-local" name="tgl_sewa"
                                                            class="form-control @error('tgl_sewa') is-invalid @enderror"
                                                            placeholder="tgl Sewa" value="{{ old('tgl_sewa') }}"
                                                            id="d1" onchange="calday()">
                                                        @error('tgl_sewa')
                                                            <small class="text-danger ">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Tanggal Kembali</label>
                                                        <input type="datetime-local" name="tgl_kembali"
                                                            class="form-control @error('tgl_kembali') is-invalid @enderror"
                                                            placeholder="tgl kembali" value="{{ old('tgl_kembali') }}"
                                                            id="d2" onchange="calday()">
                                                        @error('tgl_kembali')
                                                            <small class="text-danger ">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card text-center">
                                                        <p class="mt-2"> <span id="output"></span>&nbsp hari</p>
                                                    </div>
                                                </div>
                                            </div>
                                            @php
                                                $kosong = $mobil->status;
                                            @endphp
                                            @if ($kosong == 'Kosong')
                                            @else
                                                <div class="card-footer text-right">
                                                    <button type="submit" class="btn btn-primary"
                                                        onclick="javascript: return confirm('Apakah data sudah benar ?')">Submit</button>
                                                </div>
                                            @endif

                                        </div>
                                    </div>

                                    <!-- /.card-body -->

                                </form>

                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <!-- /.card-footer -->
                </div>
            </div>

        </section>

    </div>
@endsection
