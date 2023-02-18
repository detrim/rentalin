@extends('layout.main')
@extends('layout.sidebar')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>Edit Ren-Mobil</b> </h4>
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
                                    <a href="{{ url('ren-mobil/' . $mobil->kode . '/detail') }}"
                                        class="btn btn-success btn-sm">
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
                                                <form action="{{ url('ren-mobil/' . $mobil->kode . '/editmobil') }}"
                                                    method="post" enctype="multipart/form-data">
                                                    @method('patch')
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col-md-4">
                                                            <div class="form-group">

                                                                <img src="{{ asset('storage/' . $mobil->photos) }}"
                                                                    class="img-thumbnail ">


                                                            </div>
                                                            <a type="button" class="btn btn-dark" data-toggle="modal"
                                                                data-target="#m-m{{ $mobil->kode }}">
                                                                <i class="fas fa-edit"></i>Ganti</a>
                                                        </div>

                                                        <div class="col-md-8">

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Kode</label>
                                                                        <input type="text" disabled
                                                                            value="{{ $mobil->kode }}"
                                                                            class="form-control">
                                                                        <input type="hidden" name="kode"
                                                                            value="{{ $mobil->kode }}"
                                                                            class="form-control">
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Mobil</label>
                                                                        <input type="text" name="nama_mobil"
                                                                            class="form-control @error('nama_mobil') is-invalid @enderror"
                                                                            placeholder="Nama Mobil"
                                                                            value="{{ $mobil->nama_mobil }}">
                                                                        @error('nama_mobil')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Warna</label>
                                                                        <input type="Text" name="warna"
                                                                            class="form-control @error('warna') is-invalid @enderror"
                                                                            placeholder="Warna Mobil"
                                                                            value="{{ $mobil->warna }}">
                                                                        @error('warna')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nopol</label>
                                                                        <input type="text" name="nopol"
                                                                            class="form-control @error('nopol') is-invalid @enderror"
                                                                            placeholder="Nomor Polisi"
                                                                            value="{{ $mobil->nopol }}">
                                                                        @error('nopol')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Harga Sewa</label>
                                                                        <input type="text" name="harga_sewa"
                                                                            class="form-control @error('harga_sewa') is-invalid @enderror"
                                                                            placeholder="Harga Sewa"
                                                                            value="{{ $mobil->harga_sewa }}">
                                                                        @error('harga_sewa')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Status</label>
                                                                        <select class="custom-select rounded-0"
                                                                            name="status">
                                                                            <option value="Tersedia">Tersedia</option>
                                                                            <option value="Kosong">Kosong</option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="card-footer text-right">
                                                                <button type="submit"
                                                                    class="btn btn-primary">Submit</button>
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

        {{-- modal --}}
        <div class="modal fade" id="m-m{{ $mobil->kode }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Ganti Foto</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12 ">
                            <form action="{{ url('ren-mobil/' . $mobil->kode . $mobil->id . '/editphotos') }}"
                                method="post" enctype="multipart/form-data">
                                @method('patch')
                                @csrf
                                <div class="form-group ">
                                    <label for="exampleInputFile">Photo Mobil</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" name="photos" id="photos"
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

                                <input type="hidden" name="oldPhotos" value="{{ $mobil->photos }}">
                                <center>

                                    <img src="{{ asset('storage/' . $mobil->photos) }}"
                                        class="img-thumbnail img-preview ">
                                </center>
                                <br>
                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>

                            </form>


                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        {{--  --}}
    </div>
@endsection
