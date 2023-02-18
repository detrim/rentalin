@extends('layout.main')
@extends('layout.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>Detail Ren-Mobil</b> </h4>
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
                                    <a href="{{ url('ren-mobil/' . $mobil->kode . '/edit') }} " class="btn btn-info btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href=" {{ url('ren-mobil') }} " class="btn btn-success btn-sm">
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
                                                                    class="img-thumbnail img-preview">

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
                                                                            {{ number_format($mobil->harga_sewa, 2, ',', '.') }}
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

    </div>
@endsection
