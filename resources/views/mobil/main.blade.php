@extends('main')
@extends('layout.sidebar')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4> <b>Ren-Mobil</b> </h4>
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
                                    <a href=" {{ url('ren-mobil/create') }} " class="btn btn-success btn-sm">
                                        <i class="fa-solid fa-plus"></i> Create
                                    </a>

                                    {{-- <form action="{{ url('ren-mobil/create') }}" class="d-inline" method="post">

                                        <input type="hidden" name="nom" value="1">
                                        <button class="btn btn-danger btn-sm">
                                            <i class="fa fa-trash"></i>
                                        </button>
                                    </form> --}}
                                </div>
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
                                            <th>Kode Mobil</th>
                                            <th>Nama Mobil</th>
                                            <th>Warna</th>
                                            <th>Nopol</th>
                                            <th>Harga Sewa</th>
                                            <th>Status</th>
                                            <th>View</th>
                                            <th width="60">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($renmobil as $rm)
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rm->kode }}</td>
                                                <td>{{ $rm->nama_mobil }}</td>
                                                <td>{{ $rm->warna }}</td>
                                                <td>{{ $rm->nopol }}</td>
                                                <td>Rp. {{ number_format($rm->harga_sewa, 0, ',', '.') }},-/Hari</td>
                                                <td>{{ $rm->status }}</td>
                                                <td>{{ $rm->view }}</td>
                                                <td>

                                                    <a href="{{ url('ren-mobil/' . $rm->kode . '/detail') }}"
                                                        class="btn btn-primary btn-sm">
                                                        <i class="far fa-id-badge"></i></a>



                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr class="text-center">
                                            <th width="30">No</th>
                                            <th>Kode Mobil</th>
                                            <th>Nama Mobil</th>
                                            <th>Warna</th>
                                            <th>Nopol</th>
                                            <th>Harga Sewa</th>
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
