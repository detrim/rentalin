@extends('main')
@extends('layout.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>Transaksi-Mobil</b> </h4>
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
                                <form action="" target="print_data_kontrak" method="get"
                                    enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-3">

                                            <input type="date" class="form-control" name="tgl_1" required>



                                        </div>
                                        <div class="col-md-1 text-center">
                                            <label class="mt-2"><b>sd</b></label>
                                        </div>
                                        <div class="col-md-3">

                                            <input type="date" class="form-control" name="tgl_2" required>

                                        </div>
                                        <div class="col-md-2">
                                            <div class="form-group">

                                                <select class="form-control select2" style="width: 100%;" name="total_dp">
                                                    <option value="">Semua
                                                    </option>
                                                    <option value="">Menunggu
                                                    </option>
                                                    <option value="">Dipesan
                                                    </option>
                                                    <option value="">Disewa
                                                    </option>
                                                    <option value="">Dikembalikan
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-2">

                                            <button onclick="javascript: return confirm('Print Data Kontrak?')"
                                                class="btn btn-primary btn-md"><i class="fa fa-print"></i> Print</button>
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <!-- /.card-header -->
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <div class="card">
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped table-sm">
                                    <thead>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Nik</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Faktur</th>
                                            <th>Status</th>
                                            <th width="60">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($transaksimobil as $tm)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $tm->kode }}</td>
                                                <td>{{ $tm->nama }}</td>
                                                <td>{{ $tm->nik }}</td>
                                                <td>{{ date('Y-m-d H:i', strtotime($tm->tgl_sewa)) }}</td>
                                                <td>{{ date('Y-m-d H:i', strtotime($tm->tgl_kembali)) }}</td>
                                                <td>{{ $tm->faktur }}</td>
                                                <td>{{ $tm->status }}</td>
                                                <td>

                                                    <a href="{{ url('transaksi-mobil/' . $tm->faktur . '/detail') }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="far fa-id-badge"></i></a>



                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Kode</th>
                                            <th>Nama</th>
                                            <th>Nik</th>
                                            <th>Tanggal Sewa</th>
                                            <th>Tanggal Kembali</th>
                                            <th>Faktur</th>
                                            <th>Status</th>
                                            <th width="60">Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
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
