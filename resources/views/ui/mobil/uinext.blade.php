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
                                                @foreach ($users as $us)
                                                    @php
                                                        $total = $us->hari * $us->harga_sewa;
                                                        $persen = $total / 2;
                                                        $faktur = $us->faktur;
                                                        $photos = $us->photos;
                                                        $namamobil = $us->nama_mobil;
                                                        $warna = $us->warna;
                                                        $nopol = $us->nopol;
                                                        $kode = $us->kode;
                                                        $id = $us->id;
                                                    @endphp
                                                    <form>
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4 bg-primary">
                                                                <div class="form-group mt-2">

                                                                    <img src="{{ asset('storage/' . $us->ktp) }}"
                                                                        class="img-thumbnail ">

                                                                </div>
                                                            </div>

                                                            <div class="col-md-8">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nik</label>
                                                                            <p>{{ $us->nik }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama</label>
                                                                            <p>{{ $us->nama }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Kode</label>
                                                                            <p>{{ $us->kode }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nopol</label>
                                                                            <p>{{ $us->nopol }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama Mobil</label>
                                                                            <p>{{ $us->nama_mobil }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Faktur</label>
                                                                            <p>{{ $us->faktur }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Lama Sewa</label>
                                                                            <p>{{ date('d/m/Y H:i', strtotime($us->tgl_sewa)) }}
                                                                                sd
                                                                                {{ date('d/m/Y H:i', strtotime($us->tgl_kembali)) }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Hari</label>
                                                                            <p>{{ $us->hari }}&nbsp hari</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Total Sewa</label>
                                                                            <p>Rp.
                                                                                {{ number_format($total, 0, ',', '.') }},-/&nbsp{{ $us->hari }}&nbsphari
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>No Telp</label>
                                                                            <p>{{ $us->no_telp }}</p>
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
        @endforeach
        <!-- /.content -->
        <section class="content">
            <div class="container-fluid">

                <div class=" card card-widget">
                    <div class="card-header">
                        <div class="user-block">
                            <img class="img-circle" src="{{ asset('storage/' . $photos) }}" alt="User Image">
                            <span class="username"><a href="#">Sewa Mobil {{ $namamobil }} -
                                    {{ $kode }}</a></span>
                            <span class="description">{{ $warna }} - {{ $nopol }} </span>
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
                                @foreach ($users_id as $usr_id)
                                    @php
                                        $us_id = $usr_id->id;
                                        
                                    @endphp
                                @endforeach

                                <!-- /.card-header -->
                                <!-- form start -->
                                <form method="POST" action="{{ url('two-mob/' . $faktur . $us_id . '/cetak') }}"
                                    enctype="multipart/form-data">
                                    @method('PATCH')
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
                                                        <label>Pilih Pembayaran</label>
                                                        <select class="form-control select2" style="width: 100%;"
                                                            name="total_dp">
                                                            <option value="{{ $persen }}">Rp.
                                                                {{ number_format($persen, 0, ',', '.') }},-/&nbsp50%

                                                            </option>
                                                            <option value="{{ $total }}">Rp.
                                                                {{ number_format($total, 0, ',', '.') }},-/&nbsp100%
                                                            </option>
                                                        </select>
                                                    </div>
                                                </div>

                                                <input type="hidden" name="faktur" value="{{ $faktur }}">
                                                <input type="hidden" name="invoice" value="{{ $inv }}">
                                                <input type="hidden" name="total_pembayaran"
                                                    value="{{ $total }}">
                                                <input type="hidden" name="status" value="Kosong">
                                                <input type="hidden" name="role_id" value="1">
                                                <input type="hidden" name="kode" value="{{ $kode }}">
                                                <input type="text" name="id" value="{{ $us_id }}">
                                                <input type="hidden" name="tgl_dp" value="{{ date('Y-m-d H:i') }}">


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Bukti Transfer</label>
                                                        <div class="custom-file">
                                                            <input type="file" name="bukti" id="photos"
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
                                                        <label>Pilih Pembayaran </label>
                                                        <select
                                                            class="form-control select2 @error('rk') is-invalid @enderror"
                                                            style="width: 100%;" name="rk" id="package">
                                                            <option>
                                                                Pilih
                                                            </option>
                                                            @foreach ($rkk as $rk)
                                                                <option value="{{ $rk->rk }}">
                                                                    {{ $rk->nama_rk }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        @error('rk')
                                                            <small class="text-danger ">{{ $message }}</small>
                                                        @enderror
                                                    </div>
                                                </div>


                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Rekening</label>
                                                        <div class="card text-center">
                                                            <p class="mt-2"> <span id="selected">&nbsp</span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="card-footer text-right">
                                                <button type="submit" class="btn btn-primary"
                                                    onclick="javascript: return confirm('Apakah data sudah benar ?')">Submit</button>
                                            </div>
                                        </div>

                                    </div>
                                </form>

                                <!-- /.card-body -->



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
