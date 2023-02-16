@extends('ui.main')
@extends('ui.layout.sidebarui')

@section('contentui')
    <div class="content-wrapper" style="margin-top: 0px" style="margin-bottom: 200px">
        <!-- Content Header (Page header) -->
        <br><br>
        <section class="content-header" style="margin-top: -20px">
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
                                            @if ($rm->view == null)
                                                @php
                                                    $view = '-/-';
                                                @endphp
                                            @else
                                                @php
                                                    $view = $rm->view;
                                                    $dd = '%';
                                                @endphp
                                            @endif
                                            <tr class="text-center">
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $rm->kode }}</td>
                                                <td>{{ $rm->nama_mobil }}</td>
                                                <td>{{ $rm->warna }}</td>
                                                <td>{{ $rm->nopol }}</td>
                                                <td>Rp. {{ number_format($rm->harga_sewa, 0, ',', '.') }},-/Hari</td>
                                                <td>{{ $rm->status }}</td>
                                                <td>{{ $view }}</td>
                                                <td>
                                                    {{-- @if ($rm->status == 'Dilihat')
                                                    @elseif ($rm->status == 'Dilihat')
                                                    @else
                                                        <form action="{{ url('ui-mobil/' . $rm->kode . '/detail') }}"
                                                            class="d-inline" method="post">
                                                            @csrf
                                                            <input type="hidden" name="view" value="Dilihat">
                                                            <button class="btn btn-danger btn-sm">
                                                                <i class="fa fa-id-badge"></i>
                                                            </button>
                                                        </form>
                                                    @endif --}}
                                                    <a href="{{ url('ui-mobil/' . $rm->kode . $dd . '/detail') }}"
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
                                            <th>View</th>
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
