<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rentalin v3</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/css/adminlte.min.css') }}">
</head>
<style>
    .textfoot {
        position: fixed;
        left: 0;
        bottom: 0;
        width: 100%;
        /* background-color: red; */
        /* color: white; */
        /* text-align: left; */
    }
</style>

<body class="hold-transition sidebar-mini layout-navbar-fixed layout-fixed">
    <div class="invoice p-3 mb-3">
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
        @foreach ($rek as $rekening)
            @php

                $nama_rekening = $rekening->nama;
            @endphp
        @endforeach
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
                            <img class="img-thumbnail " src="{{ asset('storage/' . $icon) }}" alt="User Image"
                                height="120px" width="120px">
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
                            <img class="img-thumbnail " src="{{ asset('storage/' . $ktp) }}" alt="User Image"
                                height="300px" width="300px">
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
        <br>
        <div class="row">
            <!-- accepted payments column -->
            <div class="col-7">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-5">
                            <label for=""></label>
                        </div>
                        <div class="col-md-7">
                            <p><label for=""></label></p>
                            <p>Rentalin</p>
                            <br>
                            <br>
                            <br>
                            <br>
                            <br>
                            <p style="margin-left: -45px">(.....................................)
                            </p>

                        </div>
                    </div>
                </div>


            </div>
            <!-- /.col -->
            <div class="col-5">
                <p style="margin-left: -45px">Jakartat, {{ date('Y-m-d') }}</p>
                <p>Penyewa</p>
                <br><span style="margin-left: -3px"></span>
                <br><span style="margin-left: -7px"></span>
                <br>
                <br>
                <br>
                <p style="margin-left: -45px">( &nbsp&nbsp {{ $nama }} &nbsp&nbsp )
                </p>

            </div>
            <!-- /.col -->
        </div>

        <!-- this row will not appear when printing -->
    </div>

    <footer class="textfoot">
        <hr>
        <p>(*) Rentalin, inc</p>
    </footer>

    <script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('assets/js/adminlte.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <!-- Select2 -->
    <script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- AdminLTE for demo purposes -->
    {{-- <script src="{{ asset('assets/js/demo.js') }}"></script> --}}
    <!-- Page specific script -->
    <script>
        window.addEventListener("load", window.print());
    </script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/3.3.4/jquery.inputmask.bundle.min.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
</body>

</html>
