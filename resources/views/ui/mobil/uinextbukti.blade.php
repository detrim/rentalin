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
                        <h4> <b>INVOICE</b> </h4>
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

        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            Silahkan cetak bukti invoice ini dan bawa ketempat rentalin sebagai bukti pemesanan anda.
                        </div>

                        @foreach ($users as $us)
                            @php
                                $tglsewa = $us->tgl_sewa;
                                $tglkembali = $us->tgl_kembali;
                                $total = $us->total_pembayaran;
                                $dp = $us->total_dp;
                                $tagihan = $us->total_pembayaran - $us->total_dp;

                                $nama = $us->nama;
                                $nik = $us->nik;
                                $no_telp = $us->no_telp;
                                $invoice = $us->invoice;
                                $faktur = $us->faktur;
                                $updated = $us->tgl_dp;
                                $kode = $us->kode;
                                $nopol = $us->nopol;
                                $nama_mobil = $us->nama_mobil;
                                $icon = $us->icon;
                                $ktp = $us->ktp;
                                $rk = $us->rk;
                                $no = 1;

                            @endphp

                            @if ($dp == $total)
                                @php
                                    $deposit = 'Lunas';
                                @endphp
                            @else
                                @php
                                    $deposit = '50 %';
                                @endphp
                            @endif
                        @endforeach
                        <!-- Main content -->
                        @foreach ($rek as $rekening)
                            @php

                                $nama_rekening = $rekening->nama;
                            @endphp
                        @endforeach

                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Rentalin, Inc.
                                        <small class="float-right">Tanggal: {{ date('Y/m/d H:i') }}</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>Admin, Inc.</strong><br>
                                        Jln. Meruya Selatan, Kel. Joglo, Kec. Kembangan.
                                        <br>
                                        Jakarta Barat<br>
                                        Phone: (804) 123-5432<br>
                                        Email: rentalin@admin.co.id
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong>{{ $nama }}</strong><br>
                                        {{ $nik }}<br>
                                        {{ $no_telp }}<br>
                                    </address>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #{{ $invoice }}</b><br>
                                    <br>
                                    <b>Order ID:</b> {{ $faktur }}<br>
                                    <b>Payment:</b> {{ date('Y-m-d H:i', strtotime($updated)) }}<br>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th width="30">No</th>
                                                <th>Kode</th>
                                                <th>Nopol</th>
                                                <th>Nama Mobil</th>
                                                <th>Tanggal Sewa</th>
                                                <th>Tanggal Kembali</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>{{ $no }}</td>
                                                <td>{{ $kode }}</td>
                                                <td>{{ $nopol }}</td>
                                                <td>{{ $nama_mobil }}</td>
                                                <td>{{ date('d-m-Y H:i', strtotime($tglsewa)) }}</td>
                                                <td>{{ date('d-m-Y H:i', strtotime($tglkembali)) }}</td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-7">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-md-5">
                                                <p class="lead">Payment Methods:</p>
                                                <img class="img-thumbnail " src="{{ asset('storage/' . $icon) }}"
                                                    alt="User Image" height="120px" width="120px">
                                                <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                                    <label>Nomor
                                                        Rekening</label>&nbsp<label>:</label>
                                                </p>
                                                <p style="margin-top:-25px"> {{ $rk }} </p>
                                                <br>
                                                <p class="text-muted well well-sm shadow-none" style="margin-top: -20px;">
                                                    <label>Nama
                                                        Rekening</label>&nbsp<label>:</label>
                                                </p>
                                                <p style="margin-top:-25px">{{ $nama_rekening }}</p>

                                            </div>
                                            <div class="col-md-7">

                                                {{-- <div class="mt-5">

                                                </div> --}}
                                                <p class="lead">Photo KTP:</p>
                                                <img class="img-thumbnail " src="{{ asset('storage/' . $ktp) }}"
                                                    alt="User Image" height="300px" width="300px">
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.col -->
                                <div class="col-5">
                                    <p class="lead">Amount {{ date('Y-m-d H:i', strtotime($tglsewa)) }}</p>

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Total</th>
                                                <td><label>:</label> Rp.
                                                    {{ number_format($total, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Down Payment</th>
                                                <td><label>:</label> Rp.
                                                    {{ number_format($dp, 0, ',', '.') }}</td>
                                            </tr>
                                            <tr>
                                                <th>Status</th>
                                                <td><label>:</label> {{ $deposit }}</td>
                                            </tr>
                                            <tr>
                                                <th>Tagihan</th>
                                                <td><label>:</label> Rp.
                                                    {{ number_format($tagihan, 0, ',', '.') }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="{{ url('nextbuktimob/' . $faktur . '/bukti_print') }}" rel="noopener"
                                        target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
    </div>
@endsection
