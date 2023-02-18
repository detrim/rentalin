@extends('layout.main')
@extends('layout.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>Create Ren-Mobil</b> </h4>
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
                                    <a href=" {{ url('metode-payment') }} " class="btn btn-success btn-sm">
                                        <i class="fa fa-undo"></i> Back
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
                                                <form action="{{ url('metode-payment-post') }}" method="post"
                                                    enctype="multipart/form-data">
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
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nomor Rekening</label>
                                                                        <input type="text" value="{{ old('rk') }}"
                                                                            placeholder="Nomor Rekening" name="rk"
                                                                            class="form-control @error('rk') is-invalid @enderror">
                                                                        @error('rk')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>


                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Rekening Bank</label>
                                                                        <input type="text" name="nama_rk"
                                                                            class="form-control @error('nama_rk') is-invalid @enderror"
                                                                            placeholder="Nama Rekening Bank"
                                                                            value="{{ old('nama_rk') }}">
                                                                        @error('nama_rk')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Nama Pemilik</label>
                                                                        <input type="Text" name="nama"
                                                                            class="form-control @error('nama') is-invalid @enderror"
                                                                            placeholder="Nama Pemilik Rekening"
                                                                            value="{{ old('nama') }}">
                                                                        @error('nama')
                                                                            <small
                                                                                class="text-danger ">{{ $message }}</small>
                                                                        @enderror
                                                                    </div>
                                                                </div>

                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label>Icon Logo Bank</label>
                                                                        <div class="input-group">
                                                                            <div class="custom-file">
                                                                                <input type="file" name="icon"
                                                                                    id="photos"
                                                                                    class="custom-file-input @error('photos') is-invalid @enderror"
                                                                                    onchange="previewImgCreate()">
                                                                                @error('photos')
                                                                                    <small
                                                                                        class="text-danger ">{{ $message }}</small>
                                                                                @enderror
                                                                                <label class="custom-file-label">Pilih
                                                                                    Berkas</label>

                                                                            </div>

                                                                        </div>
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

    </div>
@endsection
