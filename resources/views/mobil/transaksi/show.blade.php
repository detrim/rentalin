@extends('main')
@extends('layout.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>Detail Transaksi-Mobil</b> </h4>
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
                                    @foreach ($transaksi as $t)
                                        @php
                                            $faktur = $t->faktur;
                                        @endphp
                                    @endforeach

                                    <a type="button" class="btn btn-danger btn-sm" data-target="inv" href="">
                                        <i class="fas fa-print"></i> Cetak Invoice</a>

                                    <a type="button" class="btn btn-primary btn-sm" data-toggle="modal"
                                        data-target="#m-d{{ $faktur }}">
                                        <i class="fas fa-edit"></i> Dikembalikan</a>
                                    <a type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                        data-target="#m-m{{ $faktur }}">
                                        <i class="fas fa-edit"></i> Disewa</a>
                                    <a href=" {{ url('transaksi-mobil') }} " class="btn btn-success btn-sm">
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
                                                @foreach ($transaksi as $transaksi)
                                                    @php
                                                        $tagihan = $transaksi->total_pembayaran - $transaksi->total_dp;
                                                        $total = $transaksi->total_pembayaran;
                                                        $kode = $transaksi->kode;
                                                        
                                                        $dd = '%';
                                                    @endphp
                                                    <!-- /.card-header -->
                                                    <!-- form start -->
                                                    <form>
                                                        @csrf
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <label for="">KTP</label>
                                                                <div class="form-group">

                                                                    <img src="{{ asset('storage/' . $transaksi->ktp) }}"
                                                                        class="img-thumbnail img-preview">

                                                                </div>
                                                                <p style="margin-top: -10px"> <b>NIK
                                                                        : </b>{{ $transaksi->nik }}</p>

                                                                <label for="">Bukti Uang Muka</label>
                                                                <div class="form-group">

                                                                    <img src="{{ asset('storage/' . $transaksi->bukti) }}"
                                                                        class="img-thumbnail img-preview">

                                                                </div>
                                                                <p style="margin-top: -10px"> <b>INV
                                                                        : </b>{{ $transaksi->invoice }}</p>

                                                            </div>

                                                            <div class="col-md-8">

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Kode Mobil</label>
                                                                            <p>{{ $transaksi->kode }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama Penyewa</label>
                                                                            <p>{{ $transaksi->nama }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nomor Telp</label>
                                                                            <p>{{ $transaksi->no_telp }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Faktur</label>
                                                                            <p>{{ $transaksi->faktur }}</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Tanggal Sewa</label>
                                                                            <p>{{ date('d-m-Y H:i', strtotime($transaksi->tgl_sewa)) }}
                                                                                <b> sd </b>
                                                                                {{ date('d-m-Y H:i', strtotime($transaksi->tgl_kembali)) }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Total Hari</label>
                                                                            <p>{{ $transaksi->hari }} Hari</p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Total Uang Muka</label>
                                                                            <p>Rp.
                                                                                {{ number_format($transaksi->total_dp, 0, ',', '.') }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Total Tagihan</label>
                                                                            <p>Rp.
                                                                                {{ number_format($tagihan, 0, ',', '.') }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Total Pembayaran</label>
                                                                            <p>Rp.
                                                                                {{ number_format($transaksi->total_pembayaran, 0, ',', '.') }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Status</label>
                                                                            <p>{{ $transaksi->status }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Transfer ke Rekening</label>
                                                                            <p>{{ $transaksi->rk }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama Bank</label>
                                                                            <p>{{ $transaksi->nama_rk }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Nama Rekening</label>
                                                                            <p>{{ $transaksi->nama }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>

                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label>Tanggal Uang Muka</label>
                                                                            <p>{{ date('d-m-Y H:i', strtotime($transaksi->tgl_dp)) }}
                                                                            </p>
                                                                            <hr style="margin-top: -15px">
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>

                                                        <!-- /.card-body -->

                                                    </form>
                                                @endforeach
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

                    </div>
                </div>
            </div>
        </section>
        {{-- disewa --}}
        <div class="modal fade" id="m-m{{ $faktur }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Disewa{{ $faktur }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <form action="{{ url('update-transaksi-mobil/' . $faktur . $dd . '/sewa') }}"
                                        method="post" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="no_faktur" value="{{ $faktur }}">

                                        <label>Status</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="checkbox" name="status" value="Disewa" required>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" value="Disewa" disabled>
                                        </div>
                                        <br>
                                        <label>Total Tagihan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="checkbox" name="total_dp" value="{{ $total }}"
                                                        required>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="Rp. {{ number_format($tagihan, 0, ',', '.') }}" disabled>
                                        </div>
                                        <br>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>

        {{-- dikembalikan --}}
        <div class="modal fade" id="m-d{{ $faktur }}">
            <div class="modal-dialog modal-md">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Update Dikembalikan {{ $faktur }}</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-md-12">
                            <div class="row justify-content-center">
                                <div class="col-md-11">
                                    <form action="{{ url('update-transaksi-mobil/' . $faktur . $dd . '/dikembalikan') }}"
                                        method="post" enctype="multipart/form-data">
                                        @method('patch')
                                        @csrf
                                        <input type="hidden" name="no_faktur" value="{{ $faktur }}">
                                        <input type="hidden" name="no_kode" value="{{ $kode }}">

                                        <label>Status</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="checkbox" name="status" value="Dikembalikan" required>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control" value="Dikembalikan" disabled>
                                        </div>
                                        <br>
                                        <label>Total Tagihan</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <input type="checkbox" name="total_dp" value="{{ $total }}"
                                                        required>
                                                </span>
                                            </div>
                                            <input type="text" class="form-control"
                                                value="Rp. {{ number_format($tagihan, 0, ',', '.') }}" disabled>
                                        </div>
                                        <br>
                                        <div class="card-footer text-right">
                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                    </form>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
    <!-- /.content -->
@endsection
